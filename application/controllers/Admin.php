<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('m_anime');
        $this->load->model('m_genre');
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

    public function delete_anime($no_anime)
    {
        if ($this->session->has_userdata('admin')) {
            $this->m_anime->delete_anime($no_anime);
            redirect('admin');
        } else {
            redirect('login');
        }
    }

    public function edit_anime($no_anime)
    {
        if ($this->session->has_userdata('admin')) {
            $data['title'] = "edit anime";
            $data['anime'] = $this->m_anime->getDataAnimeByNo($no_anime);
            $data['genre'] = $this->m_genre->getGenreByAnime($no_anime);
            $this->load->view('templates/header', $data);
            $this->load->view('admin/edit_anime', $data);
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