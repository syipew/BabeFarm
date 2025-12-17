<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_Model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        if ($this->session->userdata('login') === TRUE) {
            redirect('home');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login');
        } else {

            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password');

            $admin = $this->Register_Model->getUserByUsername($username);

            if ($admin && password_verify($password, $admin->password)) {

                $this->session->set_userdata([
                    'id_admin' => $admin->id_admin,
                    'username' => $admin->username,
                    'login'    => TRUE
                ]);

                redirect('home');

            } else {

                $this->session->set_flashdata(
                    'error',
                    '<div class="error">Username atau password salah</div>'
                );
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
