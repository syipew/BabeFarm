<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayam extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
        $this->load->model('Ayam_model');
        $this->load->library('session'); // Pastikan session di-load
    }

    public function index()
    {
        $keyword = $this->input->get('search'); // Ambil input dari form search
        
        if ($keyword) {
            // Ambil data detail untuk tabel
            $this->db->like('jenis_ayam', $keyword);
            $data['ayam'] = $this->db->get('kandang')->result();

            // Ambil data RINGKASAN (Group By) untuk keyword tersebut
            $this->db->select('jenis_ayam, SUM(jumlah_tambah) as total_tambah, SUM(jumlah_mati) as total_mati, SUM(jumlah_ayam) as total_stok');
            $this->db->like('jenis_ayam', $keyword);
            $this->db->group_by('jenis_ayam');
            $data['ringkasan'] = $this->db->get('kandang')->row();
            $data['keyword'] = $keyword;
        } else {
            // Tampilan normal tanpa search
            $data['ayam'] = $this->Ayam_model->get_all();
            $data['ringkasan'] = null;
            $data['keyword'] = null;
        }

        $this->load->view('header');
        $this->load->view('ayam/data_ayam', $data);
    }

    public function tambah()
    {
        // Mengambil jenis ayam yang unik saja untuk datalist
        $this->db->select('jenis_ayam');
        $this->db->group_by('jenis_ayam');
        $data['semua_ayam'] = $this->db->get('kandang')->result(); 

        $this->load->view('ayam/tambah', $data);
    }

    public function simpan()
    {
        $jenis_ayam   = $this->input->post('jenis_ayam');
        $umur_awal    = $this->input->post('umur_awal');
        $jumlah_tambah = $this->input->post('jumlah_tambah');
        $jumlah_mati   = $this->input->post('jumlah_mati');
        $tanggal      = $this->input->post('tanggal_masuk');

        // Cek di tabel kandang apakah sudah ada Jenis + Umur yang sama
        $this->db->where('jenis_ayam', $jenis_ayam);
        $this->db->where('umur_awal', $umur_awal);
        $existing = $this->db->get('kandang')->row();

        if ($existing) {
            // Jika ADA yang sama, lakukan UPDATE (Akumulasi)
            $new_tambah = $existing->jumlah_tambah + $jumlah_tambah;
            $new_mati   = $existing->jumlah_mati + $jumlah_mati;
            
            $data_update = [
                'tanggal_masuk' => $tanggal, // Update ke tanggal terbaru
                'jumlah_tambah' => $new_tambah,
                'jumlah_mati'   => $new_mati,
                'jumlah_ayam'   => $new_tambah - $new_mati,
                'updated_at'    => date('Y-m-d H:i:s')
            ];

            $this->db->where('id_kandang', $existing->id_kandang);
            $this->db->update('kandang', $data_update);
            $message = "Data ayam berhasil diupdate!";
        } else {
            // Jika TIDAK ADA, lakukan INSERT baris baru
            $data_insert = [
                'jenis_ayam'    => $jenis_ayam,
                'tanggal_masuk' => $tanggal,
                'jumlah_tambah' => $jumlah_tambah,
                'umur_awal'     => $umur_awal,
                'jumlah_mati'   => $jumlah_mati,
                'jumlah_ayam'   => $jumlah_tambah - $jumlah_mati
            ];
            $this->Ayam_model->insert($data_insert);
            $message = "Data ayam berhasil ditambahkan!";
        }

        // Gunakan hanya satu jenis flashdata agar konsisten
        $this->session->set_flashdata('pesan', $message);
        $this->session->set_flashdata('status', 'success');
        redirect('ayam');
    }

    public function edit($id) {
        $data['ayam'] = $this->db->get_where('kandang', ['id_kandang' => $id])->row();
        $data['semua_ayam'] = $this->db->select('jenis_ayam')->group_by('jenis_ayam')->get('kandang')->result();
        
        $this->load->view('ayam/edit', $data);
    }

    public function update($id)
    {
        // 1. Tangkap data dari form
        $data = [
            'jenis_ayam'    => $this->input->post('jenis_ayam'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'jumlah_tambah' => $this->input->post('jumlah_tambah'),
            'umur_awal'     => $this->input->post('umur_awal'),
            'jumlah_mati'   => $this->input->post('jumlah_mati'),
            'jumlah_ayam'   => $this->input->post('jumlah_ayam'), // Hasil kalkulasi JS
        ];

        // 2. Jalankan update ke database
        $this->db->where('id_kandang', $id);
        $update = $this->db->update('kandang', $data);

        if ($update) {
            $this->session->set_flashdata('pesan', 'Perubahan data ayam berhasil disimpan!');
            $this->session->set_flashdata('status', 'success');
        } else {
            $this->session->set_flashdata('pesan', 'Gagal memperbarui data.');
            $this->session->set_flashdata('status', 'error');
        }
        redirect('ayam');
    }

    public function hapus($id)
    {
        $this->Ayam_model->delete($id);
        $this->session->set_flashdata('pesan', 'Data ayam berhasil dihapus!');
        $this->session->set_flashdata('status', 'success');
        redirect('ayam');
    }

}