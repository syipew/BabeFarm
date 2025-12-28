<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Profil_model');
    }

    public function index()
    {
        $data['profil'] = $this->Profil_model->get_profil();

        $this->load->view('header');
        $this->load->view('profil/data_profil', $data);
    }

    public function edit()
    {
        $data['profil'] = $this->Profil_model->get_profil();

        $this->load->view('header');
        $this->load->view('profil/edit_profil', $data);
    }

    public function update()
    {
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'username'     => $this->input->post('username'),
            'password'     => $this->input->post('password'),
            'email'        => $this->input->post('email'),
            'nomor_telepon'=> $this->input->post('nomor_telepon'),
        ];

        $this->Profil_model->update_profil($data);
        redirect('profil');
    }
}