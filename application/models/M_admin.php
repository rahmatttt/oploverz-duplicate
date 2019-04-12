<?php

class M_admin extends CI_Model
{
    public function cekDataAdmin($username,$pass)
    {
        $this->db->where('username',$username);
        $this->db->where('password',$pass);
        $que = $this->db->get('admin');
        return $que->num_rows();
    }
    
}


?>