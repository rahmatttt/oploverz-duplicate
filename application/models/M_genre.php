<?php

class M_genre extends CI_Model
{
    public function getAllDataGenre()
    {
        $this->db->order_by('nama_genre','asc');
        $que = $this->db->get('genre');
        return $que->result_array();
    }
    public function getGenreByAnime($no_anime)
    {
        $que = $this->db->query("SELECT nama_genre FROM genre JOIN genre_meliputi_anime ON genre.no_genre = genre_meliputi_anime.no_genre WHERE genre_meliputi_anime.no_anime = $no_anime");
        return $que->result_array();
    }
    public function tambah_genre()
    {
        $data = [
            "nama_genre" => $this->input->post('nama_genre',true)
        ];
        $this->db->insert('genre',$data);
    }
    public function edit_genre($no_genre)
    {
        $data = [
            "nama_genre" => $this->input->post('nama_genre',true)
        ];
        $this->db->where('no_genre',$no_genre);
        $this->db->update('genre',$data);
    }
    public function delete_genre($no_genre)
    {
        $this->db->where('no_genre',$no_genre);
        $this->db->delete('genre');
    }
    
}


?>