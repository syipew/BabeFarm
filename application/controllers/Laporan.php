<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
 
        if (!$this->session->userdata('login')) {
            redirect('login');
        }
        $this->load->model('Laporan_model');
        $this->load->model('Ayam_model');
        $this->load->model('Pakan_model');
        $this->load->model('Produksi_model');
        $this->load->model('Keuangan_model');
    }

    public function index() {
        // Cek session login
        if (!$this->session->userdata('login')) {
            redirect('login');
        }

        // Ambil data dari berbagai model
        $data['total_ayam'] = $this->Ayam_model->get_total_ayam();
        $data['total_pakan'] = $this->Pakan_model->get_total_stok();
        $data['produksi_bulan'] = $this->Produksi_model->get_produksi_bulan_ini();
        $data['saldo_keuangan'] = $this->Keuangan_model->get_saldo_keuangan();
        
        // Data ringkasan
        $data['jumlah_ayam_akhir'] = $this->Ayam_model->get_jumlah_akhir();
        $data['stok_pakan'] = $this->Pakan_model->get_stok_sisa();
        $data['produksi_bulan_ini'] = $this->Produksi_model->get_total_produksi_bulan_ini();
        $data['saldo_keuangan_akhir'] = $this->Keuangan_model->get_saldo_akhir();

        // Untuk chart produksi 12 bulan terakhir
        $data['chart_produksi'] = $this->Produksi_model->get_produksi_12_bulan_terakhir();
        // Untuk chart pengeluaran per kategori
        $data['chart_pengeluaran'] = $this->Keuangan_model->get_pengeluaran_per_kategori();
        

        // Data untuk header
        $data['page_title'] = 'Laporan Usaha';
        $data['active_menu'] = 'laporan';
        $data['user_name'] = $this->session->userdata('username');

        // Load views
        $this->load->view('header', $data);
        $this->load->view('laporan/index', $data);
    }

    public function cetak() {
        // Cek session login
        if (!$this->session->userdata('login')) {
            redirect('login');
        }

        // Ambil data sama seperti di index
        $data['total_ayam'] = $this->Ayam_model->get_total_ayam();
        $data['total_pakan'] = $this->Pakan_model->get_total_stok();
        $data['produksi_bulan'] = $this->Produksi_model->get_produksi_bulan_ini();
        $data['saldo_keuangan'] = $this->Keuangan_model->get_saldo_keuangan();
        
        $data['jumlah_ayam_akhir'] = $this->Ayam_model->get_jumlah_akhir();
        $data['stok_pakan'] = $this->Pakan_model->get_stok_sisa();
        $data['produksi_bulan_ini'] = $this->Produksi_model->get_total_produksi_bulan_ini();
        $data['saldo_keuangan_akhir'] = $this->Keuangan_model->get_saldo_akhir();

        // Load view khusus untuk cetak
        $this->load->view('laporan/cetak', $data);
    }
}