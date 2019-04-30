<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = "Masuk";
        //rules
        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required',
            ['required' => 'Harap masukkan nama pengguna yang benar']
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'trim|required',
            ['required' => 'Harap masukkan password yang benar']
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        //usernya ada
        if ($user != null) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'full_name' => $user['full_name']
                ];
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger"
                    role="alert">Kata sandi salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"
            role="alert">Pengguna belum terdaftar!</div>');
            redirect('auth');
        }
    }
    public function signup()
    {
        $data['title'] = "Buat Akun";
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Harap masukkan e-mail Anda',
            'is_unique' => 'E-mail ini telah terdaftar'
        ]);
        $this->form_validation->set_rules('full_name', 'Name', 'required|trim', ['required' => 'Harap masukkan nama Anda']);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]|max_length[20]|is_unique[user.username]', [
            'required' => 'Harap masukkan nama pengguna',
            'is_unique' => 'Nama pengguna telah digunakan'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|max_length[20]|matches[password2]', [
            'required' => 'Harap masukkan password'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|max_length[20]|matches[password]', [
            'required' => 'Harap masukkan password',
            'min_length' => 'Password terlalu pendek, minimal 8 karakter',
            'max_length' => 'Password terlalu panjang, maksimal 20 karakter',
            'matches' => 'Password tidak cocok'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/signup', $data);
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                ),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'full_name' => htmlspecialchars($this->input->post('full_name', true)),
                'foto_profil' => 'default.jpg'
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success"
            role="alert">Selamat! Akun anda telah dibuat. Silakan masuk ke akun Anda.</div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}
