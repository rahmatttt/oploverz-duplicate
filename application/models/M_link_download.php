<?php

class M_link_download extends CI_Model
{
    public function getLinkByEpisode($no_episode)
    {
        $this->db->where('no_episode', $no_episode);
        $que = $this->db->get('link_download');
        return $que->result_array();
    }
    public function tambah_link()
    {
        $data = [
            "nama_link" => $this->input->post('nama_link', true),
            "link" => $this->input->post('link', true),
            "no_episode" => $this->input->post('no_episode', true)
        ];
        $this->db->insert('link_download', $data);
    }

    public function delete_link($no_link)
    {
        $this->db->where('no_link',$no_link);
        $this->db->delete('link_download');
    }
}


?>