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
    $this->load->view('header');
    $this->load->view('ayam/tambah');
}
public function edit()
{
    $this->load->view('header');
    $this->load->view('ayam/edit');
}

}