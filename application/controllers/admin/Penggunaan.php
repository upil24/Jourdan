<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penggunaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model(['ModelUser', 'ModelPenggunaan', 'ModelTagihan']);
    }
    public function index()
    {
        $data['user'] = $this->ModelUser->cekdata(['email' => $this->session->userdata('email')])->row_array();
        $data['penggunaan'] = $this->ModelPenggunaan->tampilPenggunaan()->result_array();
        $data['judul'] = 'Data Penggunaan';
        $data['id_penggunaan'] = $this->ModelPenggunaan->get_no_penggunaan();
        $data['id_tagihan'] = $this->ModelTagihan->get_no_tagihan();


        $this->form_validation->set_rules('bulan', 'Bulan', 'required|trim', [
            'required' => 'Bulan harus diisi'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim', [
            'required' => 'Tahun harus diisi'
        ]);
        $this->form_validation->set_rules('meter_awal', 'Meter Awal', 'required|trim|numeric', [
            'required' => 'Meter Awal harus diisi',
            'numeric' => 'Meter Awal Harus Angka'
        ]);

        $this->form_validation->set_rules('meter_akhir', 'Meter akhir', 'required|trim|numeric', [
            'required' => 'Meter akhir harus diisi',
            'numeric' => 'Meter akhir Harus Angka'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/penggunaan/index', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $kwh = $this->ModelPenggunaan->pelangganTarif($this->input->post('id_pelanggan'))->row_array();
            $jumlah_meter = $this->input->post('meter_akhir') - $this->input->post('meter_awal');
            $jumlah_bayar = $jumlah_meter * $kwh['tarifperkwh'];
            $data = [
                'id_penggunaan' => htmlspecialchars($this->input->post('id_penggunaan', true)),
                'id_pelanggan' => htmlspecialchars($this->input->post('id_pelanggan', true)),
                'id_user' => htmlspecialchars($this->input->post('id_user', true)),
                'bulan' => htmlspecialchars($this->input->post('bulan', true)),
                'tahun' => htmlspecialchars($this->input->post('tahun', true)),
                'meter_awal' => htmlspecialchars($this->input->post('meter_awal', true)),
                'meter_akhir' => htmlspecialchars($this->input->post('meter_akhir', true)),
                'tgl_cek' => htmlspecialchars($this->input->post('tgl_cek', true)),
                'date_created' => time('dmy')
            ];
            $data2 = [
                'id_tagihan' => htmlspecialchars($this->input->post('id_tagihan', true)),
                'id_penggunaan' => htmlspecialchars($this->input->post('id_penggunaan', true)),
                'id_pelanggan' => htmlspecialchars($this->input->post('id_pelanggan', true)),
                'id_user' => htmlspecialchars($this->input->post('id_user', true)),
                'bulan' => htmlspecialchars($this->input->post('bulan', true)),
                'tahun' => htmlspecialchars($this->input->post('tahun', true)),
                'jumlah_meter' => $jumlah_meter,
                'tarifperkwh' => $kwh['tarifperkwh'],
                'jumlah_bayar' => $jumlah_bayar,
                'status' => 'Belum Bayar',
                'date_created' => time('dmy')
            ];
            $id = $this->input->post('id_pelanggan', true);
            $where = $this->input->post('bulan', true);
            $where2 = $this->input->post('tahun', true);
            $cek = $this->ModelPenggunaan->cekData($id, $where, $where2);

            if ($cek > 0) {
                $this->session->set_flashdata('flash', 'GAGAL TAMBAH DATA');
                redirect('admin/penggunaan');
            } else {
                $this->ModelTagihan->simpanData($data2);
                $this->ModelPenggunaan->simpanData($data);
                $this->session->set_flashdata('flash', 'Data berhasil ditambahkan');
                redirect('admin/penggunaan');
            }
        }
    }

    public function hapusPenggunaan()
    {
        $where = ['id_penggunaan' => $this->uri->segment(4)];

        $this->ModelTagihan->hapusTagihan($where);
        $this->ModelPenggunaan->hapusPenggunaan($where);
        $this->session->set_flashdata('flash', 'Data Penggunaan ' . $where["id_penggunaan"] . ' berhasil dihapus');
        redirect('admin/Penggunaan');
    }

    // public function ubahPenggunaan()
    // {
    //     $data['judul'] = 'Ubah Data Penggunaan';
    //     $data['user'] = $this->ModelUser->cekdata(['email' => $this->session->userdata('email')])->row_array();
    //     $data['penggunaan'] = $this->ModelPenggunaan->penggunaanWhere(['id_penggunaan' => $this->uri->segment(4)])->row_array();


    //     $this->form_validation->set_rules('bulan', 'Bulan', 'required|trim', [
    //         'required' => 'Bulan harus diisi'
    //     ]);
    //     $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim', [
    //         'required' => 'Tahun harus diisi'
    //     ]);
    //     $this->form_validation->set_rules('meter_awal', 'Meter Awal', 'required|trim|numeric', [
    //         'required' => 'Meter Awal harus diisi',
    //         'numeric' => 'Meter Awal Harus Angka'
    //     ]);

    //     $this->form_validation->set_rules('meter_akhir', 'Meter akhir', 'required|trim|numeric', [
    //         'required' => 'Meter akhir harus diisi',
    //         'numeric' => 'Meter akhir Harus Angka'
    //     ]);

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('admin/templates/header', $data);
    //         $this->load->view('admin/templates/sidebar', $data);
    //         $this->load->view('admin/templates/topbar', $data);
    //         $this->load->view('admin/penggunaan/penggunaan-ubah', $data);
    //         $this->load->view('admin/templates/footer');
    //     } else {
    //         $data = [
    //             'id_penggunaan' => htmlspecialchars($this->input->post('id_penggunaan', true)),
    //             'id_pelanggan' => htmlspecialchars($this->input->post('id_pelanggan', true)),
    //             'id_user' => htmlspecialchars($this->input->post('id_user', true)),
    //             'bulan' => htmlspecialchars($this->input->post('bulan', true)),
    //             'tahun' => htmlspecialchars($this->input->post('tahun', true)),
    //             'meter_awal' => htmlspecialchars($this->input->post('meter_awal', true)),
    //             'meter_akhir' => htmlspecialchars($this->input->post('meter_akhir', true)),
    //             'tgl_cek' => htmlspecialchars($this->input->post('tgl_cek', true)),
    //             'last_update' => time()
    //         ];
    //         $id = $this->input->post('id_pelanggan', true);
    //         $where = $this->input->post('bulan', true);
    //         $where2 = $this->input->post('tahun', true);
    //         $cek = $this->ModelPenggunaan->cekData($id, $where, $where2);

    //         if ($cek > 0) {
    //             $this->session->set_flashdata('flash', 'GAGAL UBAH DATA');
    //             redirect('admin/penggunaan');
    //         } else {
    //             $this->ModelPenggunaan->updatePenggunaan($data, ['id_penggunaan' => $this->input->post('id_penggunaan')]);

    //             $this->session->set_flashdata('flash', 'Data penggunaan berhasil diubah');
    //             redirect('admin/penggunaan');
    //         }
    //     }
    // }
}
