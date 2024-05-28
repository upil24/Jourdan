<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model(['ModelUser']);
    }

    public function index()
    {
        $data['judul'] = 'Data User';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->tampilUser()->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah pernah mendaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Panjang password minimal 8 karakter'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/user/anggota', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'nama' => ($this->input->post('nama', true)),
                'email' => ($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->ModelUser->simpanData($data);
            $this->session->set_flashdata('flash', 'Data user berhasil ditambahkan');
            redirect('admin/user');
        }
    }

    public function hapusUser()
    {
        $where = ['id_user' => $this->uri->segment(4)];
        $this->ModelUser->hapusUser($where);
        $this->session->set_flashdata('flash', 'Data user berhasil dihapus');
        redirect('admin/User');
    }
}
