<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan_model extends CI_Model {

    private $table = 'pakan';

    public function get_all() {
        $this->db->order_by('stok_sisa', 'ASC');
        $this->db->order_by('id_pakan', 'DESC');
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

    public function get_total_stok() {
        $this->db->select_sum('stok_sisa');
        $query = $this->db->get('pakan');
        return $query->row()->stok_sisa ?: 0;
    }

    public function get_stok_sisa() {
        $this->db->select('stok_sisa');
        $this->db->order_by('id_pakan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pakan');
        return $query->row()->stok_sisa ?: 0;
    }
}
