<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function index()
  {
    $this->load->model('M_admin');
    $data['pakets'] = $this->M_admin->get_all_pakets(); // pastikan method ini ada di model

    // pemganggilan title halaman custom
        $data['title'] = 'Mafen Tour Travel | Liburan Nyaman & Terjangkau ke Destinasi Impian Anda';
        
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('template/footer', $data);
  }

  // Function untuk halaman paket
    public function paket_wisata()
    {
        $data['title'] = 'Mafen Tour Travel | Paket Wisata';

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('home/paket_wisata_user', $data);
        $this->load->view('template/footer', $data);
    }
}