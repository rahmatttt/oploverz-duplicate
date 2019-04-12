<?php

class M_anime extends CI_Model
{
    public function getAllDataAnime()
    {
        $que = $this->db->get('anime');
        return $que->result_array();
    }
    
}


?>