<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foot extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this->load->model('M_Footer');
		// Samakan key ini dengan yang diset di controller login
		if (!$this->session->userdata('islog')) {
			redirect('auth/login');
		}
	}

    public function index() {
        $data['footer'] = $this->M_Footer->get();
        $this->load->view('layout/head');
        $this->load->view('admin/website/footer', $data);
        $this->load->view('layout/foot');
    }

    public function simpan() {
        $this->form_validation->set_rules('deskripsi',   'Deskripsi',   'required|max_length[1000]');
        $this->form_validation->set_rules('alamat',      'Alamat',      'max_length[500]');
        $this->form_validation->set_rules('telepon',     'Telepon',     'max_length[40]');
        $this->form_validation->set_rules('email',       'Email',       'max_length[150]|valid_email');
        $this->form_validation->set_rules('instagram_url','Instagram',  'max_length[255]');
        $this->form_validation->set_rules('facebook_url', 'Facebook',   'max_length[255]');
        $this->form_validation->set_rules('youtube_url',  'YouTube',    'max_length[255]');
        $this->form_validation->set_rules('copyright',   'Copyright',   'required|max_length[255]');

        if ($this->form_validation->run() === FALSE) {
            $data['footer'] = $this->M_Footer->get();
            $this->load->view('layout/head');
            $this->load->view('admin/website/footer', $data);
            $this->load->view('layout/foot');
            return;
        }

        $simpan = [
            'deskripsi'     => $this->input->post('deskripsi'),
            'alamat'        => $this->input->post('alamat'),
            'telepon'       => $this->input->post('telepon'),
            'email'         => $this->input->post('email'),
            'instagram_url' => $this->input->post('instagram_url'),
            'facebook_url'  => $this->input->post('facebook_url'),
            'youtube_url'   => $this->input->post('youtube_url'),
            'copyright'     => $this->input->post('copyright'),
        ];

        $hasil = $this->M_Footer->simpan($simpan);
        if ($hasil) {
            $this->session->set_flashdata('sukses', 'Data footer berhasil disimpan.');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal menyimpan data footer.');
        }
        redirect('admin/foot');
    }
}
