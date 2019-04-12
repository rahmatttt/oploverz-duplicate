<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->model('m_anime');
    }
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('admin/view_anime');
        $this->load->view('templates/footer');
    }
    
}


?>