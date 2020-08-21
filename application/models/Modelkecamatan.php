<?php

class Modelkecamatan extends CI_Model {

   public function ambildata($kodekecamatan) {
    return $this->db->get_where('kecamatan',array('kodekecamatan'=>$kodekecamatan));}

function datakecamatan(){
    return $this->db->query("SELECT * FROM kecamatan");
}
    function datakorong()
    {
        return $this->db->query("SELECT *,namakecamatan,namanagari from korong JOIN nagari JOIN kecamatan ON kode_nagari=kodenagari AND kd_kecamatan=kodekecamatan");
    }
    function simpandata() {
        $kodekecamatan = $this->input->post('kodekecamatan', TRUE);
        $namakecamatan = $this->input->post('namakecamatan', TRUE);

        $this->form_validation->set_rules('kodekecamatan', 'Nama Kecamatan', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('namakecamatan', 'namakecamatan', 'required', array('required' => '%s tidak boleh kosong'));
		
        if ($this->form_validation->run() == FALSE) {
            return FALSE;
        } else {
            return $this->db->query("insert into kecamatan values('$kodekecamatan','$namakecamatan')");
        }
    }

    function updatedata() {
        $kodekecamatan = $this->input->post('kodekecamatan', TRUE);
        $namakecamatan = $this->input->post('namakecamatan', TRUE);

        return $this->db->query("update kecamatan set namakecamatan='$namakecamatan' where kodekecamatan='$kodekecamatan'");
    }
    
    function hapusdata($kodekecamatan){
        return $this->db->query("DELETE FROM kecamatan WHERE kodekecamatan='$kodekecamatan'");
    }
}