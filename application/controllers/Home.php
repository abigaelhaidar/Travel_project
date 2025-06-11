<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function index(){
    $user = $this->db->get_where('admins', ['username'])->row_array();

    $this->load->view('admin/dashboard');
  }
}