<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelUser', 'ModelTagihan', 'ModelPembayaran']);
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['tagihan'] = $this->ModelTagihan->tampilTagihan()->result_array();
        $data['judul'] = 'Data tagihan';


        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/tagihan/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function hapus()
    {
        $where = ['id_tagihan' => $this->uri->segment(4)];

        $data = [
            'status' => 'Belum Bayar'
        ];


        $this->ModelTagihan->ubahTagihan($data, $where);
        $this->ModelPembayaran->hapusPembayaran($where);
        $this->session->set_flashdata('flash', 'Transaksi Berhasil Dibatalkan');
        redirect('admin/tagihan');
    }
}
