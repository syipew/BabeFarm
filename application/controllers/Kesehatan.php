<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesehatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
        $this->load->model('Kesehatan_model');
        $this->load->model('Ayam_model'); // Load model kandang
    }

    public function index()
    {
        $data['kesehatan'] = $this->Kesehatan_model->get_all();
        $this->load->view('header');
        $this->load->view('kesehatan/data_kesehatan', $data);
    }

    public function update_status($id, $status) {
        $this->Kesehatan_model->update_status($id, $status);
        redirect('kesehatan');
    }

    public function tambah()
    {
        // Ambil data kandang untuk dropdown
        $data['ayam'] = $this->Ayam_model->get_all();
        $this->load->view('kesehatan/tambah', $data);
    }

    public function simpan() {
        // Load form validation library
        $this->load->library('form_validation');
        
        // Set rules validasi
        $this->form_validation->set_rules('id_kandang', 'Kandang', 'required|trim');
        $this->form_validation->set_rules('tanggal_pemeriksaan', 'Tanggal Pemeriksaan', 'required|trim');
        $this->form_validation->set_rules('penyakit', 'Penyakit', 'required|trim');
        $this->form_validation->set_rules('gejala', 'Gejala', 'required|trim');
        $this->form_validation->set_rules('tindakan', 'Tindakan', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form kembali dengan error
            $data['ayam'] = $this->Ayam_model->get_all();
            $this->load->view('kesehatan/tambah', $data);
        } else {
            $id_kandang = $this->input->post('id_kandang', TRUE);

            $is_sick = $this->Kesehatan_model->cek_sedang_sakit($id_kandang);

            if ($is_sick) {
            // JIKA MASIH SAKIT: ERROR
            $this->session->set_flashdata('alert', [
                'type' => 'error',
                'message' => 'Gagal! Kandang ini statusnya <b>masih sakit</b>. Harap update status menjadi "Sehat" pada data sebelumnya jika ingin melapor penyakit baru.'
            ]);

            $this->session->set_flashdata('old_input', $this->input->post());
            
            redirect('kesehatan/tambah');
            return; 
        }

            $data = [
                'id_kandang' => $id_kandang,
                'tanggal_pemeriksaan' => $this->input->post('tanggal_pemeriksaan', TRUE),
                'penyakit' => $this->input->post('penyakit', TRUE),
                'gejala' => $this->input->post('gejala', TRUE),
                'tindakan' => $this->input->post('tindakan', TRUE),
                'status' => 'sakit' 
            ];
            
            $this->Kesehatan_model->insert($data);
            
            // Set flashdata untuk notifikasi sukses
            $this->session->set_flashdata('alert', [
                'type' => 'success',
                'message' => 'Data kesehatan baru berhasil dicatat!'
            ]);
            
            // Redirect ke halaman data kesehatan
            redirect('kesehatan');
        }
    }

    public function edit($id)
    {
        $data['kesehatan'] = $this->Kesehatan_model->getById($id);
        $data['ayam'] = $this->Ayam_model->get_all(); // Ambil data ayam untuk dropdown

        if (!$data['kesehatan']) {
            show_404();
        }

        $this->load->view('kesehatan/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id_kesehatan');

        // 1. Ambil data lama
        $old = $this->Kesehatan_model->getById($id);

        if (!$old) {
            show_404();
        }

        // 2. Ambil data dari form
        $post = $this->input->post();

        // 3. Gabungkan: data baru menimpa data lama
        $data = [
            'id_kandang' => $post['id_kandang'] ?: $old->id_kandang,
            'tanggal_pemeriksaan' => $post['tanggal_pemeriksaan'] ?: $old->tanggal_pemeriksaan,
            'penyakit' => $post['penyakit'] ?: $old->penyakit,
            'gejala' => $post['gejala'] ?: $old->gejala,
            'tindakan' => $post['tindakan'] ?: $old->tindakan,
        ];

        // 4. Update ke database
        $this->Kesehatan_model->update($id, $data);

        redirect('kesehatan');
    }

    public function hapus($id)
    {
        $this->Kesehatan_model->delete($id);
        redirect('kesehatan');
    }
}