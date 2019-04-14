<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
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
            $this->form_validation->set_rules('judul','Judul', 'required');
            $this->form_validation->set_rules('produser','Produser', 'required');
            $this->form_validation->set_rules('jadwal','Jadwal', 'required');
            $this->form_validation->set_rules('tgl_penyiaran','Tanggal Penyiaran', 'required');
            $this->form_validation->set_rules('durasi','Durasi', 'required');
            $this->form_validation->set_rules('skor','Skor', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "edit anime";
                $data['anime'] = $this->m_anime->getDataAnimeByNo($no_anime);
                $data['genre'] = $this->m_genre->getGenreByAnime($no_anime);
                $data['all_genre'] = $this->m_genre->getAllDataGenre();
                $this->load->view('templates/header', $data);
                $this->load->view('admin/edit_anime', $data);
                $this->load->view('templates/footer');           
            } else {
                // $data = [
                //     "judul_anime" => $this->input->post('judul', true);
                //     "judul_anime" => $this->input->post('judul', true);
                // ];
                $this->m_anime->update_anime($no_anime);
                redirect("admin");
            }
            
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