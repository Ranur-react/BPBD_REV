<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Log extends CI_Controller{
    function __construct()
    {
        parent :: __construct();
        $this->load->model('Login');
    }
    function index()
    {
        $this->load->view('login/vlogin');
    }
    function masuk()
    {
        $username = strip_tags(str_replace("'","", $this->input->post('un',true)));
        $userpassword = strip_tags(str_replace("'","", $this->input->post('ps',true)));
        $cekakun = $this->Login->in($username,$userpassword);
        if(strlen($username)=='' || strlen($userpassword)=='')
            {
                $this->session->set_flashdata('msg','Username Atau Password Anda Tidak Boleh Kosong');
                $url=base_url();redirect($url);    
            }
        else{
            if($cekakun->num_rows() > 0){
                $rcekuser = $cekakun->row_array();
                $this->session->set_userdata('masuk',TRUE);	
                $this->session->set_userdata('status_login','Oke');	
                $this->session->set_userdata('username',$rcekuser['username']);
                $this->session->set_userdata('userpassword',$rcekuser['userpassword']);	
				$this->session->set_userdata('userhakakses',$rcekuser['userhakakses']);	
            }       
        else{     
            $this->session->set_userdata('masuk',FALSE);
            }
        }
        if($this->session->userdata('masuk')==TRUE){
                $user=$this->session->userdata('username');
                redirect('template');
            }
        else{        
            $this->session->set_flashdata('msg','Periksa Kembali Username & Password Anda');
            $url=base_url();redirect($url);
        }
    }
     function logout()
     {
        $this->session->sess_destroy();
        $url=base_url();
        redirect($url);
     }
  }
