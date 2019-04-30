<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function FunctionName(Type $var = null)
    {
        # code...
    }
}
