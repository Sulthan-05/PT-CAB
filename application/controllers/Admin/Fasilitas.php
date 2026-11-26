
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->library(['upload', 'session']);
    }

    private function daftar_kategori() {
        return [
            'Produksi & Pengolahan',
            'Penyimpanan & Gudang',
            'Pengemasan',
            'Quality Control',
            'Distribusi & Logistik',
            'Kantor & Operasional',
            'Fasilitas Umum'
        ];
    }

    public function index() {
        $data['judul'] = 'Fasilitas';
        $data['fasilitas'] = $this->db
            ->order_by('id_fasilitas', 'DESC')
            ->get('fasilitas')
            ->result_array();

        $this->load->view('admin/fasilitas/index', $data);
    }

    public function tambah() {
        $data['judul'] = 'Tambah Fasilitas';
        $data['kategori'] = $this->daftar_kategori();
        $data['fasilitas'] = null;

        $this->load->view('admin/fasilitas/form', $data);
    }

    private function upload_foto() {
        if (empty($_FILES['foto']['name'])) {
            return ['status' => true, 'nama' => null];
        }

        $folder = FCPATH . 'assets/uploads/fasilitas/';

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
        $nama = trim($this->input->post('nama_fasilitas', true));
        $kategori = $this->input->post('kategori', true);

        if ($nama === '' || !in_array($kategori, $this->daftar_kategori(), true)) {
            $this->session->set_flashdata('error', 'Nama dan kategori fasilitas wajib diisi dengan benar.');
            redirect('admin/fasilitas/tambah');
            return;
        }

        $upload = $this->upload_foto();

        if (!$upload['status']) {
            $this->session->set_flashdata('error', $upload['error']);
            redirect('admin/fasilitas/tambah');
            return;
        }

        $data = [
            'nama_fasilitas' => $nama,
            'kategori' => $kategori,
            'deskripsi' => $this->input->post('deskripsi', true),
            'foto' => $upload['nama']
        ];

        $this->db->insert('fasilitas', $data);

        $this->session->set_flashdata('success', 'Fasilitas berhasil ditambahkan.');
        redirect('admin/fasilitas');
    }

    public function edit($id) {
        $fasilitas = $this->db
            ->get_where('fasilitas', ['id_fasilitas' => (int) $id])
            ->row_array();

        if (!$fasilitas) {
            show_404();
            return;
        }

        $data['judul'] = 'Edit Fasilitas';
        $data['kategori'] = $this->daftar_kategori();
        $data['fasilitas'] = $fasilitas;

        $this->load->view('admin/fasilitas/form', $data);
    }

    public function update($id) {
        $fasilitas = $this->db
            ->get_where('fasilitas', ['id_fasilitas' => (int) $id])
            ->row_array();

        if (!$fasilitas) {
            show_404();
            return;
        }

        $nama = trim($this->input->post('nama_fasilitas', true));
        $kategori = $this->input->post('kategori', true);

        if ($nama === '' || !in_array($kategori, $this->daftar_kategori(), true)) {
            $this->session->set_flashdata('error', 'Nama dan kategori fasilitas wajib diisi dengan benar.');
            redirect('admin/fasilitas/edit/' . $id);
            return;
        }

        $upload = $this->upload_foto();

        if (!$upload['status']) {
            $this->session->set_flashdata('error', $upload['error']);
            redirect('admin/fasilitas/edit/' . $id);
            return;
        }

        $data = [
            'nama_fasilitas' => $nama,
            'kategori' => $kategori,
            'deskripsi' => $this->input->post('deskripsi', true)
        ];

        if ($upload['nama'] !== null) {
            $data['foto'] = $upload['nama'];
        }

        $this->db->where('id_fasilitas', (int) $id);
        $this->db->update('fasilitas', $data);

        if ($upload['nama'] !== null && !empty($fasilitas['foto'])) {
            $foto_lama = FCPATH . 'assets/uploads/fasilitas/' . $fasilitas['foto'];

            if (is_file($foto_lama)) {
                unlink($foto_lama);
            }
        }

        $this->session->set_flashdata('success', 'Fasilitas berhasil diperbarui.');
        redirect('admin/fasilitas');
    }

    public function hapus($id) {
        $fasilitas = $this->db
            ->get_where('fasilitas', ['id_fasilitas' => (int) $id])
            ->row_array();

        if (!$fasilitas) {
            show_404();
            return;
        }

        $this->db->delete('fasilitas', ['id_fasilitas' => (int) $id]);

        if (!empty($fasilitas['foto'])) {
            $foto = FCPATH . 'assets/uploads/fasilitas/' . $fasilitas['foto'];

            if (is_file($foto)) {
                unlink($foto);
            }
        }

        $this->session->set_flashdata('success', 'Fasilitas berhasil dihapus.');
        redirect('admin/fasilitas');
    }
}
