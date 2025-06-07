<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masukan_model extends CI_Model {
    public function create_masukan($data) {
        $this->db->insert('masukan', $data);
        return $this->db->insert_id();
    }

    public function get_all_masukan() {
        return $this->db->get('masukan')->result_array();
    }

    public function count_masukan() {
        return $this->db->count_all('masukan');
    }
}