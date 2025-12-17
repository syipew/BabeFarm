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

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('data_ayam', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
{
    $this->load->view('templates/header');
    $this->load->view('templates/navbar');
    $this->load->view('ayam/tambah');
    $this->load->view('templates/footer');
}
public function edit()
{
    $this->load->view('templates/header');
    $this->load->view('templates/navbar');
    $this->load->view('ayam/edit');
    $this->load->view('templates/footer');
}

}


