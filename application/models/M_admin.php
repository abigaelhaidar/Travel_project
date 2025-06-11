<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends Ci_Model
{
    //admin
    public function get_admin($username) {
        return $this->db->get_where('admins', ['username' => $username])->row_array();
    }
    
    // Paket
    public function insert_paket($data)
    {
        return $this->db->insert('paket', $data);
    }

    // funtion get paket array
    public function get_paket()
    {
        return $this->db->get('paket')->result_array();
    }

    // funtion get all paket result
    public function get_all_pakets()
    {
        return $this->db->get('paket')->result();
    }

    public function simpan_pesanan($data)
    {
        return $this->db->insert('pesanan_wisata', $data);
    }

    // Travel
    public function insert_travel($data)
    {
        return $this->db->insert('travel', $data);
    }

    public function get_all_travel()
    {
        return $this->db->get('travel')->result();
    }

      public function simpan_pesan($data)
    {
        return $this->db->insert('kontak', $data);
    }
}
