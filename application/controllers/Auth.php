<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        $data = [
			'judul' => 'login'
		];
		$this->load->view('login');
	}

	public function login()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $this->db->from('users')->where('username', $user);
        $data = $this->db->get()->row();
        if ($data == null) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible" role="alert">
                    Username Tidak Ditemukan!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('auth');
        } else if ($data->password == $pass) {
            // login
            $data = [
                'islog' => TRUE,
                'username' => $data->username,
                'id_user' => $data->id_user,
                'nama_pengguna' => $data->namaLengkap,
                'email' => $data->email,                
                'role' => $data->role,
            ];
            $this->session->set_userdata($data);
            redirect('welcome');
        } else {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible" role="alert">
                    Password SALAH!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('auth');
        }
    }

}
