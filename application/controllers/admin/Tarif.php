<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model(['ModelUser', 'ModelTarif']);
    }
    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['tarif'] = $this->ModelTarif->tampilTarif()->result_array();
        $data['judul'] = 'Data Tarif';
        $dariDB = $this->ModelTarif->cekkode();
        // contoh DKT0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 4);
        $idTarifSekarang = $nourut + 1;
        $data['id_tarif'] =  $idTarifSekarang;


        $this->form_validation->set_rules('daya', 'Daya', 'required|trim', [
            'required' => 'Daya harus diisi'
        ]);

        $this->form_validation->set_rules('tarifperkwh', 'Tarif Kwh', 'required|trim|numeric', [
            'required' => 'Tarif Kwh harus diisi',
            'numeric' => 'Tarif Kwh Harus Angka'
        ]);



        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tarif/index', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_tarif' => htmlspecialchars($this->input->post('id_tarif', true)),
                'daya' => htmlspecialchars($this->input->post('daya', true)),
                'tarifperkwh' => htmlspecialchars($this->input->post('tarifperkwh', true))
            ];

            $this->ModelTarif->simpanData($data);
            $this->session->set_flashdata('flash', 'Data Tarif berhasil ditambahkan');
            redirect('admin/tarif');
        }
    }

    public function hapusTarif()
    {
        $where = ['id_tarif' => $this->uri->segment(4)];
        $this->ModelTarif->hapusTarif($where);
        $this->session->set_flashdata('flash', 'Data Tarif ' . $where["id_tarif"] . ' berhasil dihapus');
        redirect('admin/tarif');
    }

    public function ubahTarif()
    {
        $data['judul'] = 'Ubah Data Tarif';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['tarif'] = $this->ModelTarif->tarifWhere(['id_tarif' => $this->uri->segment(4)])->row_array();


        $this->form_validation->set_rules('daya', 'Daya', 'required|trim', [
            'required' => 'Daya harus diisi'
        ]);

        $this->form_validation->set_rules('tarifperkwh', 'tarif perkwh', 'required|trim|numeric', [
            'required' => 'tarif Kwh harus diisi',
            'numeric' => 'tarifperkwh Harus Angka'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tarif/tarif-ubah', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_tarif' => htmlspecialchars($this->input->post('id_tarif', true)),
                'daya' => htmlspecialchars($this->input->post('daya', true)),
                'tarifperkwh' => htmlspecialchars($this->input->post('tarifperkwh', true))
            ];

            $this->ModelTarif->updateTarif($data, ['id_tarif' => $this->input->post('id_tarif')]);

            $this->session->set_flashdata('flash', 'Data Tarif berhasil diubah');
            redirect('admin/tarif');
        }
    }
}
