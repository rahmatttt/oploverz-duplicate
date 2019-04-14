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
        }
    }
}


?>