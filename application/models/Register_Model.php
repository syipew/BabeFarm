<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

    public function register($data) {
        return $this->db->insert('admin', $data);
    }

    public function get_by_username($username)
    {
        return $this->db
            ->get_where('admin', ['username' => $username])
            ->row();
    }
}