<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Method untuk mengambil ringkasan data laporan
    public function get_ringkasan_laporan() {
        $data = array();
        
        // Jumlah ayam total
        $this->db->select_sum('jumlah_ayam');
        $query = $this->db->get('kandang');
        $data['total_ayam'] = $query->row()->jumlah_ayam;
        
        // Stok pakan total
        $this->db->select_sum('stok_sisa');
        $query = $this->db->get('pakan');
        $data['total_pakan'] = $query->row()->stok_sisa;
        
        // Produksi bulan ini
        $this_month = date('Y-m');
        $this->db->select_sum('jumlah_produksi');
        $this->db->where("DATE_FORMAT(tanggal_produksi, '%Y-%m') =", $this_month);
        $query = $this->db->get('produksi');
        $data['produksi_bulan'] = $query->row()->jumlah_produksi ?: 0;
        
        // Saldo keuangan
        $this->db->select('SUM(CASE WHEN jenis = "pendapatan" THEN jumlah ELSE -jumlah END) as saldo');
        $query = $this->db->get('keuangan');
        $data['saldo_keuangan'] = $query->row()->saldo ?: 0;
        
        return $data;
    }
}