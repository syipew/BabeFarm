<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesehatan_model extends CI_Model {

    public function get_all()
    {
        $this->db->select('kesehatan.*, kandang.jenis_ayam');
        $this->db->from('kesehatan');
        $this->db->join('kandang', 'kandang.id_kandang = kesehatan.id_kandang');
        $this->db->order_by('kesehatan.tanggal_pemeriksaan', 'DESC');
        $this->db->order_by('kesehatan.status', 'ASC');
        return $this->db->get()->result();
    }

    public function getById($id)
    {
        $this->db->select('kesehatan.*, kandang.jenis_ayam');
        $this->db->from('kesehatan');
        $this->db->join('kandang', 'kandang.id_kandang = kesehatan.id_kandang');
        $this->db->where('kesehatan.id_kesehatan', $id);
        return $this->db->get()->row();
    }

    public function insert($data) {
        $this->db->insert('kesehatan', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id_kesehatan', $id);
        return $this->db->update('kesehatan', $data);
    }

    public function update_status($id, $status) {
        $data = array('status' => $status);
        $this->db->where('id_kesehatan', $id);
        return $this->db->update('kesehatan', $data);
    }

    public function cek_sedang_sakit($id_kandang)
    {
        $this->db->where('id_kandang', $id_kandang);
        $this->db->where('status', 'sakit'); // Cari yang statusnya masih sakit
        $query = $this->db->get('kesehatan');
        
        // Jika ada row (hasil), berarti sedang sakit (return TRUE)
        if($query->num_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // Cek apakah kandang ini sedang sakit
    public function is_sedang_sakit($id_kandang)
    {
        $this->db->where('id_kandang', $id_kandang);
        $this->db->where('status', 'sakit'); // Cari yang statusnya masih 'sakit'
        $query = $this->db->get('kesehatan');
        
        // Jika ditemukan data (jumlah baris > 0), berarti TRUE (Sedang Sakit)
        if($query->num_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function delete($id)
    {
        $this->db->where('id_kesehatan', $id);
        $this->db->delete('kesehatan');
    }
}