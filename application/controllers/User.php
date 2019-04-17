<?php

class User extends CI_Controller
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('pagination');
        $this->load->model('m_anime');
        $this->load->model('m_genre');
        $this->load->model('m_episode');
        $this->load->model('m_link_download');
        $this->load->model('m_komentar');
    }
    public function index()
    {
        //konfigurasi pagination
        $config['base_url'] = base_url('user/index'); //site url
        $config['total_rows'] = $this->db->count_all('episode'); //total row
        $config['per_page'] = 13;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->pagination->initialize($config);		

        $data['title'] = base_url();
        $data['genre'] = $this->m_genre->getGenre13();
        $data['recommend_anime'] = $this->m_anime->getAllDataAnimeOrderBySkor();
        $data['featured_anime'] = $this->m_anime->getFeaturedAnime();
        $data['latest_anime'] = $this->m_anime->getLatestSeriesAnime();
        $data['newest_episode'] = $this->m_episode->getEpisodePerAnimeOrderByTgl($config['per_page'],$from);
        $this->load->view('templates/header',$data);
        $this->load->view('user/home',$data);
        $this->load->view('templates/footer');
    }

}


?>