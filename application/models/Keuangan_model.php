<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan_model extends CI_Model {

    public function getAll()
    {
        return $this->db
            ->order_by('tanggal_transaksi', 'desc')
            ->order_by('id_keuangan', 'desc')
            ->get('keuangan')
            ->result();
    }

    public function insert($data)
    {
        return $this->db->insert('keuangan', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where('keuangan', ['id_keuangan' => $id])->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id_keuangan', $id);
        return $this->db->update('keuangan', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_keuangan', $id);
        return $this->db->delete('keuangan');
    }
    
    public function get_saldo_keuangan() {
        $this->db->select('SUM(CASE WHEN jenis = "pendapatan" THEN jumlah ELSE -jumlah END) as saldo');
        $query = $this->db->get('keuangan');
        return $query->row()->saldo ?: 0;
    }

    public function get_saldo_akhir() {
        return $this->get_saldo_keuangan();
    }

    public function get_pengeluaran_per_kategori() {
        $this->db->select('kategori, SUM(jumlah) as total');
        $this->db->where('jenis', 'pengeluaran');
        $this->db->group_by('kategori');
        $query = $this->db->get('keuangan');
        return $query->result();
    }
}
