<?php

class Modelregutrc extends CI_Model {

   public function ambildata($idregu) {
    return $this->db->get_where('regu',array('idregu'=>$idregu));}

function dataregutrc(){
    return $this->db->query("SELECT * FROM regu");
}
    function simpandata() {
        $idregu = $this->input->post('idregu', TRUE);
        $regu = $this->input->post('regu', TRUE);

        $this->form_validation->set_rules('idregu', 'ID Regu', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('regu', 'Regu', 'required', array('required' => '%s tidak boleh kosong'));
		
        if ($this->form_validation->run() == FALSE) {
            return FALSE;
        } else {
            return $this->db->query("insert into regu values('$idregu','$regu')");
        }
    }

    function updatedata() {
        $idregu = $this->input->post('idregu', TRUE);
        $regu = $this->input->post('regu', TRUE);

        return $this->db->query("update regu set regu='$regu' where idregu='$idregu'");
    }
    
    function hapusdata($idregu){
        return $this->db->query("DELETE FROM regu WHERE idregu='$idregu'");
    }
}