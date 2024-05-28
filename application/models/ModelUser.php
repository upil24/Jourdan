<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }


    public function hapusUser($where = null)
    {
        $this->db->delete('user', $where);
    }

    public function tampilUser()
    {
        $this->db->order_by('user.date_created', "asc");
        return $this->db->get('user');
    }

    //login pelanggan
    public function cekDataPelanggan($where = null)
    {
        return $this->db->get_where('pelanggan', $where);
    }
}
