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

    // function untuk halaman destinasi_karimunjawa
    public function destinasi_karimunjawa()
    {
        $this->load->model('M_admin');
        $data['pakets'] = $this->M_admin->get_pakets_karimunjawa();
        $data['title'] = 'Mafen Tour Travel | Destinasi Karimunjawa';

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('home/destinasi_karimunjawa', $data);
        $this->load->view('template/footer', $data);
    } 

    public function detail_paket($id)
    {
        $this->load->model('M_admin');
        $data['paket'] = $this->M_admin->get_paket_by_id($id);
        
        if (!$data['paket']) {
            show_404();
        }

        $data['itinerary_list'] = $this->M_admin->get_itinerary_by_paket($id);
        $data['title'] = 'Detail Paket - ' . $data['paket']['nama_paket'];
        $this->load->helper('text'); // untuk word_limiter di view
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('home/detail_paket', $data);
        $this->load->view('template/footer', $data);
    }

    // Function untuk halaman booking paket
    public function booking_paket()
    {
        $this->load->model('M_admin');
        $data['title'] = 'Booking Paket Wisata';
        $data['pakets'] = $this->M_admin->get_all_pakets();
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('home/booking_paket', $data);
        $this->load->view('template/footer', $data);
    }

    public function simpan_pesanan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('negara', 'Negara', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('paket_wisata', 'Paket Wisata', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|greater_than[0]');
        $this->form_validation->set_rules('total', 'Total', 'required|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors('<li>', '</li>'));
            redirect('booking-paket');
        }

        $this->load->model('M_admin');
        $data = [
            'nama'          => $this->input->post('nama'),
            'email'         => $this->input->post('email'),
            'telepon'       => $this->input->post('telepon'),
            'negara'        => $this->input->post('negara'),
            'provinsi'      => $this->input->post('provinsi'),
            'alamat'        => $this->input->post('alamat'),
            'paket_wisata'  => $this->input->post('paket_wisata'),
            'jumlah'        => $this->input->post('jumlah'),
            'total'         => $this->input->post('total'),
            'pesan'         => $this->input->post('pesan')
        ];

        if ($this->M_admin->simpan_pesanan($data)) {
            $this->session->set_flashdata('success', 'Booking berhasil! Silakan konfirmasi ke WhatsApp.');
            // WhatsApp
            $wa_number = "628818533443";
            $wa_message = urlencode(
                "Halo Admin, saya ingin melakukan pemesanan wisata:\n\n"
                . "Nama: {$data['nama']}\n"
                . "Email: {$data['email']}\n"
                . "Telepon: {$data['telepon']}\n"
                . "Negara: {$data['negara']}\n"
                . "Provinsi: {$data['provinsi']}\n"
                . "Alamat: {$data['alamat']}\n"
                . "Paket Wisata: {$data['paket_wisata']}\n"
                . "Jumlah Orang: {$data['jumlah']}\n"
                . "Total Harga: Rp " . number_format($data['total'], 0, ',', '.') . "\n"
                . "Pesan Khusus: {$data['pesan']}"
            );
            redirect("https://wa.me/$wa_number?text=$wa_message");
        } else {
            $this->session->set_flashdata('error', 'Booking gagal disimpan. Silakan coba lagi.');
            redirect('booking-paket');
        }
    }
}