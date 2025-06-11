<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if ($this->session->userdata('admin_logged_in') !== TRUE) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('admins', ['id' => $this->session->userdata('id')])->row_array();

        $this->load->view('templateadmin/header', $data);
        $this->load->view('templateadmin/topbar', $data);
        $this->load->view('templateadmin/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templateadmin/footer', $data);
    }

}