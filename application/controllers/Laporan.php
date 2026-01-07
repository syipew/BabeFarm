<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Cek login
        if (!$this->session->userdata('login')) {
            redirect('login');
        }
        
        // Load database
        $this->load->database();
    }

    public function index() {
        $data['page_title'] = 'Laporan Usaha';
        $data['admin_name'] = $this->session->userdata('nama_lengkap') ?? 'Administrator';
        
        // Ambil data langsung dari database
        $data['kandang'] = $this->db->get('kandang')->result_array();
        $data['pakan'] = $this->db->get('pakan')->result_array();
        $data['produksi'] = $this->db->get('produksi')->result_array();
        $data['keuangan'] = $this->db->get('keuangan')->result_array();
        $data['kesehatan'] = $this->db->get('kesehatan')->result_array();
        
        // Hitung data statistik di controller untuk memastikan perhitungan benar
        $data['total_ayam'] = 0;
        foreach ($data['kandang'] as $k) {
            $data['total_ayam'] += isset($k['jumlah_ayam']) ? (int)$k['jumlah_ayam'] : 0;
        }
        
        $data['total_pakan'] = 0;
        foreach ($data['pakan'] as $p) {
            $data['total_pakan'] += isset($p['stok_sisa']) ? (int)$p['stok_sisa'] : 0;
        }
        
        // Produksi bulan ini (Januari 2026)
        $data['produksi_bulan'] = 0;
        $current_month = date('n');
        $current_year = date('Y');
        
        foreach ($data['produksi'] as $p) {
            if (isset($p['tanggal_produksi'])) {
                $prod_date = strtotime($p['tanggal_produksi']);
                $prod_month = date('n', $prod_date);
                $prod_year = date('Y', $prod_date);
                
                // Sesuaikan dengan data database (Januari 2026)
                if ($prod_month == 1 && $prod_year == 2026) {
                    $data['produksi_bulan'] += isset($p['jumlah_produksi']) ? (int)$p['jumlah_produksi'] : 0;
                }
            }
        }
        
        // Saldo keuangan
        $data['total_pemasukan'] = 0;
        $data['total_pengeluaran'] = 0;
        
        foreach ($data['keuangan'] as $k) {
            if (isset($k['jenis']) && $k['jenis'] == 'pemasukan') {
                $data['total_pemasukan'] += isset($k['jumlah']) ? (float)$k['jumlah'] : 0;
            } elseif (isset($k['jenis']) && $k['jenis'] == 'pengeluaran') {
                $data['total_pengeluaran'] += isset($k['jumlah']) ? (float)$k['jumlah'] : 0;
            }
        }
        
        $data['saldo_keuangan'] = $data['total_pemasukan'] - $data['total_pengeluaran'];

        $this->load->view('header');
        $this->load->view('laporan/index', $data);
    }

    public function cetak() {
        $data['page_title'] = 'Laporan Usaha';
        
        // Ambil data langsung dari database
        $data['kandang'] = $this->db->get('kandang')->result_array();
        $data['pakan'] = $this->db->get('pakan')->result_array();
        $data['produksi'] = $this->db->get('produksi')->result_array();
        $data['keuangan'] = $this->db->get('keuangan')->result_array();
        $data['kesehatan'] = $this->db->get('kesehatan')->result_array();
        
        // Hitung data statistik di controller
        $data['total_ayam'] = 0;
        foreach ($data['kandang'] as $k) {
            $data['total_ayam'] += isset($k['jumlah_ayam']) ? (int)$k['jumlah_ayam'] : 0;
        }
        
        $data['total_pakan'] = 0;
        foreach ($data['pakan'] as $p) {
            $data['total_pakan'] += isset($p['stok_sisa']) ? (int)$p['stok_sisa'] : 0;
        }
        
        $data['produksi_bulan'] = 0;
        $current_month = date('n');
        $current_year = date('Y');
        
        foreach ($data['produksi'] as $p) {
            if (isset($p['tanggal_produksi'])) {
                $prod_date = strtotime($p['tanggal_produksi']);
                $prod_month = date('n', $prod_date);
                $prod_year = date('Y', $prod_date);
                
                if ($prod_month == $current_month && $prod_year == $current_year) {
                    $data['produksi_bulan'] += isset($p['jumlah_produksi']) ? (int)$p['jumlah_produksi'] : 0;
                }
            }
        }
        
        $data['total_pemasukan'] = 0;
        $data['total_pengeluaran'] = 0;
        
        foreach ($data['keuangan'] as $k) {
            if (isset($k['jenis']) && $k['jenis'] == 'pemasukan') {
                $data['total_pemasukan'] += isset($k['jumlah']) ? (float)$k['jumlah'] : 0;
            } elseif (isset($k['jenis']) && $k['jenis'] == 'pengeluaran') {
                $data['total_pengeluaran'] += isset($k['jumlah']) ? (float)$k['jumlah'] : 0;
            }
        }
        
        $data['saldo_keuangan'] = $data['total_pemasukan'] - $data['total_pengeluaran'];
        
        $this->load->view('laporan/cetak', $data);
    }
}