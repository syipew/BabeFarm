<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    public function get_dashboard_data() {
        $data = array();
        
        // Total ayam
        $this->db->select_sum('jumlah_ayam');
        $query = $this->db->get('kandang');
        $data['total_ayam'] = $query->row()->jumlah_ayam;
        
        // Total pakan
        $this->db->select_sum('stok_sisa');
        $query = $this->db->get('pakan');
        $data['total_pakan'] = $query->row()->stok_sisa;
        
        // Produksi bulan ini
        $bulan_ini = date('Y-m');
        $this->db->select_sum('jumlah_produksi');
        $this->db->like('tanggal_produksi', $bulan_ini);
        $query = $this->db->get('produksi');
        $data['produksi_bulan'] = $query->row()->jumlah_produksi;
        
        // Keuangan
        $this->db->select('jenis, SUM(jumlah) as total');
        $this->db->group_by('jenis');
        $query = $this->db->get('keuangan');
        $result = $query->result();
        
        $data['total_pemasukan'] = 0;
        $data['total_pengeluaran'] = 0;
        
        foreach ($result as $row) {
            if ($row->jenis == 'pemasukan') {
                $data['total_pemasukan'] = $row->total;
            } else {
                $data['total_pengeluaran'] = $row->total;
            }
        }
        
        $data['saldo_keuangan'] = $data['total_pemasukan'] - $data['total_pengeluaran'];
        
        return $data;
    }

    public function get_produksi_6_bulan() {
        $bulan = array();
        for ($i = 5; $i >= 0; $i--) {
            $tanggal = date('Y-m', strtotime("-$i months"));
            $bulan[] = $tanggal;
        }
        
        $data = array();
        foreach ($bulan as $b) {
            $this->db->select_sum('jumlah_produksi');
            $this->db->like('tanggal_produksi', $b);
            $query = $this->db->get('produksi');
            $total = $query->row()->jumlah_produksi;
            
            $data[] = array(
                'bulan' => date('M', strtotime($b . '-01')),
                'total_produksi' => $total ? $total : 0
            );
        }
        
        return $data;
    }

    public function get_pengeluaran_kategori() {
        $this->db->select('kategori, SUM(jumlah) as total');
        $this->db->where('jenis', 'pengeluaran');
        $this->db->group_by('kategori');
        $query = $this->db->get('keuangan');
        return $query->result_array();
    }
}