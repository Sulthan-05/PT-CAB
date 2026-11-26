<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'form', 'text']);
        $this->load->library(['session', 'upload']);

        // Folder penyimpanan gambar
        $folder = FCPATH . 'assets/uploads/informasi/';

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }
    }

    public function index()
    {
        $data['judul'] = 'Informasi';
        $data['informasi'] = $this->db
            ->order_by('created_at', 'DESC')
            ->get('informasi')
            ->result_array();

        $this->load->view('admin/informasi/index', $data);
    }

    public function tambah()
    {
        if ($this->input->method() !== 'post') {
            $data['judul'] = 'Tambah Informasi';
            $data['aksi'] = 'tambah';
            $data['informasi'] = null;
            $this->load->view('admin/informasi/form', $data);
            return;
        }

        $gambar = $this->upload_gambar();

        if ($gambar === false) {
            $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
            redirect('admin/informasi/tambah');
            return;
        }

        $judul = trim($this->input->post('judul', true));

        $data = [
            'judul' => $judul,
            'slug' => url_title($judul, 'dash', true),
            'kategori' => $this->input->post('kategori', true),
            'ringkasan' => $this->input->post('ringkasan', true),
            'isi' => $this->input->post('isi'),
            'gambar' => $gambar,
            'lokasi' => $this->input->post('lokasi', true),
            'tanggal_mulai' => $this->tanggal_kosong($this->input->post('tanggal_mulai')),
            'tanggal_selesai' => $this->tanggal_kosong($this->input->post('tanggal_selesai')),
            'status' => $this->input->post('status', true)
        ];

        if ($judul === '' || $data['ringkasan'] === '' || trim($data['isi']) === '') {
            if ($gambar) {
                @unlink(FCPATH . 'assets/uploads/informasi/' . $gambar);
            }

            $this->session->set_flashdata('error', 'Judul, ringkasan, dan isi informasi wajib diisi.');
            redirect('admin/informasi/tambah');
            return;
        }

        $this->db->insert('informasi', $data);

        $this->session->set_flashdata('success', 'Informasi berhasil ditambahkan.');
        redirect('admin/informasi');
    }

    public function edit($id)
    {
        $informasi = $this->db
            ->get_where('informasi', ['id_informasi' => $id])
            ->row_array();

        if (!$informasi) {
            show_404();
            return;
        }

        if ($this->input->method() !== 'post') {
            $data['judul'] = 'Edit Informasi';
            $data['aksi'] = 'edit/' . $id;
            $data['informasi'] = $informasi;
            $this->load->view('admin/informasi/form', $data);
            return;
        }

        $judul = trim($this->input->post('judul', true));
        $gambar_baru = $this->upload_gambar();

        if ($gambar_baru === false) {
            $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
            redirect('admin/informasi/edit/' . $id);
            return;
        }

        $data = [
            'judul' => $judul,
            'slug' => url_title($judul, 'dash', true),
            'kategori' => $this->input->post('kategori', true),
            'ringkasan' => $this->input->post('ringkasan', true),
            'isi' => $this->input->post('isi'),
            'lokasi' => $this->input->post('lokasi', true),
            'tanggal_mulai' => $this->tanggal_kosong($this->input->post('tanggal_mulai')),
            'tanggal_selesai' => $this->tanggal_kosong($this->input->post('tanggal_selesai')),
            'status' => $this->input->post('status', true)
        ];

        if ($judul === '' || $data['ringkasan'] === '' || trim($data['isi']) === '') {
            if ($gambar_baru) {
                @unlink(FCPATH . 'assets/uploads/informasi/' . $gambar_baru);
            }

            $this->session->set_flashdata('error', 'Judul, ringkasan, dan isi informasi wajib diisi.');
            redirect('admin/informasi/edit/' . $id);
            return;
        }

        if ($gambar_baru) {
            $data['gambar'] = $gambar_baru;
        }

        $this->db->where('id_informasi', $id);
        $this->db->update('informasi', $data);

        if ($gambar_baru && !empty($informasi['gambar'])) {
            $file_lama = FCPATH . 'assets/uploads/informasi/' . basename($informasi['gambar']);

            if (is_file($file_lama)) {
                unlink($file_lama);
            }
        }

        $this->session->set_flashdata('success', 'Informasi berhasil diperbarui.');
        redirect('admin/informasi');
    }

    public function hapus($id)
    {
        $informasi = $this->db
            ->get_where('informasi', ['id_informasi' => $id])
            ->row_array();

        if (!$informasi) {
            show_404();
            return;
        }

        $this->db->delete('informasi', ['id_informasi' => $id]);

        if (!empty($informasi['gambar'])) {
            $file = FCPATH . 'assets/uploads/informasi/' . basename($informasi['gambar']);

            if (is_file($file)) {
                unlink($file);
            }
        }

        $this->session->set_flashdata('success', 'Informasi berhasil dihapus.');
        redirect('admin/informasi');
    }

    private function upload_gambar()
    {
        if (empty($_FILES['gambar']['name'])) {
            return null;
        }

        $config['upload_path'] = FCPATH . 'assets/uploads/informasi/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar')) {
            return false;
        }

        return $this->upload->data('file_name');
    }

    private function tanggal_kosong($tanggal)
    {
        return empty($tanggal) ? null : $tanggal;
    }
}
