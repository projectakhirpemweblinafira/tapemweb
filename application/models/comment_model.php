<?php
defined('BASEPATH') or exit('No direct script access allowed');
class comment_model extends CI_Model
{
    private $table = "komentar";
    public $komentar;
    public $username_komen;

    public function get_comment($id)
    {
        $this->load->database();
        return $this->db->select('*')->from($this->table)->where('id_postingan', $id)->order_by('waktu_komentar', 'DESC')->get()->result();
    }
    public function insert_comment($username, $komentar, $id)
    {
        $data = [
            'username_komen' => $username,
            'komentar' => $komentar,
            'id_postingan' => $id
        ];
        $this->db->insert('komentar', $data);
    }
}
