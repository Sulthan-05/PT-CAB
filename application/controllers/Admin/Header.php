<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // === SESUAIKAN dengan mekanisme auth project Anda ===
        // if ($this->session->userdata('islog')) {
        //     redirect('beranda');
        // }
        // =====================================================
    }

    /**
     * Halaman pengelolaan Header
     */
    public function index()
    {
        $header = $this->_get_header_row();

        $data['title'] = 'Pengelolaan Header Website';
        $data['header'] = $header;

        // $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/website/header', $data);
        // $this->load->view('admin/layout/footer', $data);
    }

    /**
     * Simpan perubahan Header (POST)
     */
    public function save()
    {
        // === SESUAIKAN dengan mekanisme auth project Anda ===
        if (!$this->session->userdata('logged_in')) {
            show_error('Akses ditolak.', 403);
        }
        // =====================================================

        if ($this->input->method() !== 'post') {
            show_error('Metode tidak diizinkan.', 405);
        }

        // --- Validasi server-side ---
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'nama_perusahaan',
            'Nama Perusahaan',
            'required|trim|max_length[180]'
        );
        $this->form_validation->set_rules(
            'cta_text',
            'Teks CTA',
            'required|trim|max_length[100]'
        );
        $this->form_validation->set_rules(
            'cta_url',
            'URL CTA',
            'required|trim|max_length[255]|callback__validate_cta_url'
        );

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/header');
            return;
        }

        $nama_perusahaan = $this->input->post('nama_perusahaan', TRUE);
        $cta_text = $this->input->post('cta_text', TRUE);
        $cta_url = $this->input->post('cta_url', TRUE);

        // --- Tentukan baris konfigurasi yang sah ---
        $row = $this->_get_header_row();

        $payload = [
            'nama_perusahaan' => $nama_perusahaan,
            'cta_text' => $cta_text,
            'cta_url' => $cta_url,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($row) {
            // UPDATE baris yang ada — logo TIDAK disentuh
            $this->db->where('id', (int) $row->id);
            $ok = $this->db->update('website_header', $payload);
            $msg = $ok
                ? 'Konfigurasi Header berhasil diperbarui.'
                : 'Gagal memperbarui konfigurasi Header.';
        } else {
            // Tabel kosong: insert satu baris awal (logo dibiarkan NULL)
            $payload['logo'] = NULL;
            $ok = $this->db->insert('website_header', $payload);
            $msg = $ok
                ? 'Konfigurasi Header berhasil dibuat.'
                : 'Gagal membuat konfigurasi Header.';
        }

        $this->session->set_flashdata($ok ? 'success' : 'error', $msg);
        redirect('admin/header');
    }

    /**
     * Callback validasi URL CTA.
     * Izinkan: http(s):// valid, path internal (/...), anchor (#...).
     * Tolak: javascript:, data:, vbscript:, skema aneh.
     */
    public function _validate_cta_url($value)
    {
        $value = trim($value);

        if ($value === '') {
            $this->form_validation->set_message(
                '_validate_cta_url',
                'URL CTA wajib diisi.'
            );
            return FALSE;
        }

        // Anchor internal
        if ($value[0] === '#') {
            if (preg_match('/^#[A-Za-z0-9_\-]+$/', $value)) {
                return TRUE;
            }
            $this->form_validation->set_message(
                '_validate_cta_url',
                'Anchor tidak valid.'
            );
            return FALSE;
        }

        // Path internal
        if ($value[0] === '/') {
            if (strpos($value, '//') === FALSE) { // hindari protocol-relative
                return TRUE;
            }
            $this->form_validation->set_message(
                '_validate_cta_url',
                'Path internal tidak valid.'
            );
            return FALSE;
        }

        // URL absolut
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            $scheme = strtolower((string) parse_url($value, PHP_URL_SCHEME));
            if (in_array($scheme, ['http', 'https'], TRUE)) {
                return TRUE;
            }
        }

        $this->form_validation->set_message(
            '_validate_cta_url',
            'URL CTA hanya boleh http/https, path internal (/...), atau anchor (#...).'
        );
        return FALSE;
    }

    /**
     * Ambil satu baris konfigurasi Header.
     * Jika tabel kosong, kembalikan NULL (bukan buat baris baru).
     */
    private function _get_header_row()
    {
        $row = $this->db
            ->select('id, nama_perusahaan, logo, cta_text, cta_url, updated_at')
            ->from('website_header')
            ->order_by('id', 'ASC')
            ->limit(1)
            ->get()
            ->row();

        return $row ?: NULL;
    }
}