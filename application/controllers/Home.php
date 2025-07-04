<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        date_default_timezone_set('Asia/Jakarta');
    }

  public function index()
  {
    $this->load->model('M_admin');
    $data['pakets'] = $this->M_admin->get_all_pakets();

        $data['title'] = 'Mafen Tour Travel | Liburan Nyaman & Terjangkau ke Destinasi Impian Anda';
        
        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('template/footer', $data);
  }

  // Function untuk halaman tentang kami
    public function tentang_kami()
    {
        $data['title'] = 'Mafen Tour Travel | Tentang Kami';

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('home/tentang_kami', $data);
        $this->load->view('template/footer', $data);
    }

    // Function untuk halaman syarat dan ketentuan
    public function syarat_dan_ketentuan()
    {
        $data['title'] = 'Mafen Tour Travel | Syarat dan Ketentuan';

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('home/syarat_dan_ketentuan', $data);
        $this->load->view('template/footer', $data);
    }

    // Function untuk halaman kebijakan
    public function kebijakan_privasi()
    {
        $data['title'] = 'Mafen Tour Travel | Kebijakan Privasi';

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('home/kebijakan_privasi', $data);
        $this->load->view('template/footer', $data);
    }

     // Function untuk halaman kontak
    public function kontak()
    {
        $data['title'] = 'Mafen Tour Travel | Kontak';

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('home/kontak', $data);
        $this->load->view('template/footer', $data);
    }

    // Function untuk menyimpan data masukan
    public function simpan()
    {
    
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect(base_url('kontak'));
        } else {

            // Data yang akan disimpan ke database
            $data = array(
                'nama'       => $this->input->post('nama'),
                'email'      => $this->input->post('email'),
                'subject'    => $this->input->post('subject'),
                'pesan'      => $this->input->post('pesan'),
                'created_at' => date('Y-m-d H:i:s')
            );

            $this->db->insert('masukan', $data);

            $this->session->set_flashdata('success', 'Pesan/masukan berhasil dikirim! Kami akan menghubungi Anda secepatnya.');
            redirect('kontak');
        }
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

    // function untuk halaman destinasi_magelang
    public function destinasi_magelang()
    {
        $this->load->model('M_admin');
        $data['pakets'] = $this->M_admin->get_pakets_magelang();
        $data['title'] = 'Mafen Tour Travel | Destinasi Magelang';

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('home/destinasi_magelang', $data);
        $this->load->view('template/footer', $data);
    } 
    // function untuk halaman destinasi_dieng
    public function destinasi_dieng()
    {
        $this->load->model('M_admin');
        $data['pakets'] = $this->M_admin->get_pakets_dieng();
        $data['title'] = 'Mafen Tour Travel | Destinasi Dieng';

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('home/destinasi_dieng', $data);
        $this->load->view('template/footer', $data);
    } 


    // Function untuk halaman detail paket
    public function detail_paket($id)
    {
        $this->load->model('M_admin');
        $data['paket'] = $this->M_admin->get_paket_by_id($id);

        if (!$data['paket']) {
            show_404();
        }

        $nama_paket = $data['paket']['nama_paket'];
        if (stripos($nama_paket, 'Karimun Jawa') !== false) {
            $paket_lainnya = $this->M_admin->get_pakets_karimunjawa();
        } elseif (stripos($nama_paket, 'Magelang') !== false) {
            $paket_lainnya = $this->M_admin->get_pakets_magelang();
        } elseif (stripos($nama_paket, 'Dieng') !== false) {
            $paket_lainnya = $this->M_admin->get_pakets_dieng();
        } else {
            $paket_lainnya = $this->M_admin->get_all_pakets();
        }

        // Hilangkan paket yang sedang dibuka
        $data['paket_lainnya'] = array_filter($paket_lainnya, function($p) use ($id) {
            return $p['id'] != $id;
        });

        $data['itinerary_list'] = $this->M_admin->get_itinerary_by_paket($id);
        $data['title'] = 'Detail Paket - ' . $data['paket']['nama_paket'];
        $this->load->helper('text');
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

    // Function untuk menyimpan pesanan data booking
    public function simpan_pesanan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('negara', 'Negara', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('paket_id', 'Paket Wisata', 'required');
        $this->form_validation->set_rules('jumlah_orang', 'Jumlah', 'required|greater_than[0]');
        $this->form_validation->set_rules('total', 'Total', 'required|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors('<li>', '</li>'));
            redirect('booking_paket');
        }

        $this->load->model('M_admin');
        $paket_id = $this->input->post('paket_id');
        $paket = $this->M_admin->get_paket_by_id($paket_id);

        $data = [
            'nama'          => $this->input->post('nama'),
            'email'         => $this->input->post('email'),
            'telepon'       => $this->input->post('telepon'),
            'negara'        => $this->input->post('negara'),
            'provinsi'      => $this->input->post('provinsi'),
            'alamat'        => $this->input->post('alamat'),
            'paket_id'      => $this->input->post('paket_id'),
            'jumlah_orang'  => $this->input->post('jumlah_orang'),
            'total'         => $this->input->post('total'),
            'special_request' => $this->input->post('pesan')
        ];

        if ($this->M_admin->simpan_booking($data)) {
            $wa_number = "6285851393874";
            $wa_message = urlencode(
                "Halo Admin, saya ingin melakukan pemesanan wisata:\n\n"
                . "Nama: {$data['nama']}\n"
                . "Email: {$data['email']}\n"
                . "Telepon: {$data['telepon']}\n"
                . "Negara: {$data['negara']}\n"
                . "Provinsi: {$data['provinsi']}\n"
                . "Alamat: {$data['alamat']}\n"
                . "Paket Wisata: {$paket['nama_paket']}\n"
                . "Jumlah Orang: {$data['jumlah_orang']}\n"
                . "Total Harga: Rp " . number_format($data['total'], 0, ',', '.') . "\n"
                . "Pesan Khusus: {$data['special_request']}\n\n"
            );
            $wa_url = "https://wa.me/$wa_number?text=$wa_message";
            $this->session->set_flashdata('wa_url', $wa_url);
            redirect('home/konfirmasi_wa');
        } else {
            $this->session->set_flashdata('error', 'Booking gagal disimpan. Silakan coba lagi.');
            redirect('booking_paket');
        }
    }

    // Function untuk konfirmasi WhatsApp
    public function konfirmasi_wa()
    {
        $wa_url = $this->session->flashdata('wa_url');
        $this->load->view('home/konfirmasi_wa', ['wa_url' => $wa_url]);
    }
}