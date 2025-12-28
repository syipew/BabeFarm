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

        $this->load->view('header');
        $this->load->view('kesehatan/data_kesehatan', $data);
    }
    public function tambah()
{
    $this->load->view('header');
    $this->load->view('kesehatan/tambah');
}
public function edit()
{
    $this->load->view('header');
    $this->load->view('kesehatan/edit');
}

}