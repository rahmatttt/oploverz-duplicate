<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('m_anime');
    }
    public function index()
    {
        if ($this->session->has_userdata('admin')) {
            $data['title'] = "admin-view_anime";
            $data['anime'] = $this->m_anime->getAllDataAnime();
            $this->load->view('templates/header', $data);
            $this->load->view('admin/view_anime');
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
        
    }
    public function logout()
    {
        $this->session->unset_userdata('admin');
        $this->session->sess_destroy();
        redirect('welcome');        
    }
}


?>