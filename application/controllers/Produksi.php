<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database(); 
        $this->load->model('Produksi_model');
        $this->load->model('Ayam_model');
    }

    public function index()
    {
        $data['produksi'] = $this->Produksi_model->get_all();

        $this->load->view('header'); // header.php
        $this->load->view('produksi/hasil_produksi', $data); // folder produksi

    }

    public function tambah_produksi()
    {
        $this->load->model('Ayam_model'); 
        
        $data['ayam'] = $this->Ayam_model->get_all(); 
        
        $this->load->view('produksi/tambah_produksi', $data);        
    }

    public function simpan()
    {
        $data = [
            'tanggal_produksi'  => $this->input->post('tanggal_produksi'),
            'jumlah_produksi'   => $this->input->post('jumlah_produksi'),
            'satuan'            => $this->input->post('satuan'),
            'id_kandang'        => $this->input->post('id_kandang'),
        ];

        $this->Produksi_model->insert($data);
        redirect('produksi');
    }

    public function edit_produksi($id)
    {
        $data['produksi'] = $this->Produksi_model->getById($id);
        $data['ayam'] = $this->Ayam_model->get_all();

        if (!$data['produksi']) {
            show_404();
        }

        $this->load->view('produksi/edit_produksi', $data);
    }

    public function update() 
    {
        $id = $this->input->post('id_produksi');

        $data = [
            'tanggal_produksi' => $this->input->post('tanggal_produksi'),
            'jumlah_produksi'  => $this->input->post('jumlah_produksi'),
            'satuan'           => $this->input->post('satuan'),
            'id_kandang'       => $this->input->post('id_kandang'),
        ];

        $this->Produksi_model->update($id, $data);
        
        $this->session->set_flashdata('success', 'Data produksi berhasil diperbarui');
        redirect('produksi');
    }

    public function hapus($id)
    {
        $this->Produksi_model->delete($id);
        redirect('produksi');
    }
}