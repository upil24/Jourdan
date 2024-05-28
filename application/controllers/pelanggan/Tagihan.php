<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_pelanggan();
        $this->load->model(['ModelUser', 'ModelTagihan']);
    }
    public function index()
    {
        $data['judul'] = 'Daftar Tagihan';
        $data['user'] = $this->ModelUser->cekDataPelanggan(['email' => $this->session->userdata('email')])->row_array();
        $data['tagihan'] = $this->ModelTagihan->belumBayarOrang($data['user']['id_pelanggan'])->result_array();
        // var_dump($data['tagihan']);
        // die;

        $this->load->view('pelanggan/templates/header', $data);
        $this->load->view('pelanggan/templates/sidebar', $data);
        $this->load->view('pelanggan/templates/topbar', $data);
        $this->load->view('pelanggan/tagihan/index', $data);
        $this->load->view('pelanggan/templates/footer');
    }
}
