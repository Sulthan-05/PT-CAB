<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    private $tabel = 'website_beranda';

    // nama_kolom => [label, panjang maksimal sesuai tipe kolom]
    private $field = [
        'judul_banner' => ['Judul Banner', 180],
        'deskripsi_banner' => ['Deskripsi Banner', 600],
        'statistik_1_nilai' => ['Statistik 1 (nilai)', 40],
        'statistik_1_label' => ['Statistik 1 (label)', 100],
        'statistik_2_nilai' => ['Statistik 2 (nilai)', 40],
        'statistik_2_label' => ['Statistik 2 (label)', 100],
    ];

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

    private function ambil_beranda()
    {
        return $this->db->order_by('id', 'ASC')->limit(1)->get($this->tabel)->row();
    }

    public function index()
    {
        $data['beranda'] = $this->ambil_beranda();
        $this->load->view('admin/website/beranda', $data);
    }

    public function simpan()
    {
        if ($this->input->method() !== 'post') {
            redirect('admin/beranda');
        }

        foreach ($this->field as $nama => $info) {
            $this->form_validation->set_rules($nama, $info[0], 'trim|required|max_length[' . $info[1] . ']');
        }

        if ($this->form_validation->run() === FALSE) {
            // Gagal validasi: database tidak disentuh, isian pengguna tetap tampil
            $data['beranda'] = $this->ambil_beranda();
            $this->load->view('admin/website/beranda', $data);
            return;
        }

        $isi = [];
        foreach ($this->field as $nama => $info) {
            $isi[$nama] = str_replace(["\r\n", "\r"], "\n", $this->input->post($nama));
        }

        $baris = $this->ambil_beranda();

        if ($baris) {
            $ok = $this->db->where('id', $baris->id)->update($this->tabel, $isi);
        } else {
            $isi['id'] = 1;
            $ok = $this->db->insert($this->tabel, $isi);
        }

        if ($ok) {
            $this->session->set_flashdata('sukses', 'Konten Beranda berhasil disimpan.');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal menyimpan data. Data lama tidak diubah.');
        }
        redirect('admin/beranda');
    }
}