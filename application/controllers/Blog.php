<?php
defined('BASEPATH') or exit('No direct script access allowed');
class blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("blog_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->model('Blog_model');
        $posts = $this->Blog_model->get_posts();
        $data['posts'] = $posts;
    }

    public function my_post()
    {
        $data1['title'] = "Postingan Saya";
        $username = $this->session->userdata('username');
        $data["posts"] = $this->blog_model->getMyPost($username);
        if (!$username) {
            redirect('home');
        } else {
            $this->load->view('header_login', $data1);
            $this->load->view('myPost', $data);
            $this->load->view('footer');
        }
    }
    public function create()
    {
        $data['title'] = "Buat Postingan";
        $this->load->view('header_login', $data);
        $this->load->view('blog_create');
        $this->load->view('footer');
    }
    public function create_process()
    {
        $blog = $this->blog_model;
        $username = $this->session->userdata('username');
        $blog->save($username);
        $this->session->set_flashdata('message', '<div class="alert alert-success"role="alert">Berhasil disimpan</div>');
        redirect('blog/create', 'refresh');
    }
    public function edit($id)
    {
        $data["posts"] = $this->blog_model->getById($id);
        if (!$data["posts"]) show_404();
        $this->load->view('header_login');
        $this->load->view('blog_edit', $data);
    }
    public function edit_process()
    {
        $blog = $this->blog_model;
        $username = $this->session->userdata('username');
        $blog->update();
        $this->session->set_flashdata('message', '<div class="alert alert-success"role="alert">Berhasil update</div>');
        redirect(base_url('blog/my_post'), 'refresh');
    }
    public function delete($id)
    {
        $this->blog_model->delete($id);
        redirect(base_url('blog/my_post'));
    }

    public function isiPosting($id)
    {
        $username = $this->session->userdata('username');
        //cara merubah array ke sebuah variabel
        $user = $this->blog_model->getUser($id);
        $data["posts"] = $this->blog_model->getById($id);
        $this->load->model("comment_model");
        $comments = $this->comment_model->get_comment($id);
        $data2["comments"] = $comments;
        $data1['title'] = 'Post';
        if ($username) {
            if ($user != $username) {
                $this->load->view('header_login', $data1);
                $this->load->view('isi_posting', $data);
                $this->load->view('comment',  $data2);
                $this->load->view('footer');
            } else {
                $this->load->view('header_login', $data1);
                $this->load->view('isi_posting', $data);
                $this->load->view('comment', $data2);
                $this->load->view('footer');
            }
        } else {
            $this->load->view('header', $data1);
            $this->load->view('isi_posting', $data);
            $this->load->view('comment', $data2);
            $this->load->view('footer');
        }
    }
}
