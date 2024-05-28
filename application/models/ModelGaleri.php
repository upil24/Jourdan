<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelGaleri extends CI_Model
{
    public function get($where = null)
    {
        return $this->db->get('galeri', $where);
    }

    public function simpanData($data = null)
    {
        return $this->db->insert('galeri', $data);
    }


    public function hapus($where = null)
    {
        return $this->db->delete('galeri', $where);
    }

    public function get_where($where = null)
    {
        return $this->db->get_where('galeri', $where);
    }
}
