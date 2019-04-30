<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('Blog_model');
        $posts = $this->Blog_model->getAll();
        $data['posts'] = $posts;
        $data['title'] = "Home";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        if ($data['user']) {
            $this->isLogin($data, $posts);
        } else {
            $this->load->view('header', $data);
            $this->load->view('home', $posts);
            // $this->load->view('rekomendasi');
            // $this->load->view('recent_post');
            $this->load->view('footer');
        }
    }
    public function isLogin($data)
    {
        $this->load->model('Blog_model');
        $posts = $this->Blog_model->getAll();
        $data['posts'] = $posts;
        if (!$this->session->userdata('username')) {
            redirect('home');
        } else {
            $this->load->view('header_login', $data);
            $this->load->view('home', $posts);
            // $this->load->view('rekomendasi');
            // $this->load->view('recent_post');
            $this->load->view('footer');
        }
    }
}
