<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller
{

	public function index()
	{
		$this->db->from('kategori')->order_by('nama_kategori', 'asc');
		$kate = $this->db->get()->result_array();

		$data = [
			'judul' => 'Kelola Kategori',
			'kategori' => $kate
		];
		$this->load->view('admin/produk/kategori', $data);
	}

	public function tambah()
	{
		$this->db->from('kategori')->where('nama_kategori', $this->input->post('nama_kategori'));
		$kt = $this->db->get()->row();
		if ($kt == null) {
			$data = [
				'nama_kategori' => $this->input->post('nama_kategori'),				
			];
			$this->db->insert('kategori', $data);
			$this->session->set_flashdata('alert', '
        	 <div id="alertMessage" class="p-3 mb-4 text-sm text-red-800 rounded-md bg-green-50 border border-red-200">
            	<strong>Selamat!</strong> Berhasil Tambah Data
        	 </div>
        	');

			redirect('admin/kategori');
		}else{
			$this->session->set_flashdata('alert', '
        	 <div id="alertMessage" class="p-3 mb-4 text-sm text-red-800 rounded-md bg-green-50 border border-red-200">
            	<strong>Selamat!</strong> Data Sudah Ada
        	 </div>
        	');

			redirect('admin/kategori');
		}
	}

	public function update()
	{
		$data = [
			'nama_kategori' => $this->input->post('nama_kategori'),			
		];

		$where = [
			'id_kategori' => $this->input->post('id_kategori')
		];

		$this->db->update('kategori', $data, $where);

		$this->session->set_flashdata('alert', '
         <div id="alertMessage" class="p-3 mb-4 text-sm text-red-800 rounded-md bg-green-50 border border-red-200">
            <strong>Selamat!</strong> Berhasil Ubah Data
         </div>
        ');

		redirect('admin/kategori');
	}

	public function hapus($id)
	{
		$where = [
			'id_kategori' => $id
		];

		$this->db->delete('kategori', $where);

		$this->session->set_flashdata('alert', '
         <div id="alertMessage" class="p-3 mb-4 text-sm text-red-800 rounded-md bg-green-50 border border-red-200">
            <strong>Selamat!</strong> Berhasil Hapus Data
         </div>
        ');

		redirect('admin/kategori');
	}
}
