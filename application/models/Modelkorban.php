<?php

class Modelkorban extends CI_Model {

   public function ambildata($kodekorban) {
    return $this->db->get_where('korban',array('kodekorban'=>$kodekorban));}

function datakorban(){
    return $this->db->query("SELECT * FROM korban");
}
    function simpandata() {
        $kodekorban = $this->input->post('kodekorban', TRUE);
        $namakorban = $this->input->post('namakorban', TRUE);
        $umur = $this->input->post('umur', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $jeniskelamin = $this->input->post('jeniskelamin', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);

        $this->form_validation->set_rules('kodekorban', 'Kode korban', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('namakorban', 'Nama Korban', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('umur', 'umur', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('alamat', 'alamat', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required', array('required' => '%s tidak boleh kosong'));
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => '%s tidak boleh kosong'));
        
        if ($this->form_validation->run() == FALSE) {
            return FALSE;
        } else {
            return $this->db->query("insert into korban values('$kodekorban','$namakorban','$umur','$alamat','$jeniskelamin','$keterangan')");
        }
    }

    function updatedata() {
        $kodekorban = $this->input->post('kodekorban', TRUE);
        $namakorban = $this->input->post('namakorban', TRUE);
        $umur = $this->input->post('umur', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $jeniskelamin = $this->input->post('jeniskelamin', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);

        return $this->db->query("update korban set namakorban='$namakorban', umur='$umur', alamat='$alamat', jeniskelamin='$jeniskelamin', keterangan='$keterangan' where kodekorban='$kodekorban'");
    }
    
    function hapusdata($kodekorban){
        return $this->db->query("DELETE FROM korban WHERE kodekorban='$kodekorban'");
    }
}