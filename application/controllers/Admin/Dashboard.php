<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $this->load->model('Paket_model');
        $this->load->model('Booking skyscanner_model');
        $this->load->model('Masukan_model');
    }

    public function index() {
        $data['paket_count'] = $this->Paket_model->count_pakets();
        $data['booking_count'] = $this->Booking_model->count_bookings();
        $data['masukan_count'] = $this->Masukan_model->count_masukan();

        $this->load->view('templates/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }
}