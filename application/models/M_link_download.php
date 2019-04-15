<?php

class M_link_download extends CI_Model
{
    public function getLinkByEpisode($no_episode)
    {
        $this->db->where('no_episode', $no_episode);
        $que = $this->db->get('link_download');
        return $que->result_array();
    }
}


?>