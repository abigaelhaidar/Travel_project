<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookings extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $this->load->model('Booking_model');
    }

    public function index() {
        $data['bookings'] = $this->Booking_model->get_all_bookings();
        $this->load->view('templates/header');
        $this->load->view('admin/bookings_list', $data);
        $this->load->view('templates/footer');
    }
}