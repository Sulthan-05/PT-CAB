<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load library yang diperlukan
       
        // Cek login admin (sesuaikan dengan sistem login Anda)
        // if (!$this->session->userdata('logged_in')) {
        //     redirect('login');

        // }
    }

    // Halaman Utama Admin Produk
    public function index() {
        $data['judul'] = 'Produk Beras';

        // Ambil data kategori untuk filter dan dropdown
        // Asumsi nama tabel kategori adalah 'kategori' dan field 'id_kategori', 'nama_kategori'
        // Jika nama tabel berbeda, silakan sesuaikan.
        $data['kategori'] = $this->db->get('kategori')->result();

        // Ambil data produk dengan join kategori
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->order_by('produk.id_produk', 'DESC');
        $data['produk'] = $this->db->get()->result();

        // Load view
        $this->load->view('admin/produk/index', $data);
    }

    // Method Tambah Produk
    public function tambah() {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('berat', 'Berat', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('alert', '
                <div id="alertProduk" class="alert alert-danger">
                    '.validation_errors().'
                </div>
            ');
            redirect('admin/produk');
        } else {
            // Konfigurasi Upload
            $config['upload_path']   = './assets/uploads/produk/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048; // 2MB
            $config['encrypt_name']  = TRUE; // Nama file unik otomatis

            // Buat folder jika belum ada
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, TRUE);
            }

            $this->upload->initialize($config);

            $foto_utama = '';
            if (!empty($_FILES['foto_utama']['name'])) {
                if ($this->upload->do_upload('foto_utama')) {
                    $upload_data = $this->upload->data();
                    $foto_utama = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('alert', '
                        <div id="alertProduk" class="alert alert-danger">
                            Gagal upload gambar: ' . $this->upload->display_errors() . '
                        </div>
                    ');
                    redirect('admin/produk');
                }
            }

            // Buat Slug dari Nama Produk
            $nama_produk = $this->input->post('nama_produk');
            $slug = url_title($nama_produk, 'dash', TRUE);

            // Logika WhatsApp
            $nomor_wa = $this->input->post('nomor_whatsapp');
            $tautan_wa = '';
            if (!empty($nomor_wa)) {
                // Bersihkan nomor dari karakter non-digit
                $nomor_wa = preg_replace('/[^0-9]/', '', $nomor_wa);
                // Ubah 08 menjadi 628
                if (substr($nomor_wa, 0, 1) === '0') {
                    $nomor_wa = '62' . substr($nomor_wa, 1);
                } elseif (substr($nomor_wa, 0, 2) !== '62') {
                    $nomor_wa = '62' . $nomor_wa;
                }
                $tautan_wa = 'https://wa.me/' . $nomor_wa;
            }

            $data = [
                'id_kategori'       => $this->input->post('id_kategori'),
                'nama_produk'       => $nama_produk,
                'slug'              => $slug,
                'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
                'deskripsi'         => $this->input->post('deskripsi'),
                'spesifikasi'       => $this->input->post('spesifikasi'),
                'berat'             => $this->input->post('berat'),
                'foto_utama'        => $foto_utama,
                'nomor_whatsapp'    => $nomor_wa,
                'tautan_whatsapp'   => $tautan_wa,
                'produk_unggulan'   => $this->input->post('produk_unggulan') ? 1 : 0
            ];

            $this->db->insert('produk', $data);

            $this->session->set_flashdata('alert', '
                <div id="alertProduk" class="alert alert-success">
                    Produk berhasil ditambahkan.
                </div>
            ');
            redirect('admin/produk');
        }
    }

    // Method Edit Produk
    public function edit($id) {
        $id = (int)$id;
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
             $this->session->set_flashdata('alert', '
                <div id="alertProduk" class="alert alert-danger">
                    '.validation_errors().'
                </div>
            ');
            redirect('admin/produk');
        } else {
            // Ambil data lama
            $old_data = $this->db->get_where('produk', ['id_produk' => $id])->row();
            if (!$old_data) {
                redirect('admin/produk');
            }

            // Konfigurasi Upload
            $config['upload_path']   = './assets/uploads/produk/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;
            $this->upload->initialize($config);

            $foto_utama = $old_data->foto_utama; // Default foto lama

            if (!empty($_FILES['foto_utama']['name'])) {
                if ($this->upload->do_upload('foto_utama')) {
                    // Hapus foto lama jika ada
                    if ($foto_utama && file_exists('./assets/uploads/produk/' . $foto_utama)) {
                        unlink('./assets/uploads/produk/' . $foto_utama);
                    }
                    $upload_data = $this->upload->data();
                    $foto_utama = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('alert', '
                        <div id="alertProduk" class="alert alert-danger">
                            Gagal upload gambar: ' . $this->upload->display_errors() . '
                        </div>
                    ');
                    redirect('admin/produk');
                }
            }

            // Buat Slug
            $nama_produk = $this->input->post('nama_produk');
            $slug = url_title($nama_produk, 'dash', TRUE);

            // Logika WhatsApp
            $nomor_wa = $this->input->post('nomor_whatsapp');
            $tautan_wa = '';
            if (!empty($nomor_wa)) {
                $nomor_wa = preg_replace('/[^0-9]/', '', $nomor_wa);
                if (substr($nomor_wa, 0, 1) === '0') {
                    $nomor_wa = '62' . substr($nomor_wa, 1);
                } elseif (substr($nomor_wa, 0, 2) !== '62') {
                    $nomor_wa = '62' . $nomor_wa;
                }
                $tautan_wa = 'https://wa.me/' . $nomor_wa;
            }

            $data = [
                'id_kategori'       => $this->input->post('id_kategori'),
                'nama_produk'       => $nama_produk,
                'slug'              => $slug,
                'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
                'deskripsi'         => $this->input->post('deskripsi'),
                'spesifikasi'       => $this->input->post('spesifikasi'),
                'berat'             => $this->input->post('berat'),
                'foto_utama'        => $foto_utama,
                'nomor_whatsapp'    => $nomor_wa,
                'tautan_whatsapp'   => $tautan_wa,
                'produk_unggulan'   => $this->input->post('produk_unggulan') ? 1 : 0
            ];

            $this->db->where('id_produk', $id);
            $this->db->update('produk', $data);

            $this->session->set_flashdata('alert', '
                <div id="alertProduk" class="alert alert-success">
                    Produk berhasil diperbarui.
                </div>
            ');
            redirect('admin/produk');
        }
    }

    // Method Hapus Produk
    public function hapus($id) {
        $id = (int)$id;
        
        // Ambil data untuk hapus file fisik
        $produk = $this->db->get_where('produk', ['id_produk' => $id])->row();
        
        if ($produk) {
            if ($produk->foto_utama && file_exists('./assets/uploads/produk/' . $produk->foto_utama)) {
                unlink('./assets/uploads/produk/' . $produk->foto_utama);
            }
            
            $this->db->where('id_produk', $id);
            $this->db->delete('produk');

            $this->session->set_flashdata('alert', '
                <div id="alertProduk" class="alert alert-success">
                    Produk berhasil dihapus.
                </div>
            ');
        } else {
             $this->session->set_flashdata('alert', '
                <div id="alertProduk" class="alert alert-danger">
                    Produk tidak ditemukan.
                </div>
            ');
        }
        
        redirect('admin/produk');
    }
}