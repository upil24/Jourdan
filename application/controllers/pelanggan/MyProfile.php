<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyProfile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_pelanggan();
        $this->load->model(['ModelUser', 'ModelPelanggan']);
    }

    public function index()
    {
        $data['judul'] = 'My Profile';
        $data['user'] = $this->ModelUser->cekDataPelanggan(['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->ModelPelanggan->tampilPelangganDetail($data['user']['id_pelanggan'])->row_array();
        // var_dump($data['pelanggan']);
        // die;
        $this->load->view('pelanggan/templates/header', $data);
        $this->load->view('pelanggan/templates/sidebar', $data);
        $this->load->view('pelanggan/templates/topbar', $data);
        $this->load->view('pelanggan/myprofile/index', $data);
        $this->load->view('pelanggan/templates/footer');
    }

    public function ubahProfil()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->ModelUser->cekDataPelanggan(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_p', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak Boleh Kosong'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('pelanggan/templates/header', $data);
            $this->load->view('pelanggan/templates/sidebar', $data);
            $this->load->view('pelanggan/templates/topbar', $data);
            $this->load->view('pelanggan/myprofile/ubah-profile', $data);
            $this->load->view('pelanggan/templates/footer');
        } else {
            $nama = $this->input->post('nama_p', true);
            $email = $this->input->post('email', true);

            //jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '10000';
                $config['max_width'] = '10000';
                $config['max_height'] = '10000';
                $config['file_name'] = 'pro' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else {
                }
            }

            $this->db->set('nama_p', $nama);
            $this->db->where('email', $email);
            $this->db->update('pelanggan');

            $this->session->set_flashdata('flash', 'Data profil berhasil diubah');
            redirect('pelanggan/myprofile');
        }
    }

    public function ubahPassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->ModelUser->cekDataPelanggan(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password_sekarang', 'Password Saat ini', 'required|trim', [
            'required' => 'Password saat ini harus diisi'
        ]);

        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[4]|matches[password_baru2]', [
            'required' => 'Password Baru harus diisi',
            'min_length' => 'Password tidak boleh kurang dari 4 digit',
            'matches' => 'Password Baru tidak sama dengan ulangi password'
        ]);

        $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[4]|matches[password_baru1]', [
            'required' => 'Ulangi Password harus diisi',
            'min_length' => 'Password tidak boleh kurang dari 4 digit',
            'matches' => 'Ulangi Password tidak sama dengan password baru'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('pelanggan/templates/header', $data);
            $this->load->view('pelanggan/templates/sidebar', $data);
            $this->load->view('pelanggan/templates/topbar', $data);
            $this->load->view('pelanggan/myprofile/ubah-password', $data);
            $this->load->view('pelanggan/templates/footer');
        } else {
            $pwd_skrg = $this->input->post('password_sekarang', true);
            $pwd_baru = $this->input->post('password_baru1', true);
            if (!password_verify($pwd_skrg, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Saat ini Salah!!! </div>');
                redirect('pelanggan/myprofile/ubahPassword');
            } else {
                if ($pwd_skrg == $pwd_baru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Baru tidak boleh sama dengan password saat ini!!! </div>');
                    redirect('pelanggan/myprofile/ubahPassword');
                } else {
                    //password ok
                    $password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('pelanggan');

                    $this->session->set_flashdata('flash', 'Password berhasil diubah');
                    redirect('pelanggan/myprofile/');
                }
            }
        }
    }
}
