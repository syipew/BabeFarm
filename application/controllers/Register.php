<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Register_Model');
        $this->load->library(['form_validation']);
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
            return;
        }

        $data = [
            'nama_lengkap'  => $this->input->post('nama', TRUE),
            'username'      => $this->input->post('username', TRUE),
            'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'email'         => $this->input->post('email', TRUE),
            'nomor_telepon' => $this->input->post('telepon', TRUE)
        ];

        $this->Register_Model->register($data);

        redirect('login'); // setelah daftar → LOGIN
    }
}
