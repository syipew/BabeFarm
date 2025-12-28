<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

    public function register($data) {
        return $this->db->insert('admin', $data);
    }

    public function getUserByUsername($username) {
        return $this->db
            ->where('username', $username)
            ->get('admin')
            ->row();
    }
}