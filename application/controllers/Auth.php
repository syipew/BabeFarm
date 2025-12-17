<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    public function register() {
        // rules validasi form
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('register');
        } else {
            $data = [
                'nama_lengkap' => $this->input->post('nama', TRUE),
                'username'     => $this->input->post('username', TRUE),
                'password'     => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email'        => $this->input->post('email', TRUE),
                'telepon'      => $this->input->post('telepon', TRUE),
                'role'         => 'customer',
                'created_at'   => date('Y-m-d H:i:s')
            ];

            $this->Auth_model->register($data);

            $this->session->set_flashdata('success', 'Akun berhasil dibuat! Silakan login.');
            redirect('auth/login');
        }
    }

    public function login() {
        // view login
        $this->load->view('login');
        $this->load->view('login');
    }
}
