<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan_model extends CI_Model {

    private $table = 'pakan';

    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id_pakan' => $id])->row();
    }

    public function update($id, $data) {
        return $this->db->update($this->table, $data, ['id_pakan' => $id]);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['id_pakan' => $id]);
    }
}
