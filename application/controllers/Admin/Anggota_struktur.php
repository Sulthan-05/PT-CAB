
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_struktur extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->library('upload');
    }

    private function tampilkan($view, $data) {
        $this->load->view('layout/head', $data);
        $this->load->view($view, $data);
        $this->load->view('layout/foot');
    }

    public function index() {
        $data['judul'] = 'Jajaran Anggota Struktur';
        $data['anggota'] = $this->db
            ->order_by('urutan', 'ASC')
            ->order_by('id_anggota', 'ASC')
            ->get('anggota_struktur')
            ->result();

        $this->tampilkan('admin/anggota_struktur/index', $data);
    }

    public function tambah() {
        $data['judul'] = 'Tambah Anggota Struktur';
        $data['anggota'] = null;
        $this->tampilkan('admin/anggota_struktur/form', $data);
    }

    private function upload_foto() {
        if (empty($_FILES['foto']['name'])) {
            return ['status' => true, 'nama' => null];
        }

        $folder = FCPATH . 'assets/uploads/anggota_struktur/';

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        $config['upload_path'] = $folder;
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = true;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto')) {
            return [
                'status' => false,
                'error' => strip_tags($this->upload->display_errors('', ''))
            ];
        }

        return [
            'status' => true,
            'nama' => $this->upload->data('file_name')
        ];
    }

    public function simpan() {
        $nama = trim($this->input->post('nama', true));
        $jabatan = trim($this->input->post('jabatan', true));

        if ($nama === '' || $jabatan === '') {
            $this->session->set_flashdata('error', 'Nama dan jabatan wajib diisi.');
            redirect('admin/anggota_struktur/tambah');
            return;
        }

        $upload = $this->upload_foto();

        if (!$upload['status']) {
            $this->session->set_flashdata('error', $upload['error']);
            redirect('admin/anggota_struktur/tambah');
            return;
        }

        $data = [
            'nama' => $nama,
            'jabatan' => $jabatan,
            'foto' => $upload['nama'],
            'deskripsi' => $this->input->post('deskripsi', true),
            'urutan' => (int) $this->input->post('urutan')
        ];

        $this->db->insert('anggota_struktur', $data);

        $this->session->set_flashdata('success', 'Anggota struktur berhasil ditambahkan.');
        redirect('admin/anggota_struktur');
    }

    public function edit($id) {
        $anggota = $this->db
            ->get_where('anggota_struktur', ['id_anggota' => (int) $id])
            ->row();

        if (!$anggota) {
            show_404();
            return;
        }

        $data['judul'] = 'Edit Anggota Struktur';
        $data['anggota'] = $anggota;

        $this->tampilkan('admin/anggota_struktur/form', $data);
    }

    public function update($id) {
        $anggota = $this->db
            ->get_where('anggota_struktur', ['id_anggota' => (int) $id])
            ->row();

        if (!$anggota) {
            show_404();
            return;
        }

        $nama = trim($this->input->post('nama', true));
        $jabatan = trim($this->input->post('jabatan', true));

        if ($nama === '' || $jabatan === '') {
            $this->session->set_flashdata('error', 'Nama dan jabatan wajib diisi.');
            redirect('admin/anggota_struktur/edit/' . $id);
            return;
        }

        $upload = $this->upload_foto();

        if (!$upload['status']) {
            $this->session->set_flashdata('error', $upload['error']);
            redirect('admin/anggota_struktur/edit/' . $id);
            return;
        }

        $data = [
            'nama' => $nama,
            'jabatan' => $jabatan,
            'deskripsi' => $this->input->post('deskripsi', true),
            'urutan' => (int) $this->input->post('urutan')
        ];

        if ($upload['nama'] !== null) {
            $data['foto'] = $upload['nama'];
        }

        $this->db->where('id_anggota', (int) $id);
        $this->db->update('anggota_struktur', $data);

        if ($upload['nama'] !== null && !empty($anggota->foto)) {
            $foto_lama = FCPATH . 'assets/uploads/anggota_struktur/' . $anggota->foto;
            if (is_file($foto_lama)) {
                unlink($foto_lama);
            }
        }

        $this->session->set_flashdata('success', 'Data anggota berhasil diperbarui.');
        redirect('admin/anggota_struktur');
    }

    public function hapus($id) {
        $anggota = $this->db
            ->get_where('anggota_struktur', ['id_anggota' => (int) $id])
            ->row();

        if (!$anggota) {
            show_404();
            return;
        }

        $this->db->delete('anggota_struktur', ['id_anggota' => (int) $id]);

        if (!empty($anggota->foto)) {
            $foto = FCPATH . 'assets/uploads/anggota_struktur/' . $anggota->foto;
            if (is_file($foto)) {
                unlink($foto);
            }
        }

        $this->session->set_flashdata('success', 'Anggota struktur berhasil dihapus.');
        redirect('admin/anggota_struktur');
    }
}
