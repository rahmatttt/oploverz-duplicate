<?php

class M_anime extends CI_Model
{
    public function getAllDataAnime()
    {
        $que = $this->db->get('anime');
        return $que->result_array();
    }
    public function getDataAnimeByNo($no_anime)
    {
        $this->db->where('no_anime',$no_anime);
        $que = $this->db->get('anime');
        return $que->result_array();
    }
    public function delete_anime($no_anime)
    {
        $this->db->where('no_anime',$no_anime);
        $this->db->delete('anime');
    }
    public function update_anime($no_anime)
    {
        $data = [
            "judul_anime" => $this->input->post('judul', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            
        ];
    }
}


?>