<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Footer extends CI_Model {

    private $tabel = 'footer';

    public function get() {
        return $this->db->get($this->tabel)->row();
    }

    public function simpan($data) {
        $row = $this->db->get($this->tabel)->row();
        if ($row) {
            $this->db->where('id', $row->id);
            return $this->db->update($this->tabel, $data);
        } else {
            return $this->db->insert($this->tabel, $data);
        }
    }
}
