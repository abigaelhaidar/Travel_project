<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        $this->load->model('Paket_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['pakets'] = $this->Paket_model->get_all_pakets();
        $this->load->view('templates/header');
        $this->load->view('admin/paket_list', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('admin/paket_create');
            $this->load->view('templates/footer');
        } else {
            $config['upload_path'] = './assets/uploads/paket/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/paket/create');
            } else {
                $upload_data = $this->upload->data();
                $data = [
                    'nama_paket' => $this->input->post('nama_paket'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'harga' => $this->input->post('harga'),
                    'foto' => $upload_data['file_name']
                ];
                $this->Paket_model->create_paket($data);
                $this->session->set_flashdata('success', 'Paket created successfully');
                redirect('admin/paket');
            }
        }
    }

    public function edit($id) {
        $data['paket'] = $this->Paket_model->get_paket_by_id($id);
        if (!$data['paket']) {
            show_404();
        }

        $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('admin/paket_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data_update = [
                'nama_paket' => $this->input->post('nama_paket'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga')
            ];

            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './assets/uploads/paket/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 2048;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    // Delete old image
                    if (file_exists('./assets/uploads/paket/' . $data['paket']['foto'])) {
                        unlink('./assets/uploads/paket/' . $data['paket']['foto']);
                    }
                    $upload_data = $this->upload->data();
                    $data_update['foto'] = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/paket/edit/' . $id);
                }
            }

            $this->Paket_model->update_paket($id, $data_update);
            $this->session->set_flashdata('success', 'Paket updated successfully');
            redirect('admin/paket');
        }
    }

    public function delete($id) {
        $paket = $this->Paket_model->get_paket_by_id($id);
        if (!$paket) {
            show_404();
        }
        if (file_exists('./assets/uploads/paket/' . $paket['foto'])) {
            unlink('./assets/uploads/paket/' . $paket['foto']);
        }
        $this->Paket_model->delete_paket($id);
        $this->session->set_flashdata('success', 'Paket deleted successfully');
        redirect('admin/paket');
    }
}