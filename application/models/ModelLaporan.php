<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelLaporan extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('jenis_pemeriksaan', $data);
    }

    public function tampilBiaya()
    {
        return $this->db->get('jenis_pemeriksaan');
    }

    public function hapusBiaya($where = null)
    {
        $this->db->delete('jenis_pemeriksaan', $where);
    }

    public function updateBiaya($data = null, $where = null)
    {
        $this->db->update('jenis_pemeriksaan', $data, $where);
    }

    public function biayaWhere($where)
    {
        return $this->db->get_where('jenis_pemeriksaan', $where);
    }
}
