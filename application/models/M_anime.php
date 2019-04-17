<?php

class M_anime extends CI_Model
{
    public function getAllDataAnime()
    {
        $que = $this->db->get('anime');
        return $que->result_array();
    }
    public function getAllDataAnimeOrderBySkor()
    {
        $this->db->order_by('skor','dsc');
        $que = $this->db->get('anime');
        return $que->result_array();
    }
    public function getFeaturedAnime()
    {
        $this->db->order_by('skor','dsc');
        $que = $this->db->get('anime', 6);
        return $que->result_array();
    }
    public function getLatestSeriesAnime()
    {
        $que = $this->db->query("SELECT a.no_anime, a.judul_anime, a.gambar, e.no_episode,e.episode,e.thumbnail,e.tgl_rilis FROM anime a JOIN episode e ON a.no_anime = e.no_anime GROUP BY a.no_anime ORDER BY e.tgl_rilis LIMIT 10");
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
        $gambar = $this->db->get_where("anime", array('no_anime' => $no_anime))->result_array();
        foreach ($gambar as $pict) {
            if ($pict['gambar']!="default_image.png") {
                unlink("assets/gambar/".$pict['gambar']);
            }
        }
        $this->db->where('no_anime',$no_anime);
        $this->db->delete('anime');
    }
    public function update_anime($no_anime)
    {
        
        $config['upload_path'] = './assets/gambar/'; //isi dengan nama folder temoat menyimpan gambar
        $config['allowed_types'] = 'jpg|png|jpeg'; //isi dengan format/tipe gambar yang diterima

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar'))
        {
            $data = [
                "judul_anime" => $this->input->post('judul', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "produser" => $this->input->post('produser', true),
                "jdwl_rilis" => $this->input->post('jadwal', true),
                "tgl_penyiaran" => $this->input->post('tgl_penyiaran', true),
                "durasi" => $this->input->post('durasi', true),
                "skor" => $this->input->post('skor', true),
                "status" => $this->input->post('status', true)
            ];
            $this->db->where('no_anime',$no_anime);
            $this->db->update('anime', $data);
        }
        else
        {
            $data = [
                "judul_anime" => $this->input->post('judul', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "produser" => $this->input->post('produser', true),
                "jdwl_rilis" => $this->input->post('jadwal', true),
                "tgl_penyiaran" => $this->input->post('tgl_penyiaran', true),
                "durasi" => $this->input->post('durasi', true),
                "gambar" => $this->upload->data('file_name'),
                "skor" => $this->input->post('skor', true),
                "status" => $this->input->post('status', true)
            ];
            $this->db->where('no_anime',$no_anime);
            $this->db->update('anime', $data);

            unlink("assets/gambar/".$this->input->post("gambar_lama",true));
        }
        $this->db->where('no_anime',$no_anime);
        $this->db->delete('genre_meliputi_anime');
        if ($this->input->post('genre',true)) {
            foreach ($this->input->post('genre',true) as $check) {
                $data = [
                    'no_anime'=>$no_anime,
                    'no_genre'=>$check
                ];
                $this->db->insert('genre_meliputi_anime',$data);
            }
        }
    
    }
    public function tambah_anime()
    {
        $config['upload_path'] = './assets/gambar/'; //isi dengan nama folder temoat menyimpan gambar
        $config['allowed_types'] = 'jpg|png|jpeg'; //isi dengan format/tipe gambar yang diterima

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar'))
        {
            $data = [
                "judul_anime" => $this->input->post('judul', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "produser" => $this->input->post('produser', true),
                "jdwl_rilis" => $this->input->post('jadwal', true),
                "tgl_penyiaran" => $this->input->post('tgl_penyiaran', true),
                "durasi" => $this->input->post('durasi', true),
                "skor" => $this->input->post('skor', true),
                "status" => $this->input->post('status', true)
            ];
            $this->db->insert('anime', $data);
        }
        else
        {
            $data = [
                "judul_anime" => $this->input->post('judul', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "produser" => $this->input->post('produser', true),
                "jdwl_rilis" => $this->input->post('jadwal', true),
                "tgl_penyiaran" => $this->input->post('tgl_penyiaran', true),
                "durasi" => $this->input->post('durasi', true),
                "gambar" => $this->upload->data('file_name'),
                "skor" => $this->input->post('skor', true),
                "status" => $this->input->post('status', true)
            ];
            $this->db->insert('anime', $data);

            foreach ($this->db->query("SELECT * FROM anime ORDER BY no_anime DESC LIMIT 1")->result_array() as $no) {
                $no_anime = $no['no_anime'];
                if ($this->input->post('genre',true)) {
                    foreach ($this->input->post('genre',true) as $check) {
                        $data = [
                            'no_anime'=>$no_anime,
                            'no_genre'=>$check
                        ];
                        $this->db->insert('genre_meliputi_anime',$data);
                    }
                }
            }
        }
    }
}


?>