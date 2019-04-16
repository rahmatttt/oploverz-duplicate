<?php

class M_komentar extends CI_Model
{
    public function getAllDataKomentar()
    {
        $que = $this->db->query('SELECT k.no_komentar,k.nama, k.email, k.isi_komentar, k.tgl_komentar, k.status, a.judul_anime, e.judul_episode, e.episode FROM komentar k JOIN episode e ON k.no_episode = e.no_episode JOIN anime a ON a.no_anime = e.no_anime ORDER BY k.isi_komentar DESC');
        return $que->result_array();
    }
    public function ubah_status($new_status,$no_komentar)
    {
        $data = [
            "status" => $new_status
        ];
        $this->db->where('no_komentar',$no_komentar);
        $this->db->update('komentar',$data);
    }
}


?>