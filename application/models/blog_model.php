<?php
defined('BASEPATH') or exit('No direct script access allowed');
class blog_model extends CI_Model
{

    private $_table = "posting";
    public $username_posting;
    public $nama_restoran;
    public $alamat;
    public $hari_buka;
    public $hari_tutup;
    public $jam_buka;
    public $jam_tutup;
    public $id_lokasi_alamat;
    public $kisaran_harga;
    public $kontak;
    public $foto;
    public $deskripsi;
    public $waktu_posting;

    public function getAll()
    {
        $this->load->database();
        return $this->db->select('*')->from($this->_table)->order_by('waktu_posting', 'DESC')->get()->result();
    }
    public function getMyPost($username)
    {
        $this->load->database();
        return $this->db->get_where($this->_table, array('username_posting' => $username))->result();
    }

    public function getById($id)
    {
        $this->load->database();
        return $this->db->get_where($this->_table, array('id_post' => $id))->result();
    }
    /*     public function getTitle($id)
    {
        $this->load->database();
        return $this->db->select('nama_restoran')->from($this->_table)->where('id_post', $id)->get()->result();
    } */
    public function save($username)
    {
        $this->load->database();
        $post = $this->input->post();
        $data = array(
            'username_posting' => $username,
            'nama_restoran' => $post['nama_restoran'],
            'alamat' => $post["alamat"],
            'hari_buka' => $post["hari_buka"],
            'hari_tutup' => $post["hari_tutup"],
            'jam_buka' => $post["jam_buka"],
            'jam_tutup' => $post["jam_tutup"],
            'id_lokasi_alamat' => $post["id_lokasi_alamat"],
            'kisaran_harga' => $post["kisaran_harga"],
            'kontak' => $post["kontak"],
            'deskripsi' => $post["deskripsi"]
        );
        if (!empty($_FILES['foto']['name'])) {
            $foto = $this->_uploadImage();
            $data["foto"] = $foto;
        }
        $this->db->insert($this->_table, $data);
    }

    private function _uploadImage()
    {
        $config['upload_path']      = 'assets/upload/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 100;
        $config['max_widht']         = 1000;
        $config['max_height']          = 1000;
        $config['file_name']         = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
        }
        return $this->upload->data('file_name');
    }
    public function update()
    {
        $this->load->database();
        $post = $this->input->post();
        $data = array(
            'nama_restoran' => $post['nama_restoran'],
            'alamat' => $post["alamat"],
            'hari_buka' => $post["hari_buka"],
            'hari_tutup' => $post["hari_tutup"],
            'jam_buka' => $post["jam_buka"],
            'jam_tutup' => $post["jam_tutup"],
            'id_lokasi_alamat' => $post["id_lokasi_alamat"],
            'kisaran_harga' => $post["kisaran_harga"],
            'kontak' => $post["kontak"],
            'deskripsi' => $post["deskripsi"]
        );
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }
        $this->db->update($this->_table, $data, array('id_post' => $post['id']));
    }
    public function delete($id)
    {
        $this->load->database();
        return $this->db->delete($this->_table, array("id_post" => $id));
    }
    private function _deleteImage($id)
    {
        $product = $this->getById($id);
        if ($product->image != "default.jpg") {
            $filename = explode(".", $product->image)[0];
            return array_map('unlink', glob(FCPATH . "assets/image/$filename.*"));
        }
    }
    public function getUser($id)
    {
        $this->load->database();
        $this->db->select('username_posting');
        return $this->db->get_where($this->_table, array('id_post' => $id))->result();
    }
}
