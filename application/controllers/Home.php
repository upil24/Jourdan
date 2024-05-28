<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelGaleri', 'ModelUser']);
    }
    public function index()
    {
        $data['judul'] = 'PT PLN PERSERO';
        $data['foto'] = $this->ModelGaleri->get()->result_array();

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            // $data['jadwal'] = $this->ModelDokter->tampilDokter()->result_array();
            $this->load->view('templates/home/header', $data);
            $this->load->view('templates/home/index', $data);
            $this->load->view('templates/home/footer');
        } else {
            //kalo lolos validasinya
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->ModelUser->cekDataPelanggan(['email' => $email])->row_array();
        if ($user) {
            //usernya ada
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email']
                ];
                $this->session->set_userdata($data);
                redirect('pelanggan/Dashboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email / Password salah !!!</div>');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email / Password salah !!!</div>');
            redirect('home');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah Logout !!!</div>');
        redirect('home');
    }

    public function blocked()
    {
        $data['judul'] = 'BLOCKED';

        $this->load->view('pelanggan/auth/blocked');
    }
}
