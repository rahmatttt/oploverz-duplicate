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
        $this->load->model('m_episode');
        $this->load->model('m_link_download');
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
    //anime
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
            $this->form_validation->set_rules('deskripsi','Deskripsi', 'required');
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
                $this->m_anime->update_anime($no_anime);
                redirect("admin");
            }
            
        } else {
            redirect('login');
        }
        
    }
    
    public function tambah_anime()
    {
        if ($this->session->has_userdata('admin')) {
            $this->form_validation->set_rules('judul','Judul', 'required');
            $this->form_validation->set_rules('deskripsi','Deskripsi', 'required');
            $this->form_validation->set_rules('produser','Produser', 'required');
            $this->form_validation->set_rules('jadwal','Jadwal', 'required');
            $this->form_validation->set_rules('tgl_penyiaran','Tanggal Penyiaran', 'required');
            $this->form_validation->set_rules('durasi','Durasi', 'required');
            $this->form_validation->set_rules('skor','Skor', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "tambah anime";
                $data['all_genre'] = $this->m_genre->getAllDataGenre();
                $this->load->view('templates/header', $data);
                $this->load->view('admin/tambah_anime',$data);
                $this->load->view('templates/footer');           
            } else {
                $this->m_anime->tambah_anime();
                redirect("admin");
            }
            
        } else {
            redirect('login');
        }
    }

    public function detail_anime($no_anime)
    {
        if ($this->session->has_userdata('admin')) {
            $data['title'] = "detail anime";
            $data['anime'] = $this->m_anime->getDataAnimeByNo($no_anime);
            $data['genre'] = $this->m_genre->getGenreByAnime($no_anime);
            $data['episode'] = $this->m_episode->getEpisodeByAnime($no_anime);
            $data['jml_episode'] = $this->m_episode->getJumlahEpisodeByAnime($no_anime);
            $this->load->view('templates/header', $data);
            $this->load->view('admin/detail_anime',$data);
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
        
    }
    //link
    public function tambah_link($no_anime)
    {
        if ($this->session->has_userdata('admin')) {
            if ($this->input->post('nama_link',true) != "" && $this->input->post('link',true) != "") {
                $this->m_link_download->tambah_link();
            }
            redirect("admin/detail_anime/$no_anime");
        } else {
            redirect('login');
        }
    }

    public function delete_link($no_link)
    {
        if ($this->session->has_userdata('admin')) {
            $this->m_link_download->delete_link($no_link);
            redirect("admin/detail_anime/".$this->input->get('no_anime',true));
        } else {
            redirect('login');
        }
    }
    //episode
    public function tambah_episode($no_anime)
    {
        if ($this->session->has_userdata('admin')) {
            $this->form_validation->set_rules('judul_episode','Judul Episode', 'required');
            $this->form_validation->set_rules('deskripsi','Deskripsi', 'required');
            $this->form_validation->set_rules('episode','Episode', 'required');
            $this->form_validation->set_rules('link_streaming','Link Streaming', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "tambah episode $no_anime";
                $data['anime'] = $this->m_anime->getDataAnimeByNo($no_anime);
                $this->load->view('templates/header', $data);
                $this->load->view('admin/tambah_episode', $data);
                $this->load->view('templates/footer');           
            } else {
                $this->m_episode->tambah_episode($no_anime);
                redirect("admin/detail_anime/$no_anime");
            }
        } else {
            redirect("login");
        }
    }
    public function edit_episode($no_episode)
    {
        if ($this->session->has_userdata('admin')) {
            $this->form_validation->set_rules('judul_episode','Judul Episode', 'required');
            $this->form_validation->set_rules('deskripsi','Deskripsi', 'required');
            $this->form_validation->set_rules('episode','Episode', 'required');
            $this->form_validation->set_rules('link_streaming','Link Streaming', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "edit episode $no_episode";
                $data['anime'] = $this->m_anime->getDataAnimeByNo($this->input->get('no_anime',true));
                $data['episode'] = $this->m_episode->getEpisodeByNo($no_episode);
                $this->load->view('templates/header', $data);
                $this->load->view('admin/edit_episode', $data);
                $this->load->view('templates/footer');           
            } else {
                $this->m_episode->edit_episode($no_episode);
                redirect("admin/detail_anime/".$this->input->get('no_anime',true));
            }
        } else {
            redirect("login");
        }
    }
    public function delete_episode($no_episode)
    {
        if ($this->session->has_userdata('admin')) {
            $this->m_episode->delete_episode($no_episode);
            redirect('admin/detail_anime/'.$this->input->get('no_anime',true));
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