<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pakan extends CI_Controller {


public function __construct() {
parent::__construct();
$this->load->model('Pakan_model');
}

public function index()
{
    $data['pakan'] = $this->Pakan_model->get_all();
    $data['alert'] = $this->session->flashdata('alert');

    $this->load->view('header');
    $this->load->view('pakan/index', $data);
}



public function tambah() {
    if ($this->input->post()) {

        $data = [
            'nama_pakan' => $this->input->post('nama_pakan'),
            'stok_awal'  => $this->input->post('stok_awal'),
            'stok_sisa'  => $this->input->post('stok_sisa'),
            'satuan'     => $this->input->post('satuan')
        ];

        $this->Pakan_model->insert($data);

        // notif sukses
       $this->session->set_flashdata('alert', [
            'type' => 'tambah',
            'message' => 'Data pakan berhasil ditambahkan'
        ]);

        // balik ke halaman index pakan
        redirect('pakan');
    }

    // tampilan form
    $this->load->view('pakan/tambah');
}

public function edit($id) {
    if ($this->input->post()) {
        $data = [
            'nama_pakan' => $this->input->post('nama_pakan'),
            'stok_awal'  => $this->input->post('stok_awal'),
            'stok_sisa'  => $this->input->post('stok_sisa'),
            'satuan'     => $this->input->post('satuan')
        ];
        $this->Pakan_model->update($id, $data);
        $this->session->set_flashdata('alert', [
            'type' => 'edit',
            'message' => 'Data pakan berhasil diubah'
        ]);
        redirect('pakan');
    }

    $data['pakan'] = $this->Pakan_model->get_by_id($id);
    $this->load->view('pakan/edit', $data);
}

    public function update()
    {
        $id = $this->input->post('id_pakan'); // Ambil ID dari hidden input
        
        $data = [
            'nama_pakan' => $this->input->post('nama_pakan'),
            'stok_awal'  => $this->input->post('stok_awal'),
            'stok_sisa'  => $this->input->post('stok_sisa'),
            'satuan'     => $this->input->post('satuan')
        ];

        $this->Pakan_model->update($id, $data);
        
        $this->session->set_flashdata('alert', [
            'type' => 'edit',
            'message' => 'Data pakan berhasil diubah'
        ]);
        
        redirect('pakan');
    }

public function hapus($id)
{
    if (!$this->input->post('hapus')) {
        show_404(); 
    }

    $this->Pakan_model->delete($id);

    $this->session->set_flashdata('alert', [
        'type' => 'hapus',
        'message' => 'Data pakan berhasil dihapus'
    ]);

    redirect('pakan');
}


}