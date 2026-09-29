<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller
{

	public function index()
	{
		$this->db->from('profil_perusahaan')->order_by('id_profil', 'asc');
		$tentang = $this->db->get()->result_array();
		$data = [
			'judul' => 'Tentang Kami',
			'tentang' => $tentang
		];
		$this->load->view('style/admin_tentangkami', $data);
	}

	public function tambah()
	{
		$data = [
			'deskripsi' => $this->input->post('deskripsi'),
			'visi' => $this->input->post('visi'),
			'misi' => $this->input->post('misi'),
		];
		$this->db->insert('profil_perusahaan', $data);
		$this->session->set_flashdata('alert', '
            <div class="p-3 mb-4 text-sm text-red-800 rounded-md bg-green-50 border border-red-200">
                 <strong>Selamat!</strong> Berhasil Tambah Data
            </div>
        ');
		redirect('admin/tentang');
	}

	public function update($id)
	{
		$data = [
			'deskripsi' => $this->input->post('deskripsi'),
			'visi' => $this->input->post('visi'),
			'misi' => $this->input->post('misi'),
		];
		$wh = ['id_profile'=>$id];
		$this->db->update('profil_perusahaan', $data,$wh);
		$this->session->set_flashdata('alert', '
            <div class="p-3 mb-4 text-sm text-red-800 rounded-md bg-green-50 border border-red-200">
                 <strong>Selamat!</strong> Berhasil Tambah Data
            </div>
        ');
		redirect('admin/tentang');
	}

	public function hapus($id){
		$data = [
			'id_profil' => $id
		];
		$this->db->delete('profil_perusahaan', $data);
		$this->session->set_flashdata('alert', '
            <div class="p-3 mb-4 text-sm text-red-800 rounded-md bg-green-50 border border-red-200">
                 <strong>Selamat!</strong> Berhasil Hapus Data
            </div>
        ');
		redirect('admin/tentang');
	}
}
