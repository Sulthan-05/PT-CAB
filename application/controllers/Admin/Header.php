<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends CI_Controller
{
    // SESUAIKAN jika nama tabel di database Anda berbeda
    private $tabel = 'website_header';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);

        if (!$this->session->userdata('islog')) {
            redirect('auth');
        }
    }

    private function ambil_header()
    {
        return $this->db->order_by('id', 'ASC')->limit(1)->get($this->tabel)->row();
    }

    public function index()
    {
        $data['header'] = $this->ambil_header();
        $this->load->view('admin/website/header', $data);
    }

    public function simpan()
    {
        if ($this->input->method() !== 'post') {
            redirect('admin/header');
        }

        $this->form_validation->set_rules('nama_perusahaan', 'Nama perusahaan', 'trim|required|max_length[180]');
        $this->form_validation->set_rules('cta_text', 'Teks CTA', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('cta_url', 'URL CTA', 'trim|required|max_length[255]|callback_valid_cta_url');

        if ($this->form_validation->run() === FALSE) {
            // Validasi gagal: database tidak disentuh, form tampil lagi dengan isian pengguna
            $data['header'] = $this->ambil_header();
            $this->load->view('admin/website/header', $data);
            return;
        }

        $isi = [
            'nama_perusahaan' => $this->input->post('nama_perusahaan', TRUE),
            'cta_text' => $this->input->post('cta_text', TRUE),
            'cta_url' => $this->input->post('cta_url', TRUE),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $baris = $this->ambil_header();

        if ($baris) {
            $ok = $this->db->where('id', $baris->id)->update($this->tabel, $isi);
        } else {
            // id tidak diisi, biar auto increment yang membuatnya
            $ok = $this->db->insert($this->tabel, $isi);
        }

        if ($ok) {
            $this->session->set_flashdata('sukses', 'Pengaturan header berhasil disimpan.');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal menyimpan data. Data lama tidak diubah.');
        }
        redirect('admin/header');
    }

    // Hanya izinkan path internal (/produk) atau http/https
    public function valid_cta_url($url)
    {
        if (preg_match('/[\x00-\x1F\x7F\s]/', $url)) {
            $this->form_validation->set_message('valid_cta_url', 'URL CTA tidak boleh mengandung spasi atau karakter kontrol.');
            return FALSE;
        }
        if (strpos($url, '/') === 0 && strpos($url, '//') !== 0) {
            return TRUE;
        }
        $skema = strtolower((string) parse_url($url, PHP_URL_SCHEME));
        if (filter_var($url, FILTER_VALIDATE_URL) && in_array($skema, ['http', 'https'], TRUE)) {
            return TRUE;
        }
        $this->form_validation->set_message('valid_cta_url', 'URL CTA harus diawali http://, https://, atau berupa path internal seperti /produk.');
        return FALSE;
    }
}