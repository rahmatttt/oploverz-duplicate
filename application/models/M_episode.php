<?php

class M_episode extends CI_Model
{
    public function getEpisodeByAnime($no_anime)
    {
        $this->db->where('no_anime', $no_anime);
        $que = $this->db->get('episode');
        return $que->result_array();
    }

    public function getJumlahEpisodeByAnime($no_anime)
    {
        $this->db->where('no_anime', $no_anime);
        $que = $this->db->get('episode');
        return $que->num_rows();
    }
    
}


?>