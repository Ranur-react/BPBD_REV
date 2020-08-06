<?php
class Modeljenisbencana extends CI_Model {

   public function ambildata($kodejenis) {
    return $this->db->get_where('jenisbencana',array('kodejenis'=>$kodejenis));}

function datajenisbencana(){
    return $this->db->query("SELECT * FROM jenisbencana");
}
    function simpandata() {
        $kodejenis = $this->input->post('kodejenis', TRUE);
        $jenisbencana = $this->input->post('jenisbencana', TRUE);

        $this->form_validation->set_rules('kodejenis', 'Kode Jenis', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('jenisbencana', 'Jenis Bencana', 'required', array('required' => '%s tidak boleh kosong'));
		
        if ($this->form_validation->run() == FALSE) {
            return FALSE;
        } else {
            return $this->db->query("insert into jenisbencana values('$kodejenis','$jenisbencana')");
        }
    }

    function updatedata() {
        $kodejenis = $this->input->post('kodejenis', TRUE);
        $jenisbencana = $this->input->post('jenisbencana', TRUE);

        return $this->db->query("update jenisbencana set jenisbencana='$jenisbencana' where kodejenis='$kodejenis'");
    }
    
    function hapusdata($kodejenis){
        return $this->db->query("DELETE FROM jenisbencana WHERE kodejenis='$kodejenis'");
    }
}