<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_pelanggan();
        $this->load->model(['ModelUser', 'ModelPembayaran']);
    }
    public function index()
    {
        $data['judul'] = 'Riwayat Pembayaran';
        $data['user'] = $this->ModelUser->cekDataPelanggan(['email' => $this->session->userdata('email')])->row_array();
        $data['riwayat'] = $this->ModelPembayaran->riwayatBayar($data['user']['id_pelanggan'])->result_array();
        // var_dump($data['tagihan']);
        // die;

        $this->load->view('pelanggan/templates/header', $data);
        $this->load->view('pelanggan/templates/sidebar', $data);
        $this->load->view('pelanggan/templates/topbar', $data);
        $this->load->view('pelanggan/riwayat/index', $data);
        $this->load->view('pelanggan/templates/footer');
    }
}
