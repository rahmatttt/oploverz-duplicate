<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('username','Nama', 'required');
        $this->form_validation->set_rules('password','Password', 'required');
        if ($this->form_validation->run() == FALSE) {
			$data['title'] = "login admin";
            $this->load->view('templates/header',$data);
            $this->load->view('login/index');
            $this->load->view('templates/footer');
        }
        else {
            $data = [
                "username" => $this->input->post('username',true),
                "password" => $this->input->post('password',true)
            ];
            $cek = $this->m_admin->cekDataAdmin($data["username"],$data["password"]);
            if ($cek>0) {
                $this->session->set_userdata('admin', $data);
                redirect('admin');
            }            
            else {
                $this->session->set_flashdata('flash', 'Login Gagal!');
                redirect('login');
            }
        }
    }
   
}


?>