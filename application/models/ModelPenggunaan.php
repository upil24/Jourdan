<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPenggunaan extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('penggunaan', $data);
    }

    // public function tampilPenggunaan()
    // {
    //     return $this->db->get('penggunaan');
    // }

    public function tampilPenggunaan()
    {
        $this->db->select('penggunaan.*,pelanggan.nama_p,user.nama');
        $this->db->from('penggunaan');
        $this->db->join('pelanggan', 'penggunaan.id_pelanggan = pelanggan.id_pelanggan');
        $this->db->join('user', 'penggunaan.id_user = user.id_user');
        $this->db->order_by('penggunaan.date_created', 'ASC');
        return $this->db->get();
    }

    public function get_no_penggunaan()
    {
        $cd = $this->db->query("SELECT MAX(RIGHT(id_penggunaan,3)) AS kd_max FROM penggunaan WHERE DATE(date_created)=CURDATE()");
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
        return 'PGN' . date('ymd')  . $kd;
    }

    public function hapusPenggunaan($where = null)
    {
        $this->db->delete('penggunaan', $where);
    }

    public function pelangganTarif($where = null)
    {
        $this->db->select('pelanggan.*, tarif.*');
        $this->db->from('tarif');
        $this->db->join('pelanggan', 'tarif.id_tarif = pelanggan.id_tarif');
        $this->db->where('pelanggan.id_pelanggan', $where);
        return $this->db->get();
    }

    public function updatePenggunaan($data = null, $where = null)
    {
        $this->db->update('penggunaan', $data, $where);
    }

    public function cekData($id = null, $where = null, $where2 = null)
    {
        $query = $this->db->query("SELECT * from penggunaan WHERE id_pelanggan='$id' AND bulan=$where AND tahun=$where2 ");
        return $query->row();
    }
}
