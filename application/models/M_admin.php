<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends Ci_Model
{
    //admin
    public function get_admin($username) {
        return $this->db->get_where('admins', ['username' => $username])->row_array();
    }
    
    // Ambil semua paket
    public function get_all_pakets()
    {
        return $this->db->get('pakets')->result_array();
    }

    // Ambil satu paket berdasarkan id
    public function get_paket_by_id($id)
    {
        return $this->db->get_where('pakets', ['id' => $id])->row_array();
    }

    // Tambah paket
    public function insert_paket($data)
    {
        return $this->db->insert('pakets', $data);
    }

    // Edit paket
    public function update_paket($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pakets', $data);
    }

    // Hapus paket
    public function delete_paket($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('pakets');
    }

    // Ambil paket berdasarkan nama
    public function get_pakets_karimunjawa()
    {
        $this->db->like('nama_paket', 'Karimun Jawa');
        return $this->db->get('pakets')->result_array();
    }

    public function get_pakets_magelang()
    {
        $this->db->like('nama_paket', 'Magelang');
        return $this->db->get('pakets')->result_array();
    }

    public function get_pakets_dieng()
    {
        $this->db->like('nama_paket', 'Dieng');
        return $this->db->get('pakets')->result_array();
    }

    

    // itenerary
    // Ambil semua itinerary untuk satu paket
    public function get_itinerary_by_paket($pakets_id)
    {
        return $this->db->get_where('itinerary', ['pakets_id' => $pakets_id])->result_array();
    }

    // ambil itenerary by id
    public function get_itinerary_by_id($id)
    {
        return $this->db->get_where('itinerary', ['id' => $id])->row_array();
    }

    // CRUD untuk itinerary
    public function insert_itinerary($data)
    {
        return $this->db->insert('itinerary', $data);
    }

    public function update_itinerary($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('itinerary', $data);
    }

    public function delete_itinerary($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('itinerary');
    }

    // Booking Paket
    public function simpan_booking($data)
    {
        return $this->db->insert('bookings', $data);
    }

    public function delete_data_booking_paket($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('bookings');
    }


    //kontak
    public function simpan_masukan($data)
    {
        return $this->db->insert('masukan', $data);
    }

    public function delete_masukan($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('masukan');
    }
}
