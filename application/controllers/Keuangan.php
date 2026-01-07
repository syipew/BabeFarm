<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keuangan_model');
    }

    public function index()
    {
        $data['keuangan'] = $this->Keuangan_model->getAll();
        $this->load->view('header');
        $this->load->view('keuangan/index', $data);
    }
    
    public function tambah()
    {
        $this->load->view('keuangan/tambah');
    }

    public function simpan()
    {
        $this->form_validation->set_rules('tanggal_transaksi', 'Tanggal', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('keuangan/tambah');
        } else {
            $data = [
                'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
                'jenis'             => $this->input->post('jenis'), // Sesuaikan nama kolom db
                'kategori'          => $this->input->post('kategori'),
                'jumlah'            => $this->input->post('jumlah'),
            ];

            $this->Keuangan_model->insert($data);

            $this->session->set_flashdata('success', 'Data keuangan berhasil disimpan!');
            
            redirect('keuangan');
        }
    }

    public function edit($id)
    {
        $data['keuangan'] = $this->Keuangan_model->getById($id);

        $this->load->view('keuangan/edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id_keuangan');

        $data = [
            'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
            'jenis'             => $this->input->post('jenis'),
            'kategori'          => $this->input->post('kategori'),
            'jumlah'            => $this->input->post('jumlah')
        ];

        $this->Keuangan_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data keuangan berhasil diperbarui');
        redirect('keuangan');
    }
    public function hapus($id)
    {
        $this->Keuangan_model->delete($id);
        redirect('keuangan');
    }

}
