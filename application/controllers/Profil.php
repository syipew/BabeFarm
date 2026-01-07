<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // proteksi login
        if (!$this->session->userdata('username')) {
            redirect('login');
        }

        $this->load->model('Profil_model');
    }

    public function index()
    {
        $data['profil'] = $this->Profil_model->get_by_username(
            $this->session->userdata('username')
        );
        $this->load->view('header');
        $this->load->view('profil/data_profil', $data);
    }

    public function edit()
    {
        $data['profil'] = $this->Profil_model->get_by_username(
            $this->session->userdata('username')
        );
        $this->load->view('header');
        $this->load->view('profil/edit_profil', $data);
    }

    public function update()
    {
        $data = [
            'nama_lengkap'  => $this->input->post('nama_lengkap'),
            'username'      => $this->input->post('username'),
            'email'         => $this->input->post('email'),
            'nomor_telepon' => $this->input->post('nomor_telepon')
        ];

        $this->Profil_model->update_profil(
            $this->session->userdata('username'),
            $data
        );
        $this->session->set_flashdata('success', 'Profil berhasil diupdate');
        // update session nama & username
        $this->session->set_userdata('nama', $data['nama_lengkap']);
        $this->session->set_userdata('username', $data['username']);

        $this->load->view('header');
        redirect('profil');
    }

    public function ganti_password()
    {
        $this->load->view('profil/ganti_password');
    }

    public function update_password()
    {
        $password_baru = $this->input->post('password_baru');
        $konfirmasi    = $this->input->post('konfirmasi');

        if ($password_baru != $konfirmasi) {
            $this->session->set_flashdata('error', 'Password tidak sama');
            redirect('profil/ganti_password');
        }

        $data = [
            'password' => password_hash($password_baru, PASSWORD_DEFAULT)
        ];

        $this->Profil_model->update_profil(
            $this->session->userdata('username'),
            $data
        );

        $this->session->set_flashdata('success', 'Password berhasil diganti');
        redirect('profil');
    }
}
