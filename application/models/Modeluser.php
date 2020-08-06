<?php

class Modeluser extends CI_Model {

   public function ambildata($userid) {
    return $this->db->get_where('user',array('userid'=>$userid));}

function datauser($cari){
    $arraycari=array(
    'userid'=>$cari,
    'username'=>$cari
    );
    $this->db->or_like($arraycari);
    return $this->db->get('user');
}
    function simpandata() {
        $username = $this->input->post('username', TRUE);
		$userpassword = $this->input->post('userpassword', TRUE);
        $userhakakses = $this->input->post('userhakakses', TRUE);

        $this->form_validation->set_rules('username', 'user', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('userpassword', 'No Hp', 'required', array('required' => '%s tidak boleh kosong'));
		$this->form_validation->set_rules('userhakakses', 'Hak Akses', 'required', array('required' => '%s tidak boleh kosong'));


        if ($this->form_validation->run() == FALSE) {
            return FALSE;
        } else {
            return $this->db->query("insert into user (userid,username,userpassword,userhakakses) values('$userid','$username',md5('$userpassword'),'$userhakakses')");
        }
    }

   

    function updatedata() {
        $userid = $this->input->post('userid', TRUE);
        $username = $this->input->post('username', TRUE);
        $userpassword = $this->input->post('userpassword', TRUE);
        $userhakakses = $this->input->post('userhakakses', TRUE);

        return $this->db->query("update user set username='$username',userpassword=md5('$userpassword'),userhakakses='$userhakakses' where userid='$userid'");
    }
    
    function hapusdata($userid){
        return $this->db->query("DELETE FROM user WHERE userid='$userid'");
    }

public function updatefoto($pathgambar,$userid){
    $field = array('foto' => $pathgambar);
    $this->db->where('userid', $userid);
    return $this->db->update('user', $field);
    }

}