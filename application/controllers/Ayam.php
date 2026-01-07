<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayam extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
        $this->load->model('Ayam_model');
    }

    public function index()
    {
        $data['ayam'] = $this->Ayam_model->get_all();

        $this->load->view('header');
        $this->load->view('ayam/data_ayam', $data);
    }

    public function tambah()
    {
        $this->load->view('ayam/tambah');
    }

    public function simpan()
    {
        $data = [
            'jenis_ayam'     => $this->input->post('jenis_ayam'),
            'tanggal_masuk'  => $this->input->post('tanggal_masuk'),
            'jumlah_tambah'  => $this->input->post('jumlah_tambah'),
            'umur_awal'      => $this->input->post('umur_awal'),
            'jumlah_mati'    => $this->input->post('jumlah_mati'),
            'jumlah_ayam'    => $this->input->post('jumlah_tambah') - $this->input->post('jumlah_mati')
        ];

        $this->Ayam_model->insert($data);
        redirect('ayam');
    }


    public function edit($id)
    {
        $data['ayam'] = $this->Ayam_model->getById($id);

        if (!$data['ayam']) {
            show_404();
        }

        $this->load->view('ayam/edit', $data);
    }

    public function update($id = NULL)
    {
        if ($id == NULL) {
            $id = $this->input->post('id_ayam'); 
        }

        // Hitung ulang sisa ayam
        $jumlah_tambah = $this->input->post('jumlah_tambah');
        $jumlah_mati   = $this->input->post('jumlah_mati');

        $data = [
            'jenis_ayam'    => $this->input->post('jenis_ayam'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'jumlah_tambah' => $jumlah_tambah,
            'umur_awal'     => $this->input->post('umur_awal'),
            'jumlah_mati'   => $jumlah_mati,
            'jumlah_ayam'   => $jumlah_tambah - $jumlah_mati
        ];

        // Lakukan update
        $this->Ayam_model->update($id, $data);
        redirect('ayam');
    }

    public function hapus($id)
    {
        $this->Ayam_model->delete($id);
        redirect('ayam');
    }   

}
