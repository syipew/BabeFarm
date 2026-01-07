<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Register_Model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
    }

    // HALAMAN LOGIN
    public function index()
    {
        // Kalau sudah login, jangan balik ke login
        if ($this->session->userdata('login')) {
            redirect('home');
        }

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
            return;
        }

        $user = $this->Register_Model->get_by_username(
            $this->input->post('username', TRUE)
        );

        if ($user && password_verify($this->input->post('password'), $user->password)) {

            $this->session->set_userdata([
                'id_admin' => $user->id_admin,
                'nama'     => $user->nama_lengkap,
                'username' => $user->username,
                'login'    => true
            ]);

            redirect('home');
        }

        $this->session->set_flashdata('error', 'Username atau password salah');
        redirect('login');
    }

    // LOGOUT
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
