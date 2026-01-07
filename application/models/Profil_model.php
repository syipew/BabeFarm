<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

    public function get_by_username($username)
    {
        return $this->db
            ->get_where('admin', ['username' => $username])
            ->row();
    }

    public function update_profil($username, $data)
    {
        $this->db->where('username', $username);
        return $this->db->update('admin', $data);
    }
}
