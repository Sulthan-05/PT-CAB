<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_website_model extends CI_Model
{
    private $table = 'pengaturan_website';

    public function get_data()
    {
        return $this->db->get($this->table)->row();
    }

    public function update_data($id_pengaturan, $data)
    {
        return $this->db
            ->where('id_pengaturan', $id_pengaturan)
            ->update($this->table, $data);
    }

    public function insert_data($data)
    {
        return $this->db->insert($this->table, $data);
    }
}
