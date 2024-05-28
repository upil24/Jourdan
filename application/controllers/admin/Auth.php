<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelUser']);
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Login';
            $this->load->view('admin/templates/auth_header', $data);
            $this->load->view('admin/auth/login');
            $this->load->view('admin/templates/auth_footer');
        } else {
            //kalo lolos validasinya
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();
        if ($user) {
            //usernya ada
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                redirect('admin/Dashboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email / Password salah !!!</div>');
                redirect('admin/auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email / Password salah !!!</div>');
            redirect('admin/auth');
        }
    }



    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah Logout !!!</div>');
        redirect('admin/auth');
    }

    public function blocked()
    {
        $data['judul'] = 'BLOCKED';

        $this->load->view('admin/auth/blocked');
    }
}
