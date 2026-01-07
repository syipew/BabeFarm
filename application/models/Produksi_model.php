<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi_model extends CI_Model {

    // Simpan data baru
    public function insert($data)
    {
        return $this->db->insert('produksi', $data);
    }
    
    // Ambil semua data (untuk tabel utama)
    public function get_all()
    {
        $this->db->select('produksi.*, kandang.jenis_ayam');
        $this->db->from('produksi');
        $this->db->join('kandang', 'kandang.id_kandang = produksi.id_kandang', 'left');
        $this->db->order_by('produksi.tanggal_produksi', 'DESC');
        return $this->db->get()->result();
    }
    
    // Ambil 1 data berdasarkan ID (untuk form Edit)
    public function getById($id)
    {
        $this->db->select('produksi.*, kandang.jenis_ayam');
        $this->db->from('produksi');
        $this->db->join('kandang', 'kandang.id_kandang = produksi.id_kandang');
        $this->db->where('produksi.id_produksi', $id);
        
        // --- BAGIAN INI SUDAH DIPERBAIKI ---
        // Sebelumnya ada perintah update yang salah di sini
        return $this->db->get()->row();
    }

    // Hitung total produksi bulan ini (untuk Dashboard)
    public function get_produksi_bulan_ini() {
        $bulan_ini = date('m');
        $tahun_ini = date('Y');
        
        $this->db->select_sum('jumlah_produksi');
        $this->db->where('MONTH(tanggal_produksi)', $bulan_ini);
        $this->db->where('YEAR(tanggal_produksi)', $tahun_ini);
        $query = $this->db->get('produksi');
        
        // Jika hasil null, kembalikan 0
        return $query->row()->jumlah_produksi ?: 0;
    }

    public function get_total_produksi_bulan_ini() {
        return $this->get_produksi_bulan_ini();
    }

    // Data grafik 12 bulan terakhir
    public function get_produksi_12_bulan_terakhir() {
        $tahun_ini = date('Y');
        $bulan_ini = date('m');
        $data_produksi = array();

        for ($i = 0; $i < 12; $i++) {
            $bulan = $bulan_ini - $i;
            $tahun = $tahun_ini;
            if ($bulan <= 0) {
                $bulan += 12;
                $tahun -= 1;
            }

            $this->db->select_sum('jumlah_produksi');
            $this->db->where('MONTH(tanggal_produksi)', $bulan);
            $this->db->where('YEAR(tanggal_produksi)', $tahun);
            $query = $this->db->get('produksi');
            $total = $query->row()->jumlah_produksi;

            $data_produksi[] = $total ? $total : 0;
        }

        return array_reverse($data_produksi);
    }

    // Update data
    public function update($id, $data)
    {
        $this->db->where('id_produksi', $id);
        return $this->db->update('produksi', $data);
    }

    // Hapus data
    public function delete($id)
    {
        $this->db->where('id_produksi', $id);
        return $this->db->delete('produksi');
    }
}