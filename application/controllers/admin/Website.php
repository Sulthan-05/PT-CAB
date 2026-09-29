<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller
{
    public function beranda()
    {
        $this->load->view('layout/head');
        $this->load->view('admin/website/beranda');
        $this->load->view('layout/foot');
    }

	public function header()
    {
        $this->load->view('admin/website/header');
    }

	public function footer()
    {
        $this->load->view('admin/website/footer');
    }
}
