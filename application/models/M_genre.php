<?php

class M_genre extends CI_Model
{
    public function getAllDataGenre()
    {
        $que = $this->db->get('genre');
        return $que->result_array();
    }
    public function getGenreByAnime($no_anime)
    {
        $que = $this->db->query("SELECT nama_genre FROM genre JOIN genre_meliputi_anime ON genre.no_genre = genre_meliputi_anime.no_genre WHERE genre_meliputi_anime.no_anime = $no_anime");
        return $que->result_array();
    }
    
}


?>