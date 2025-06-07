<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Paket_model');
        $this->load->model('Booking_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['pakets'] = $this->Paket_model->get_all_pakets();
        $this->load->view('templates/header');
        $this->load->view('booking_form', $data);
        $this->load->view('templates/footer');
    }

    public function submit() {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('paket_id', 'Paket Wisata', 'required');
        $this->form_validation->set_rules('jumlah_orang', 'Jumlah Orang', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['pakets'] = $this->Paket_model->get_all_pakets();
            $this->load->view('templates/header');
            $this->load->view('booking_form', $data);
            $this->load->view('templates/footer');
        } else {
            $paket = $this->Paket_model->get_paket_by_id($this->input->post('paket_id'));
            $jumlah_orang = $this->input->post('jumlah_orang');
            $total = $paket['harga'] * $jumlah_orang;

            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'alamat' => $this->input->post('alamat'),
                'paket_id' => $this->input->post('paket_id'),
                'jumlah_orang' => $jumlah_orang,
                'total' => $total,
                'special_request' => $this->input->post('special_request')
            ];

            $this->Booking_model->create_booking($data);
            $this->session->set_flashdata('success', 'Booking submitted successfully');
            redirect('booking');
        }
    }
}