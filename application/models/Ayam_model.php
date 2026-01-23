<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Ayam_model extends CI_Model {

        public function get_all()
        {
            $this->db->order_by('tanggal_masuk', 'DESC'); 
            return $this->db->get('kandang')->result();
        }

        public function getById($id)
        {
            return $this->db->get_where('kandang', ['id_kandang' => $id])->row();
        }

        public function insert($data)
        {
            return $this->db->insert('kandang', $data);
        }

        public function update($id, $data)
        {
            $this->db->where('id_kandang', $id);
            return $this->db->update('kandang', $data);
        }

        public function get_total_ayam()
        {
            $this->db->select_sum('jumlah_ayam');
            $query = $this->db->get('kandang');
            return $query->row()->jumlah_ayam ?: 0;
        }

        public function get_jumlah_akhir()
        {
            $this->db->select('SUM(jumlah_tambah - jumlah_mati) as jumlah_akhir');
            $query = $this->db->get('kandang');
            return $query->row()->jumlah_akhir ?: 0;
        }

        public function delete($id)
        {
            $this->db->where('id_kandang', $id);
            $this->db->delete('kandang');
        }
    }
