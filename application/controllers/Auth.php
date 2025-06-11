<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('M_admin');
    }

    // Login
    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    // Login function
    private function _login()
{
    $username = $this->input->post('nama'); // input login form 'nama'
    $password = $this->input->post('password');

    // Ambil data dari tabel admins berdasarkan username
    $user = $this->db->get_where('admins', ['username' => $username])->row_array();

    if ($user) {
        // Karena password di database masih plain text, kita bandingkan langsung
        if ($password == $user['password']) {
            $data = [
                'id' => $user['id'],
                'nama' => $user['username'],
            ];
            $this->session->set_userdata($data);

            redirect('admin/dashboard'); // Ganti sesuai halaman tujuan login
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
            redirect('Auth');
        }
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak ditemukan!</div>');
        redirect('Auth');
    }
}

    // Logout
    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout!</div>');
        redirect('login');
    }
}