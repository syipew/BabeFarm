<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

    public function get_profil()
    {
        return $this->db->get_where('admin', ['id_admin' => 1])->row();
    }

    public function update_profil($data)
    {
        $this->db->where('id_admin', 1);
        return $this->db->update('admin', $data);
    }
}