<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPembayaran extends CI_Model
{
    public function detail_pelanggan($where = null)
    {
        $this->db->select('pelanggan.*,tarif.*');
        $this->db->from('pelanggan');
        $this->db->join('tarif', 'tarif.id_tarif = pelanggan.id_tarif');
        $this->db->where('pelanggan.id_pelanggan', $where);
        return $this->db->get();
    }

    public function tagihan($where = null)
    {
        $this->db->select('pelanggan.*,tagihan.*');
        $this->db->from('tagihan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
        $this->db->where('pelanggan.id_pelanggan', $where);
        return $this->db->get();
    }

    public function get_no_pembayaran()
    {
        $cd = $this->db->query("SELECT MAX(RIGHT(id_pembayaran,3)) AS kd_max FROM pembayaran WHERE DATE(date_created)=CURDATE()");
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
        return  date('ymdy')  . $kd;
    }

    public function detail_bayar($where = null)
    {

        $this->db->select('tagihan.*,user.id_user,user.nama,penggunaan.*,pelanggan.*,tarif.daya');
        $this->db->from('tagihan');
        $this->db->join('user', 'user.id_user = tagihan.id_user');
        $this->db->join('penggunaan', 'penggunaan.id_penggunaan = tagihan.id_penggunaan');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = tagihan.id_pelanggan');
        $this->db->join('tarif', 'tarif.id_tarif = pelanggan.id_tarif');
        $this->db->where('tagihan.id_tagihan', $where);
        return $this->db->get();
    }

    public function kwintansi($where = null)
    {
        $this->db->select('tagihan.id_pelanggan,
        tagihan.id_penggunaan,
        tagihan.id_tagihan,
        tagihan.bulan,
        tagihan.tahun,
        tagihan.jumlah_meter,
        tagihan.tarifperkwh,
        tagihan.jumlah_bayar,    
        pembayaran.id_pembayaran,   
        pembayaran.date_created,
        pelanggan.nama_p
        ');
        $this->db->from('tagihan');
        $this->db->join('pembayaran', 'tagihan.id_tagihan = pembayaran.id_tagihan');
        $this->db->join('pelanggan', 'tagihan.id_pelanggan = pelanggan.id_pelanggan');
        $this->db->where('tagihan.id_tagihan', $where);
        return $this->db->get();
    }

    public function simpan($data = null)
    {
        $this->db->insert('pembayaran', $data);
    }

    public function updateTagihan($data = null, $where)
    {
        $this->db->update('tagihan', $data, $where);
    }

    public function hapusPembayaran($where = null)
    {
        $this->db->delete('pembayaran', $where);
    }

    public function cetak_pembayaran($a = null, $b = null)
    {
        // $this->db->select('pembayaran.*,user.nama,pelanggan.nama_p');
        // $this->db->from('pembayaran');
        // $this->db->join('user', 'user.id_user = pembayaran.id_user');
        // $this->db->join('pelanggan', 'pelanggan.id_pelanggan = pembayaran.id_pelanggan');
        // $this->db->where('pembayaran.date_created BETWEEN "' . date('Y-m-d', strtotime($a)) . '" and "' . date('Y-m-d', strtotime($b)) . '"');
        // return $this->db->get();

        $query =  $this->db->query("SELECT pembayaran.*,user.nama,pelanggan.nama_p 
        FROM pembayaran 
        JOIN user ON user.id_user = pembayaran.id_user
        JOIN pelanggan ON pelanggan.id_pelanggan = pembayaran.id_pelanggan
        WHERE DATE(pembayaran.date_created) BETWEEN '$a' AND '$b'        
        ");
        return $query->result();
    }

    public function riwayatBayar($where = null)
    {
        $this->db->select('pembayaran.*,user.nama');
        $this->db->from('pembayaran');
        $this->db->join('user', 'user.id_user = pembayaran.id_user');
        $this->db->where('pembayaran.id_pelanggan', $where);
        return $this->db->get();
    }
}
