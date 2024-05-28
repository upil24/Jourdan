<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model(['ModelUser', 'ModelGaleri']);
    }

    public function index()
    {
        $data['judul'] = 'Galeri Foto';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['galeri'] = $this->ModelGaleri->get()->result_array();

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
            'required' => 'isi keterangan dulu dong >_<'
        ]);
        // $this->form_validation->set_rules('foto', 'Foto', 'required|trim', [
        //     'required' => 'Foto belum dipilih'
        // ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/galeri/index', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/galeri/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '10000';
                $config['max_width'] = '10000';
                $config['max_height'] = '10000';
                $config['file_name'] = 'gal' . time();

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $gambar = $this->upload->data('file_name');
                    $this->db->set('foto', $gambar);
                }

                $data = [
                    'user' => $this->input->post('nama', true),
                    'keterangan' => $this->input->post('keterangan', true),
                    'date_created' => time()
                ];
                $this->ModelGaleri->simpanData($data);
                $this->session->set_flashdata('flash', 'Foto berhasil ditambahkan');
                redirect('admin/galeri');
            }
        }
    }

    public function hapus()
    {
        $where = ['id' => $this->uri->segment(4)];
        $a = $this->ModelGaleri->get_where($where)->row_array();
        unlink(FCPATH . 'assets/galeri/' . $a['foto']);
        $this->ModelGaleri->hapus(['id' => $this->uri->segment(4)]);


        $this->session->set_flashdata('flash', 'Foto berhasil dihapus');
        redirect('admin/galeri');
    }
}
