<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); 
        $this->load->model('Produksi_model');
    }

    public function index()
    {
        $data['produksi'] = $this->Produksi_model->get_all();

        $this->load->view('header'); // header.php
        $this->load->view('produksi/hasil_produksi', $data); // folder produksi

    }

    public function tambah_produksi()
    {
        $this->load->view('header');
        $this->load->view('produksi/tambah_produksi');
        
    }

    public function simpan()
    {
        $data = [
            'jenis_ayam'        => $this->input->post('jenis_ayam'),
            'tanggal_produksi'  => $this->input->post('tanggal_produksi'),
            'jumlah_produksi'   => $this->input->post('jumlah_produksi'),
            'satuan'            => $this->input->post('satuan')
        ];

        $this->Produksi_model->insert($data);
        redirect('produksi');
    }

    public function edit_produksi($id)
    {
        $data['produksi'] = $this->Produksi_model->get_by_id($id);

        $this->load->view('header');
        $this->load->view('produksi/edit_produksi', $data);
        
    }

    public function update($id)
    {
        $data = [
            'jenis_ayam'        => $this->input->post('jenis_ayam'),
            'tanggal_produksi'  => $this->input->post('tanggal_produksi'),
            'jumlah_produksi'   => $this->input->post('jumlah_produksi'),
            'satuan'            => $this->input->post('satuan')
        ];

        $this->Produksi_model->update($id, $data);
        redirect('produksi');
    }

    public function hapus($id)
    {
        $this->Produksi_model->delete($id);
        redirect('produksi');
    }
}