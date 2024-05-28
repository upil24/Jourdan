<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('cetak_pdf');
        $this->load->model(['ModelUser', 'ModelPelanggan', 'ModelTarif', 'ModelTagihan', 'ModelPembayaran']);
    }

    public function index()
    {
        $data['judul'] = 'Laporan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cetak/index', $data);
        $this->load->view('admin/templates/footer');
    }

    public function laporan_pelanggan_pdf()
    {
        $data['pelanggan'] = $this->ModelPelanggan->tampilPelanggan()->result_array();
        $this->load->view('admin/cetak/c_lap_pelanggan_pdf', $data);
    }

    public function print_pelanggan()
    {
        $data['pelanggan'] = $this->ModelPelanggan->tampilPelanggan()->result_array();
        $this->load->view('admin/cetak/c_lap_pelanggan_print', $data);
    }

    public function excel_pelanggan()
    {
        $data = [
            'title' => 'Laporan Data Pelanggan',
            'pelanggan' => $this->ModelPelanggan->tampilPelanggan()->result_array()
        ];
        $this->load->view('admin/cetak/c_lap_pelanggan_excel', $data);
    }

    public function laporan_tarif_pdf()
    {
        $data['data'] = $this->ModelTarif->tampilTarif()->result_array();
        $this->load->view('admin/cetak/c_lap_tarif_pdf', $data);
    }

    public function print_tarif()
    {
        $data['data'] = $this->ModelTarif->tampilTarif()->result_array();
        $this->load->view('admin/cetak/c_lap_tarif_print', $data);
    }

    public function excel_tarif()
    {
        $data = [
            'title' => 'Laporan Data Tarif',
            'tarif' => $this->ModelTarif->tampilTarif()->result_array()
        ];
        $this->load->view('admin/cetak/c_lap_tarif_excel', $data);
    }


    public function laporan_user_pdf()
    {
        $data['data'] = $this->ModelUser->tampilUser()->result_array();
        $this->load->view('admin/cetak/c_lap_user_pdf', $data);
    }

    public function print_user()
    {
        $data['data'] = $this->ModelUser->tampilUser()->result_array();
        $this->load->view('admin/cetak/c_lap_user_print', $data);
    }

    public function excel_user()
    {
        $data = [
            'title' => 'Laporan Data User',
            'user' => $this->ModelUser->tampilUser()->result_array()
        ];
        $this->load->view('admin/cetak/c_lap_user_excel', $data);
    }

    public function pembayaran()
    {
        $a = $this->input->post('tgl_awal');
        $b = $this->input->post('tgl_akhir');
        $data['tgl_awal'] = $a;
        $data['tgl_akhir'] = $b;
        $data['data'] = $this->ModelPembayaran->cetak_pembayaran($a, $b);
        // var_dump($data2);
        // die;
        $this->load->view('admin/cetak/c_lap_pembayaran_print', $data);
    }

    public function laporan_tagihan_pdf()
    {
        $data['data'] = $this->ModelTagihan->belumBayar()->result_array();
        $this->load->view('admin/cetak/c_lap_tagihan_pdf', $data);
    }

    public function print_tagihan()
    {
        $data['data'] = $this->ModelTagihan->belumBayar()->result_array();
        $this->load->view('admin/cetak/c_lap_tagihan_print', $data);
    }

    public function excel_tagihan()
    {
        $data = [
            'title' => 'Laporan Data Tagihan',
            'tagihan' => $this->ModelTagihan->belumBayar()->result_array()
        ];
        $this->load->view('admin/cetak/c_lap_tagihan_excel', $data);
    }
}
