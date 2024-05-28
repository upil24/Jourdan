<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model(['ModelUser', 'ModelPelanggan', 'ModelTarif']);
    }

    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->ModelPelanggan->tampilPelanggan()->result_array();
        $data['judul'] = 'Data Pelanggan';
        $data['id_pelanggan'] = $this->ModelPelanggan->get_no_pelanggan();
        $data['no_kwh'] = $this->ModelPelanggan->get_no_kwh();
        $data['tarif'] = $this->ModelTarif->tampilTarif()->result_array();

        $this->form_validation->set_rules('nama_p', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('kontak', 'No Telpon/HP', 'required|trim|numeric', [
            'required' => 'Nomor Telp harus diisi',
            'numeric' => 'Nomor Telpon Harus Angka'
        ]);
        $this->form_validation->set_rules('jen_kel', 'jen_kel', 'required|trim', [
            'required' => 'jenis Kelamin harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pelanggan.email]', [
            'is_unique' => 'Email sudah pernah mendaftar',
            'required' => 'Email harus diisi'
        ]);
        $this->form_validation->set_rules('no_ktp', 'NO_KTP', 'trim|numeric', [
            'required' => 'Nomor KTP harus diisi',
            'numeric' => 'Nomor KTP harus Angka'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat harus diisi'
        ]);
        $this->form_validation->set_rules('id_tarif', 'id_tarif', 'required|trim', [
            'required' => 'Daya harus diisi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pelanggan/index', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_pelanggan' => $this->input->post('id_pelanggan', true),
                'nama_p' => $this->input->post('nama_p', true),
                'kontak' => $this->input->post('kontak', true),
                'jen_kel' => $this->input->post('jen_kel', true),
                'email' => $this->input->post('email', true),
                'no_ktp' => $this->input->post('no_ktp', true),
                'alamat' => $this->input->post('alamat', true),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'no_kwh' => $this->input->post('no_kwh', true),
                'id_tarif' => $this->input->post('id_tarif', true),
                'id_user' => $this->input->post('id_user', true),
                'date_created' => time('dmy')
            ];

            $this->ModelPelanggan->simpanData($data);
            $this->session->set_flashdata('flash', 'Data Pelanggan berhasil ditambahkan');
            redirect('admin/pelanggan');
        }
    }



    public function hapusPelanggan()
    {
        $where = ['id_pelanggan' => $this->uri->segment(4)];
        // var_dump($where);
        // die;
        $this->ModelPelanggan->hapusPelanggan($where);
        $this->session->set_flashdata('flash', 'Data Pelanggan ' . $where["id_pelanggan"] . ' berhasil dihapus');
        redirect('admin/pelanggan');
    }



    public function ubahPelanggan()
    {
        $data['judul'] = 'Ubah Data Pelanggan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->ModelPelanggan->pelangganWhere(['id_pelanggan' => $this->uri->segment(4)])->row_array();
        $data['tarif'] = $this->ModelTarif->tampilTarif()->result_array();


        $this->form_validation->set_rules('nama_p', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('kontak', 'No Telpon/HP', 'required|trim|numeric', [
            'required' => 'Nomor Telp harus diisi',
            'numeric' => 'Nomor Telpon Harus Angka'
        ]);
        $this->form_validation->set_rules('jen_kel', 'jen_kel', 'required|trim', [
            'required' => 'jenis Kelamin harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email harus diisi'
        ]);
        $this->form_validation->set_rules('no_ktp', 'NO_KTP', 'trim|numeric', [
            'required' => 'Nomor KTP harus diisi',
            'numeric' => 'Nomor KTP harus Angka'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat harus diisi'
        ]);
        $this->form_validation->set_rules('id_tarif', 'id_tarif', 'required|trim', [
            'required' => 'Daya harus diisi'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pelanggan/ubah-pelanggan', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_pelanggan' => htmlspecialchars($this->input->post('id_pelanggan', true)),
                'nama_p' => htmlspecialchars($this->input->post('nama_p', true)),
                'kontak' => htmlspecialchars($this->input->post('kontak', true)),
                'jen_kel' => htmlspecialchars($this->input->post('jen_kel', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_ktp' => htmlspecialchars($this->input->post('no_ktp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'no_kwh' => htmlspecialchars($this->input->post('no_kwh', true)),
                'id_tarif' => htmlspecialchars($this->input->post('id_tarif', true)),
                'id_user' => htmlspecialchars($this->input->post('id_user', true))
            ];

            // var_dump($data);
            // die;

            $this->ModelPelanggan->updatePelanggan($data, ['id_pelanggan' => $this->input->post('id_pelanggan')]);

            $this->session->set_flashdata('flash', 'Data Pelanggan berhasil diubah');
            redirect('admin/pelanggan');
        }
    }

    public function cetak_tagihan()
    {
        $data['pelanggan'] = $this->ModelPelanggan->pelangganWhere(['id_pelanggan' => $this->uri->segment(4)])->row_array();

        $this->load->view('cetak/tagihan', $data);
    }
}
