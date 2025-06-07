<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masukan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $this->load->model('Masukan_model');
    }

    public function index() {
        $data['masukan'] = $this->Masukan_model->get_all_masukan();
        $this->load->view('templates/header');
        $this->load->view('admin/masukan_list', $data);
        $this->load->view('templates/footer');
    }
}
