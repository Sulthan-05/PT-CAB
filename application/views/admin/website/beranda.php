<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pengaturan_website_model');
    }

    public function beranda()
    {
        $this->load->view('admin/website/beranda');
    }

    public function header()
    {
        $this->load->view('admin/website/header');
    }

    public function footer()
    {
        $data['pengaturan'] = $this->Pengaturan_website_model->get_data();

        if ($this->input->method() === 'post') {
            $this->simpan_footer($data['pengaturan']);
            return;
        }

        $this->load->view('admin/website/footer', $data);
    }

    private function simpan_footer($pengaturan)
    {
        $data = [
            'nama_website' => $this->input->post('nama_website', true),
            'deskripsi_singkat' => $this->input->post('deskripsi_singkat', true),
            'nomor_whatsapp' => $this->input->post('nomor_whatsapp', true),
            'link_shopee' => $this->input->post('link_shopee', true),
            'link_google_maps' => $this->input->post('link_google_maps', true),
            'instagram' => $this->input->post('instagram', true),
            'facebook' => $this->input->post('facebook', true),
            'youtube' => $this->input->post('youtube', true),
            'tiktok' => $this->input->post('tiktok', true)
        ];

        if (!empty($_FILES['logo']['name'])) {
            $upload_path = FCPATH . 'assets/uploads/website/';

            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|webp|svg';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo')) {
                $upload = $this->upload->data();
                $data['logo'] = $upload['file_name'];
            } else {
                $this->session->set_flashdata(
                    'error',
                    $this->upload->display_errors('', '')
                );

                redirect('admin/website/footer');
                return;
            }
        }

        if ($pengaturan) {
            $this->Pengaturan_website_model->update_data(
                $pengaturan->id_pengaturan,
                $data
            );
        } else {
            $this->Pengaturan_website_model->insert_data($data);
        }

        $this->session->set_flashdata(
            'success',
            'Pengaturan footer berhasil disimpan.'
        );

        redirect('admin/website/footer');
    }
}
