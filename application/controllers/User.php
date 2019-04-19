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
        $data['recommend_anime'] = $this->m_anime->getAllDataAnimeOrderBySkor(6);
        $data['latest_anime'] = $this->m_anime->getLatestSeriesAnime();
        $data['newest_episode'] = $this->m_episode->getEpisodePerAnimeOrderByTgl($config['per_page'],$from);
        $this->load->view('templates/header',$data);
        $this->load->view('user/home',$data);
        $this->load->view('templates/footer');
    }

    public function detail_anime($no_anime)
    {
        $data['title'] = base_url()."detail_anime/$no_anime";
        $data['anime'] = $this->m_anime->getDataAnimeByNo($no_anime);
        $data['genre'] = $this->m_genre->getGenre13();
        $data['recommend_anime'] = $this->m_anime->getAllDataAnimeOrderBySkor(6);
        $data['genre_anime'] = $this->m_genre->getGenreByAnime($no_anime);
        $data['episode'] = $this->m_episode->getEpisodeByAnime($no_anime);
        $data['jml_episode'] = $this->m_episode->getJumlahEpisodeByAnime($no_anime);
        $this->load->view('templates/header', $data);
        $this->load->view('user/detail_anime',$data);
        $this->load->view('templates/footer');
    }

    public function nonton_episode($no_episode)
    {
        $data['title'] = base_url()."nonton_episode/$no_episode";
        $data['genre'] = $this->m_genre->getGenre13();
        $data['recommend_anime'] = $this->m_anime->getAllDataAnimeOrderBySkor(6);
        $data['anime_episode'] = $this->m_episode->getDetailEpisodeAndAnime($this->input->get('no_anime', true),$no_episode);
        $data['genre_anime'] = $this->m_genre->getGenreByAnime($this->input->get('no_anime', true));
        $data['prev_episode'] = $this->m_episode->getPrevEpisode($no_episode, $this->input->get('no_anime',true));
        $data['next_episode'] = $this->m_episode->getNextEpisode($no_episode, $this->input->get('no_anime',true));
        $data['link_download'] = $this->m_link_download->getLinkByEpisode($no_episode);
        $data['komentar'] = $this->m_komentar->getKomentarByEpisode($no_episode);
        $this->load->view('templates/header', $data);
        $this->load->view('user/nonton_episode',$data);
        $this->load->view('templates/footer');
    }
    public function tambah_komentar($no_episode)
    {
        $this->m_komentar->tambah_komentar($no_episode);
        redirect('user/nonton_episode/'.$no_episode.'?no_anime='.$this->input->get('no_anime',true));
    }
    public function ongoing()
    {
        $data['title'] = base_url()."ongoing";
        $data['genre'] = $this->m_genre->getGenre13();
        $data['recommend_anime'] = $this->m_anime->getAllDataAnimeOrderBySkor(6);
        $data['anime'] = $this->m_anime->getOngoingAnime();
        $this->load->view('templates/header', $data);
        $this->load->view('user/ongoing',$data);
        $this->load->view('templates/footer');
    }
    public function genre()
    {
        $data['title'] = base_url()."genre";
        $data['genre'] = $this->m_genre->getGenre13();
        $data['recommend_anime'] = $this->m_anime->getAllDataAnimeOrderBySkor(6);
        $data["data_genre"] = $this->m_genre->getAllDataGenre();
        $this->load->view('templates/header', $data);
        $this->load->view('user/genre',$data);
        $this->load->view('templates/footer');
    }
    public function anime_genre($no_genre)
    {
        //konfigurasi pagination
        $config['base_url'] = base_url("user/anime_genre/$no_genre"); //site url
        $config['total_rows'] = $this->m_anime->countDataAnimeByGenre($no_genre); //total row
        $config['per_page'] = 13;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
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

        $from = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);		

        $data['title'] = base_url()."anime_genre/$no_genre";
        $data['genre'] = $this->m_genre->getGenre13();
        $data['recommend_anime'] = $this->m_anime->getAllDataAnimeOrderBySkor(6);
        $data['anime'] = $this->m_anime->getDataAnimeByGenre($no_genre);
        $data['nama_genre'] = $this->input->get('nama_genre',true);
        $this->load->view('templates/header', $data);
        $this->load->view('user/anime_genre',$data);
        $this->load->view('templates/footer');
    }
    public function popular_series()
    {
        $data['title'] = base_url()."ongoing";
        $data['genre'] = $this->m_genre->getGenre13();
        $data['recommend_anime'] = $this->m_anime->getAllDataAnimeOrderBySkor(6);
        $data['anime'] = $this->m_anime->getAllDataAnimeOrderBySkor(38);;
        $this->load->view('templates/header', $data);
        $this->load->view('user/popular_series',$data);
        $this->load->view('templates/footer');
    }
    public function daftar_isi()
    {
        $data['title'] = base_url()."daftar_isi";
        $data['genre'] = $this->m_genre->getGenre13();
        $data['recommend_anime'] = $this->m_anime->getAllDataAnimeOrderBySkor(6);

        $letter = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        foreach ($letter as $alpha) {
            $data["$alpha"] = $this->m_anime->getAnimeByFirstLetter($alpha);
        }
        $data['not_alpha'] = $this->m_anime->getAnimeByFirstLetter("[^A-Z]");
        $data['letter'] = $letter;
        $this->load->view('templates/header', $data);
        $this->load->view('user/daftar_isi',$data);
        $this->load->view('templates/footer');
    }
    public function search_anime()
    {
        $data['found'] = $this->input->post('search',true);
        $data['title'] = base_url()."search_anime";
        $data['genre'] = $this->m_genre->getGenre13();
        $data['recommend_anime'] = $this->m_anime->getAllDataAnimeOrderBySkor(6);
        $data['found_episode'] = $this->m_episode->getFindEpisodePerAnimeOrderByTgl();
        $this->load->view('templates/header',$data);
        $this->load->view('user/search_anime',$data);
        $this->load->view('templates/footer');
    }
    public function faq()
    {
        $data['title'] = base_url()."faq";
        $data['genre'] = $this->m_genre->getGenre13();
        $data['recommend_anime'] = $this->m_anime->getAllDataAnimeOrderBySkor(6);
        $this->load->view('templates/header',$data);
        $this->load->view('user/faq',$data);
        $this->load->view('templates/footer');
    }
    public function dmca()
    {
        $data['title'] = base_url()."dmca";
        $data['genre'] = $this->m_genre->getGenre13();
        $data['recommend_anime'] = $this->m_anime->getAllDataAnimeOrderBySkor(6);
        $this->load->view('templates/header',$data);
        $this->load->view('user/dmca',$data);
        $this->load->view('templates/footer');
    }
}


?>