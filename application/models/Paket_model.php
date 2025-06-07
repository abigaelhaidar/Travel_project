<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model {
    public function get_all_pakets() {
        return $this->db->get('pakets')->result_array();
    }

    public function get_paket_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('pakets')->row_array();
    }

    public function create_paket($data) {
        $this->db->insert('pakets', $data);
        return $this->db->insert_id();
    }

    public function update_paket($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('pakets', $data);
        return $this->db->affected_rows();
    }

    public function delete_paket($id) {
        $this->db->where('id', $id);
        $this->db->delete('pakets');
        return $this->db->affected_rows();
    }

    public function count_pakets() {
        return $this->db->count_all('pakets');
    }
}