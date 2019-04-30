<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function edit()

    {
        $this->form_validation->set_rules('full_name', 'Full_name', 'required|trim');
        $data['email'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['username'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['full_name'] = $this->db->get_where('user', ['full_name' => $this->session->userdata('full_name')])->row_array();
        $data['foto_profil'] = $this->db->get_where('user', ['foto_profil' => $this->session->userdata('foto_profil')])->row_array();


        if ($this->form_validation->run() == false) {
            $data['title'] = "Ubah Profil";
            $this->load->view('header_login', $data);
            $this->load->view('edit', $data);
            $this->load->view('footer_login');
        } else {
            $email = $this->input->post('email');
            $full_name = $this->input->post('full_name');

            $this->db->set('full_name', $full_name);

            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success"
            role="alert">Profil anda telah diperbarui!</div>');
            redirect(base_url('user/edit'));
        }
    }
}
