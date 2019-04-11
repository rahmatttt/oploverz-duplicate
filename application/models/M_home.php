<?php
class M_home extends CI_model
{
    public function getAllGenre(){
        return->this->db->get('genre')->result_array();
    }
    public function getanime(){
        $this->db->select('gambar','judul_anime');
        $this->db->from('anime');
        $query=$this->db->get();
    }
    public function getNewEpisode(){
        $this->db->select(*);
        $this->db->from('anime');
        $this->db->join('episode','episode.no_anime=anime.no_anime');
        $query=$this->db->get();
        $data=$query->result_array();
    }
    public function getLastAnime(){
        $this->db->select('gambar','judul_anime');
        $this->db->from('anime');
        $this->db->where('status',complete);
        $query=$this->db->get();
    }
}