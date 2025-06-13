<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_admin');
        // Uncomment jika ingin proteksi login admin
        // if ($this->session->userdata('admin_logged_in') !== TRUE) {
        //     redirect('auth/login');
        // }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('admins', ['id' => $this->session->userdata('id')])->row_array();

        $this->load->view('templateadmin/header', $data);
        $this->load->view('templateadmin/topbar', $data);
        $this->load->view('templateadmin/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templateadmin/footer', $data);
    }

    // Halaman Paket Wisata
    public function paket_wisata()
    {
        $data['user'] = $this->db->get_where('admins', ['id' => $this->session->userdata('id')])->row_array();
        $data['paket'] = $this->db->get('pakets')->result_array();

        $this->load->view('templateadmin/header', $data);
        $this->load->view('templateadmin/topbar', $data);
        $this->load->view('templateadmin/sidebar', $data);
        $this->load->view('admin/paket_wisata', $data);
        $this->load->view('templateadmin/footer', $data);
    }

    // Fungsi tambah paket wisata
    public function add_paket()
    {
        $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        $this->load->helper(['file', 'form']);
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/tambah_paket');
        } else {
            $upload_file = null;
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './uploads/paket/';
                $config['allowed_types'] = 'jpg|png|jpeg|webp';
                $config['max_size'] = 10000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $upload_file = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/paket_wisata');
                    return;
                }
            }

            $data = array(
                'nama_paket' => $this->input->post('nama_paket'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'foto' => $upload_file,
            );

            if ($this->M_admin->insert_paket($data)) {
                $this->session->set_flashdata('success', 'Paket berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan. Paket gagal ditambahkan.');
            }
            redirect('admin/paket_wisata');
        }
    }

    // Fungsi edit paket wisata
    public function edit_paket($id)
    {
        $paket = $this->db->get_where('pakets', ['id' => $id])->row_array();

        $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $data['paket'] = $paket;
            $this->load->view('admin/edit_paket', $data);
        } else {
            $upload_img = $paket['foto'];
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './uploads/paket/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
                $config['max_size'] = 10000;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    // Hapus foto lama jika ada
                    if ($upload_img && file_exists('./uploads/paket/' . $upload_img)) {
                        unlink('./uploads/paket/' . $upload_img);
                    }
                    $upload_img = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengupload foto. ' . $this->upload->display_errors());
                    redirect('admin/edit_paket/' . $id);
                    return;
                }
            }

            $update = array(
                'nama_paket' => $this->input->post('nama_paket'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'foto' => $upload_img,
            );

            $this->db->where('id', $id);
            if ($this->db->update('pakets', $update)) {
                $this->session->set_flashdata('success', 'Paket berhasil diedit!');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengupdate data.');
            }
            redirect('admin/paket_wisata');
        }
    }

    // Fungsi hapus paket wisata
    public function hapus_paket($id)
    {
        $row = $this->db->get_where('pakets', ['id' => $id])->row();

        if (!$row) {
            $this->session->set_flashdata('error', 'Paket tidak ditemukan.');
            redirect('admin/paket_wisata');
            return;
        }

        if (!empty($row->foto)) {
            $file_path = './uploads/paket/' . $row->foto;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        $this->db->where('id', $id);
        if ($this->db->delete('pakets')) {
            $this->session->set_flashdata('success', 'Paket berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus paket.');
        }

        redirect('admin/paket_wisata');
    }
}