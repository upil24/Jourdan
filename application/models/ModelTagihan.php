<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTagihan extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('tagihan', $data);
    }

    public function tampilTagihan()
    {
        $this->db->select('tagihan.*,user.nama,pelanggan.nama_p');
        $this->db->from('tagihan');
        $this->db->join('user', 'tagihan.id_user = user.id_user');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
        return $this->db->get();
    }

    public function get_no_tagihan()
    {
        $cd = $this->db->query("SELECT MAX(RIGHT(id_tagihan,3)) AS kd_max FROM tagihan WHERE DATE(date_created)=CURDATE()");
        $kd = "";
        if ($cd->num_rows() > 0) {
            foreach ($cd->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'TGH' . date('dym')  . $kd;
    }

    public function hapusTagihan($where = null)
    {
        $this->db->delete('tagihan', $where);
    }

    public function ubahTagihan($data = null, $where = null)
    {
        $this->db->update('tagihan', $data, $where);
    }

    public function tagihanWhere($where)
    {
        return $this->db->get_where('tagihan', $where);
    }

    public function belumBayar()
    {
        $this->db->select('tagihan.*,pelanggan.nama_p');
        $this->db->from('tagihan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
        $this->db->where('tagihan.status', 'Belum Bayar');
        return $this->db->get();
    }

    public function belumBayarOrang($where = null)
    {
        $this->db->select('tagihan.*,pelanggan.nama_p');
        $this->db->from('tagihan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
        $this->db->where('tagihan.status', 'Belum Bayar');
        $this->db->where('tagihan.id_pelanggan', $where);
        return $this->db->get();
    }
}
