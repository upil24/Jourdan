<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in_pelanggan();
        $this->load->model(['ModelUser']);
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekDataPelanggan(['email' => $this->session->userdata('email')])->row_array();

        // var_dump($data['user']);
        // die;

        $this->load->view('pelanggan/templates/header', $data);
        $this->load->view('pelanggan/templates/sidebar', $data);
        $this->load->view('pelanggan/templates/topbar', $data);
        $this->load->view('pelanggan/dashboard/index', $data);
        $this->load->view('pelanggan/templates/footer');
    }
}
