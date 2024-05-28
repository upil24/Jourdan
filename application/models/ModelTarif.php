<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTarif extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('tarif', $data);
    }

    public function tampilTarif()
    {
        return $this->db->get('tarif');
    }

    public function cekkode()
    {
        $query = $this->db->query("SELECT MAX(id_tarif) as idtarif from tarif");
        $hasil = $query->row();
        return $hasil->idtarif;
    }

    public function hapusTarif($where = null)
    {
        $this->db->delete('tarif', $where);
    }

    public function tarifWhere($where)
    {
        return $this->db->get_where('tarif', $where);
    }

    public function updateTarif($data = null, $where = null)
    {
        $this->db->update('tarif', $data, $where);
    }
}
