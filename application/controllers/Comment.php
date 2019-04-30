<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Comment extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('comment');
    }
    public function create()
    {
        $this->load->helper('url');
        $this->load->view('comment');
    }
    public function addComment()
    {
        $this->load->model("comment_model");
        $id = $this->input->post('id');
        $username = $this->session->userdata('username');
        $komentar = $this->input->post('komentar');
        $this->comment_model->insert_comment($username, $komentar, $id);
        redirect(base_url('blog/isiposting/' . $id), 'refresh');
    }
}
