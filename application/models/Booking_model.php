<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {
    public function create_booking($data) {
        $this->db->insert('bookings', $data);
        return $this->db->insert_id();
    }

    public function get_all_bookings() {
        $this->db->select('bookings.*, pakets.nama_paket');
        $this->db->from('bookings');
        $this->db->join('pakets', 'bookings.paket_id = pakets.id');
        return $this->db->get()->result_array();
    }

    public function count_bookings() {
        return $this->db->count_all('bookings');
    }
}