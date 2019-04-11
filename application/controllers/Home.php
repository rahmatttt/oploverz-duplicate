<?php
class Daftarisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_home');
    }
    public function index()
    {
        $this->load->view('templates/header',$data);
        $this->load->view('Home/index', $data);
        $this->load->view('templates/footer');
    }
    public function allgenre()
    {
        $this->M_home->getAllGenre();
    }
    public function anime()
    {
        $this->M_home->getanime();
    }
    public function episode()
    {
        $this->M_home->getNewEpisode();
    }
    public function lastanime(){
        $this->M_home-> getLastAnime();
    }
}