<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPelanggan extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('pelanggan', $data);
    }


    public function get_no_pelanggan()
    {
        $cd = $this->db->query("SELECT MAX(RIGHT(id_pelanggan,3)) AS kd_max FROM pelanggan WHERE DATE(date_created)=CURDATE()");
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
        return 'PLG' . date('dmy')  . $kd;
    }

    public function get_no_kwh()
    {
        $cd = $this->db->query("SELECT MAX(RIGHT(no_kwh,3)) AS kd_max FROM pelanggan WHERE DATE(date_created)=CURDATE()");
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
        return  date('mYd')  . $kd;
    }

    // public function tampilPelanggan()
    // {
    //     $this->db->order_by('pelanggan.date_created', "asc");
    //     return $this->db->get('pelanggan');
    // }

    public function tampilPelanggan()
    {
        $this->db->select('pelanggan.*,tarif.daya');
        $this->db->from('pelanggan');
        $this->db->order_by('date_created', 'ASC');
        $this->db->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif');
        return $this->db->get();
    }

    public function hapusPelanggan($where = null)
    {
        $this->db->delete('pelanggan', $where);
    }


    public function pelangganWhere($where)
    {
        return $this->db->get_where('pelanggan', $where);
    }

    public function updatePelanggan($data = null, $where = null)
    {
        $this->db->update('pelanggan', $data, $where);
    }

    public function jumlahPelanggan()
    {
        return $this->db->count_all_results('pelanggan');
    }

    // public function joinTarif_Pelanggan()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tarif');
    //     $this->db->join('user_role', 'user_role.id = user.role_id');
    //     return $this->db->get();
    // }

    public function tampilPelangganDetail($where = null)
    {
        $this->db->select('pelanggan.*,tarif.daya');
        $this->db->from('pelanggan');
        $this->db->join('tarif', 'pelanggan.id_tarif = tarif.id_tarif');
        $this->db->where('pelanggan.id_pelanggan', $where);
        return $this->db->get();
    }
}
