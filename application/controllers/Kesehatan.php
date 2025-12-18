<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesehatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
         $this->load->database(); 
        $this->load->model('Kesehatan_model');
    }

    public function index()
    {
        $data['kesehatan'] = $this->Kesehatan_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('data_kesehatan', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
{
    $this->load->view('templates/header');
    $this->load->view('templates/navbar');
    $this->load->view('kesehatan/tambah');
    $this->load->view('templates/footer');
}
public function edit()
{
    $this->load->view('templates/header');
    $this->load->view('templates/navbar');
    $this->load->view('kesehatan/edit');
    $this->load->view('templates/footer');
}

}