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

    // Halaman Itinerary
   // Halaman Itinerary
    public function itinerary($pakets_id)
    {
        $this->load->model('M_admin');
$data['user'] = $this->db->get_where('admins', ['id' => $this->session->userdata('id')])->row_array();
        $data['paket'] = $this->M_admin->get_paket_by_id($pakets_id);
        $data['itinerary_list'] = $this->M_admin->get_itinerary_by_paket($pakets_id);

        $this->load->view('templateadmin/header', $data);
        $this->load->view('templateadmin/topbar', $data);
        $this->load->view('templateadmin/sidebar', $data);
        $this->load->view('admin/itinerary', $data);
        $this->load->view('templateadmin/footer', $data);
    }

    // Ambil semua itinerary untuk satu paket
    public function get_itinerary_by_paket($pakets_id)
    {
        return $this->db->get_where('itinerary', ['pakets_id' => $pakets_id])->result_array();
    }

    // Tambah Itinerary
    public function add_itinerary($pakets_id)
    {
        $this->load->model('M_admin');
        $this->load->helper(['file', 'form']);

        if ($this->input->post()) {
            $upload_file = null;
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './uploads/itinerary/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
                $config['max_size'] = 2048;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $upload_file = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/itinerary/'.$pakets_id);
                    return;
                }
            }

            $data = [
                'pakets_id' => $pakets_id,
                'day' => $this->input->post('day'),
                'judul' => $this->input->post('judul'),
                'note' => $this->input->post('note'),
                'list' => $this->input->post('list'),
                'deskripsi_itinerary' => $this->input->post('deskripsi_itinerary'),
                'foto' => $upload_file
            ];

            if ($this->M_admin->insert_itinerary($data)) {
                $this->session->set_flashdata('success', 'Data itinerary berhasil ditambah!');
            } else {
                $this->session->set_flashdata('error', 'Data itinerary gagal ditambah!');
            }
            redirect('admin/itinerary/'.$pakets_id);
        } else {
            $data['pakets_id'] = $pakets_id;
            $this->load->view('admin/itinerary_add', $data);
        }
    }

    // Edit Itinerary
    public function edit_itinerary($id)
    {
        $this->load->model('M_admin');
        $itinerary = $this->M_admin->get_itinerary_by_id($id);
        if ($this->input->post()) {
            $data = [
                'day' => $this->input->post('day'),
                'judul' => $this->input->post('judul'),
                'note' => $this->input->post('note'),
                'list' => $this->input->post('list'),
                'deskripsi_itinerary' => $this->input->post('deskripsi_itinerary'),
            ];
            // Upload foto jika ada
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './uploads/itinerary/';
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['max_size'] = 2048;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $data['foto'] = $this->upload->data('file_name');
                }
            }
            if ($this->M_admin->update_itinerary($id, $data)) {
                $this->session->set_flashdata('success', 'Data itinerary berhasil diupdate!');
            } else {
                $this->session->set_flashdata('error', 'Data itinerary gagal diupdate!');
            }
            redirect('admin/itinerary/'.$itinerary['pakets_id']);
        } else {
            $data['itinerary'] = $itinerary;
            $this->load->view('admin/itinerary_edit', $data);
        }
    }

    // Hapus Itinerary
    public function delete_itinerary($id)
    {
        $this->load->model('M_admin');
        $itinerary = $this->M_admin->get_itinerary_by_id($id);
        $pakets_id = $itinerary['pakets_id'];
        if ($this->M_admin->delete_itinerary($id)) {
            $this->session->set_flashdata('success', 'Data itinerary berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data itinerary gagal dihapus!');
        }
        redirect('admin/itinerary/'.$pakets_id);
    }
}