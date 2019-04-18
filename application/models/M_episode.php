<?php

class M_episode extends CI_Model
{
    public function getEpisodeByAnime($no_anime)
    {
        $this->db->where('no_anime', $no_anime);
        $que = $this->db->get('episode');
        return $que->result_array();
    }
    
    public function getEpisodePerAnimeOrderByTgl($number,$offset)
    {
        $que = $this->db->query("SELECT a.no_anime, a.judul_anime, a.gambar, e.no_episode,e.episode,e.thumbnail,e.tgl_rilis FROM anime a JOIN episode e ON a.no_anime = e.no_anime ORDER BY e.tgl_rilis LIMIT $number OFFSET $offset");
        return $que->result_array();
    }
    public function getDetailEpisodeAndAnime($no_anime,$no_episode)
    {
        $que = $this->db->query("SELECT a.no_anime, a.judul_anime, a.gambar, a.status, a.durasi, a.deskripsi, e.no_episode,e.episode,e.thumbnail,e.tgl_rilis, e.link_streaming FROM anime a JOIN episode e ON a.no_anime = e.no_anime WHERE a.no_anime = $no_anime AND e.no_episode = $no_episode");
        return $que->result_array();
    }
    public function getNextEpisode($no_episode, $no_anime)
    {
        $this->db->select('no_episode');
        $this->db->select('no_anime');
        $this->db->where("no_episode >",$no_episode);
        $this->db->where("no_anime",$no_anime);
        $que = $this->db->get('episode',1);
        return $que->result_array();
    }
    public function getPrevEpisode($no_episode, $no_anime)
    {
        $this->db->select('no_episode');
        $this->db->select('no_anime');
        $this->db->where("no_episode <",$no_episode);
        $this->db->where("no_anime",$no_anime);
        $this->db->order_by("no_episode","desc");
        $que = $this->db->get('episode',1);
        return $que->result_array();
    }

    public function getJumlahEpisodeByAnime($no_anime)
    {
        $this->db->where('no_anime', $no_anime);
        $que = $this->db->get('episode');
        return $que->num_rows();
    }

    public function getEpisodeByNo($no_episode)
    {
        $this->db->where('no_episode', $no_episode);
        $que = $this->db->get('episode');
        return $que->result_array();
    }
    public function cekEpisode($episode, $no_anime)
    {
        $this->db->where('episode',$episode);
        $this->db->where('no_anime',$no_anime);
        $this->db->order_by('episode');
        $que = $this->db->get('episode');
        return $que->num_rows();
    }
    public function tambah_episode($no_anime)
    {
        $config['upload_path'] = './assets/gambar/'; //isi dengan nama folder temoat menyimpan gambar
        $config['allowed_types'] = 'jpg|png|jpeg'; //isi dengan format/tipe gambar yang diterima

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar'))
        {
            $data = [
                "episode" => $this->input->post('episode', true),
                "judul_episode" => $this->input->post('judul_episode', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "no_anime" => $no_anime,
                "tgl_rilis" => date('Y-m-d'),
                "link_streaming" => $this->input->post('link_streaming', true),
            ];
            $this->db->insert('episode', $data);
        }
        else
        {
            $data = [
                "episode" => $this->input->post('episode', true),
                "judul_episode" => $this->input->post('judul_episode', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "thumbnail" => $this->upload->data('file_name'),
                "no_anime" => $no_anime,
                "tgl_rilis" => date('Y-m-d'),
                "link_streaming" => $this->input->post('link_streaming', true)
            ];
            $this->db->insert('episode', $data);
        }
        if ($this->input->post('check_end',true)) {
            $this->db->update('anime',array("status" => "completed"));
        }
    }
    public function edit_episode($no_episode)
    {
        $config['upload_path'] = './assets/gambar/'; //isi dengan nama folder temoat menyimpan gambar
        $config['allowed_types'] = 'jpg|png|jpeg'; //isi dengan format/tipe gambar yang diterima

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar'))
        {
            $data = [
                "episode" => $this->input->post('episode', true),
                "judul_episode" => $this->input->post('judul_episode', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "link_streaming" => $this->input->post('link_streaming', true)
            ];
            $this->db->where('no_episode', $no_episode);
            $this->db->update('episode', $data);
        }
        else
        {
            $data = [
                "episode" => $this->input->post('episode', true),
                "judul_episode" => $this->input->post('judul_episode', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "thumbnail" => $this->upload->data('file_name'),
                "link_streaming" => $this->input->post('link_streaming', true)
            ];
            $this->db->where('no_episode', $no_episode);
            $this->db->update('episode', $data);

            unlink("assets/gambar/".$this->input->post("old_pict",true));
        }
        
    }

    public function delete_episode($no_episode)
    {
        $gambar = $this->input->get('thumbnail',true);

        if ($gambar!="default_image.png") {
            unlink("assets/gambar/".$gambar);
        }
        
        $this->db->where('no_episode',$no_episode);
        $this->db->delete('episode');
    }
}


?>