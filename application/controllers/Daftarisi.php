<?php

class Daftarisi extends CI_Controller
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('m_daftarisi');
    }
    public function index()
    {
        $data['title'] = "daftar isi anime";
        $data['anime_A'] = $this->m_daftarisi->getAnime_A();
        $data['anime_B'] = $this->m_daftarisi->getAnime_B();
        $data['anime_C'] = $this->m_daftarisi->getAnime_C();
        $data['anime_D'] = $this->m_daftarisi->getAnime_D();
        $data['anime_E'] = $this->m_daftarisi->getAnime_E();
        $data['anime_F'] = $this->m_daftarisi->getAnime_F();
        $data['anime_G'] = $this->m_daftarisi->getAnime_G();
        $data['anime_H'] = $this->m_daftarisi->getAnime_H();
        $data['anime_I'] = $this->m_daftarisi->getAnime_I();
        $data['anime_J'] = $this->m_daftarisi->getAnime_J();
        $data['anime_K'] = $this->m_daftarisi->getAnime_K();
        $data['anime_L'] = $this->m_daftarisi->getAnime_L();
        $data['anime_M'] = $this->m_daftarisi->getAnime_M();
        $data['anime_N'] = $this->m_daftarisi->getAnime_N();
        $data['anime_O'] = $this->m_daftarisi->getAnime_O();
        $data['anime_P'] = $this->m_daftarisi->getAnime_P();
        $data['anime_Q'] = $this->m_daftarisi->getAnime_Q();
        $data['anime_R'] = $this->m_daftarisi->getAnime_R();
        $data['anime_S'] = $this->m_daftarisi->getAnime_S();
        $data['anime_T'] = $this->m_daftarisi->getAnime_A();
        $data['anime_U'] = $this->m_daftarisi->getAnime_A();
        $data['anime_V'] = $this->m_daftarisi->getAnime_A();
        $data['anime_W'] = $this->m_daftarisi->getAnime_A();
        $data['anime_X'] = $this->m_daftarisi->getAnime_A();
        $data['anime_Y'] = $this->m_daftarisi->getAnime_A();
        $data['anime_Z'] = $this->m_daftarisi->getAnime_A();

    }
}

?>