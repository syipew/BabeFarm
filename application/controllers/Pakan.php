<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pakan_model');
        $this->load->library('session');
    }

    public function index() {
        $data['pakan'] = $this->Pakan_model->get_all();
        
        // Ambil log aktivitas hari ini untuk ditampilkan di view
        $today = date('Y-m-d');
        $data['log_key'] = "log_pakan_$today";
        $data['logs'] = $this->session->userdata($data['log_key']) ?: [];
        
        $this->load->view('header');
        $this->load->view('pakan/index', $data);
        
    }

    public function tambah() {
        if ($this->input->post()) {
            $nama_pakan = $this->input->post('nama_pakan');
            $jumlah_masuk = $this->input->post('stok_awal');
            $satuan = $this->input->post('satuan');

            // Cek apakah pakan sudah ada
            $pakan_lama = $this->db->get_where('pakan', ['nama_pakan' => $nama_pakan])->row();

            if ($pakan_lama) {
                // Simpan data lama untuk log
                $stok_awal_lama = $pakan_lama->stok_awal;
                $stok_sisa_lama = $pakan_lama->stok_sisa;
                
                // LOGIKA AKUMULASI: Stok lama + Stok baru
                $data = [
                    'stok_awal' => $stok_awal_lama + $jumlah_masuk,
                    'stok_sisa' => $stok_sisa_lama + $jumlah_masuk,
                    'satuan'    => $satuan
                ];
                $this->Pakan_model->update($pakan_lama->id_pakan, $data);
                $msg = "Stok $nama_pakan berhasil ditambah sebanyak $jumlah_masuk $satuan.";
                
                // Tambah log aktivitas
                $this->_add_log('tambah_stok', $nama_pakan, [
                    'jumlah' => $jumlah_masuk,
                    'satuan' => $satuan,
                    'stok_awal_lama' => $stok_awal_lama,
                    'stok_sisa_lama' => $stok_sisa_lama,
                    'stok_awal_baru' => $data['stok_awal'],
                    'stok_sisa_baru' => $data['stok_sisa']
                ]);
                
            } else {
                // LOGIKA DATA BARU: Stok awal & sisa sama
                $data = [
                    'nama_pakan' => $nama_pakan,
                    'stok_awal'  => $jumlah_masuk,
                    'stok_sisa'  => $jumlah_masuk,
                    'satuan'     => $satuan
                ];
                $this->Pakan_model->insert($data);
                $msg = "Pakan baru $nama_pakan berhasil didaftarkan.";
                
                // Tambah log aktivitas
                $this->_add_log('tambah_baru', $nama_pakan, [
                    'jumlah' => $jumlah_masuk,
                    'satuan' => $satuan
                ]);
            }

            $this->session->set_flashdata('sukses', $msg);
            redirect('pakan');
        }
        
        $data['semua_pakan'] = $this->Pakan_model->get_all();
        $this->load->view('pakan/tambah', $data);
        
    }

    public function edit($id) {
        if ($this->input->post()) {
            $id_pakan = $this->input->post('id_pakan');
            $old_data = $this->Pakan_model->get_by_id($id_pakan);
            
            // Data baru dari form
            $data = [
                'nama_pakan' => $this->input->post('nama_pakan'),
                'stok_awal'  => $this->input->post('stok_awal'),
                'stok_sisa'  => $this->input->post('stok_sisa'),
                'satuan'     => $this->input->post('satuan')
            ];
            
            // Hitung selisih untuk log
            $selisih_awal = $data['stok_awal'] - $old_data->stok_awal;
            $selisih_sisa = $data['stok_sisa'] - $old_data->stok_sisa;
            
            $this->Pakan_model->update($id_pakan, $data);
            
            // Tambah log aktivitas dengan detail lengkap
            $log_details = [
                'stok_awal_lama' => $old_data->stok_awal,
                'stok_awal_baru' => $data['stok_awal'],
                'stok_sisa_lama' => $old_data->stok_sisa,
                'stok_sisa_baru' => $data['stok_sisa'],
                'selisih_awal' => $selisih_awal,
                'selisih_sisa' => $selisih_sisa,
                'satuan_lama' => $old_data->satuan,
                'satuan_baru' => $data['satuan']
            ];
            
            // Buat pesan yang informatif
            $message_parts = [];
            
            if ($selisih_awal > 0) {
                $message_parts[] = "stok awal bertambah " . $selisih_awal;
            } elseif ($selisih_awal < 0) {
                $message_parts[] = "stok awal berkurang " . abs($selisih_awal);
            }
            
            if ($selisih_sisa > 0) {
                $message_parts[] = "stok sisa bertambah " . $selisih_sisa;
            } elseif ($selisih_sisa < 0) {
                $message_parts[] = "stok sisa berkurang " . abs($selisih_sisa);
            }
            
            if ($old_data->satuan != $data['satuan']) {
                $message_parts[] = "satuan berubah dari {$old_data->satuan} ke {$data['satuan']}";
            }
            
            if (empty($message_parts)) {
                $message_parts[] = "data diperbarui tanpa perubahan jumlah";
            }
            
            $message = "Mengedit {$data['nama_pakan']}: " . implode(", ", $message_parts);
            
            $this->_add_log('edit', $data['nama_pakan'], $log_details, $message);
            
            $this->session->set_flashdata('sukses', 'Data pakan telah dikoreksi.');
            redirect('pakan');
        }

        $data['pakan'] = $this->Pakan_model->get_by_id($id);
        $data['semua_pakan'] = $this->db->get('pakan')->result();
        $this->load->view('pakan/edit', $data);
    }

    public function hapus($id) {
        if (!$this->input->post('hapus')) {
            show_404(); 
        }
        
        // Ambil data sebelum dihapus
        $pakan = $this->Pakan_model->get_by_id($id);
        if (!$pakan) {
            show_404();
        }
        
        $nama_pakan = $pakan->nama_pakan;
        $stok_awal = $pakan->stok_awal;
        $stok_sisa = $pakan->stok_sisa;
        
        // Tambah log aktivitas SEBELUM menghapus
        $this->_add_log('hapus', $nama_pakan, [
            'stok_awal' => $stok_awal,
            'stok_sisa' => $stok_sisa,
            'satuan' => $pakan->satuan
        ]);
        
        $this->Pakan_model->delete($id);
        
        $this->session->set_flashdata('sukses', "Data pakan '$nama_pakan' berhasil dihapus");
        redirect('pakan');
    }
    
    public function clear_log() {
        $today = date('Y-m-d');
        $log_key = "log_pakan_$today";
        $this->session->unset_userdata($log_key);
        $this->session->set_flashdata('sukses', 'Riwayat aktivitas hari ini telah dihapus');
        redirect('pakan');
    }
    
    /**
     * Fungsi helper untuk menambah log aktivitas
     */
    private function _add_log($action, $nama_pakan, $details = [], $custom_message = null) {
        $today = date('Y-m-d');
        $log_key = "log_pakan_$today";
        
        // Ambil log yang ada
        $logs = $this->session->userdata($log_key) ?: [];
        
        // Tentukan pesan berdasarkan action
        if ($custom_message) {
            $message = $custom_message;
        } else {
            $messages = [
                'tambah_baru' => "Menambah pakan baru: $nama_pakan",
                'tambah_stok' => "Menambah stok $nama_pakan: {$details['jumlah']} {$details['satuan']}",
                'edit' => "Mengubah data $nama_pakan",
                'hapus' => "Menghapus data $nama_pakan"
            ];
            $message = $messages[$action] ?? "Aktivitas pada $nama_pakan";
        }
        
        // Buat log entry
        $log_entry = [
            'time' => date('H:i:s'),
            'action' => $action,
            'nama' => $nama_pakan,
            'message' => $message,
            'details' => $details,
            'timestamp' => time()
        ];
        
        // Tambah ke array logs (maksimal 50 entri)
        array_unshift($logs, $log_entry);
        if (count($logs) > 50) {
            $logs = array_slice($logs, 0, 50);
        }
        
        // Simpan kembali ke session
        $this->session->set_userdata($log_key, $logs);
    }
}