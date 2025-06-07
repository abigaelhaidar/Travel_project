<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Masukan_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('templates/header');
        $this->load->view('kontak_form');
        $this->load->view('templates/footer');
    }

    public function submit() {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('subject', 'Subject', 'required|trim');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('kontak_form');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'subject' => $this->input->post('subject'),
                'pesan' => $this->input->post('pesan')
            ];

            $this->Masukan_model->create_masukan($data);
            $this->session->set_flashdata('success', 'Pesan submitted successfully');
            redirect('kontak');
        }
    }
}