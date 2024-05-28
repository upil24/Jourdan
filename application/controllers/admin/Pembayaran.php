<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('cetak_pdf');
        $this->load->model(['ModelUser', 'ModelPembayaran']);
    }


    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Pembayaran';

        $this->form_validation->set_rules('id_pelanggan', 'Id Pelanggan', 'required|trim', [
            'required' => 'ID PELANGGAN belum diisi'
        ]);

        $a = $this->input->post('id_pelanggan');
        $cek = $this->db->where('id_pelanggan', $a)->from("pelanggan")->count_all_results();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/pembayaran/index', $data);
            $this->load->view('admin/templates/footer');
        } else {
            if ($cek > 0) {
                $data['judul'] = 'Riwayat Pembayaran';
                $data['pelanggan'] = $this->ModelPembayaran->detail_pelanggan($a)->row_array();
                $data['tagihan'] = $this->ModelPembayaran->tagihan($a)->result_array();

                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/sidebar', $data);
                $this->load->view('admin/templates/topbar', $data);
                $this->load->view('admin/pembayaran/detail', $data);
                $this->load->view('admin/templates/footer');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Data tidak ada !!!</div>');

                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/templates/sidebar', $data);
                $this->load->view('admin/templates/topbar', $data);
                $this->load->view('admin/pembayaran/index', $data);
                $this->load->view('admin/templates/footer');
            }
        }
    }


    public function bayar()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Detail Pembayaran';
        $data['id_pembayaran'] = $this->ModelPembayaran->get_no_pembayaran();
        $a = $this->uri->segment(4);
        $data['detail_bayar'] = $this->ModelPembayaran->detail_bayar($a)->row_array();
        // var_dump($data['user']);
        // die;

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pembayaran/bayar', $data);
        $this->load->view('admin/templates/footer');
    }

    public function simpanBayar()
    {
        // var_dump($this->input->post('id_pembayaran'));
        // die;


        $data = [
            'id_pembayaran' => htmlspecialchars($this->input->post('id_pembayaran', true)),
            'id_tagihan' => htmlspecialchars($this->input->post('id_tagihan', true)),
            'id_pelanggan' => htmlspecialchars($this->input->post('id_pelanggan', true)),
            'bulan_bayar' => htmlspecialchars($this->input->post('bulan_bayar', true)),
            'tahun_bayar' => htmlspecialchars($this->input->post('tahun_bayar', true)),
            'total_bayar' => htmlspecialchars($this->input->post('total_bayar', true)),
            'id_user' => htmlspecialchars($this->input->post('id_user', true)),
            'date_created' => time('dmy')
        ];
        $data2 = [
            'status' => 'Lunas'
        ];

        $this->ModelPembayaran->updateTagihan($data2, ['id_tagihan' => $this->input->post('id_tagihan')]);
        $this->ModelPembayaran->simpan($data);
        $this->session->set_flashdata('flash', 'Pembayaran Berhasil');
        redirect('admin/pembayaran/');
    }

    public function cetak()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->ModelPembayaran->kwintansi($this->uri->segment(4))->result_array();
        $this->load->view('admin/cetak/kwitansi', $data);
    }
}
