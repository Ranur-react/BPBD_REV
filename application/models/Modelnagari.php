<?php

class Modelnagari extends CI_Model {

   public function ambildata($kodenagari) {
    return $this->db->query("SELECT *,namakecamatan FROM nagari JOIN kecamatan ON kode_kecamatan=kodekecamatan where kodenagari='$kodenagari'");}

    function datanagari(){
    return $this->db->query("SELECT *,namakecamatan FROM nagari JOIN kecamatan ON kode_kecamatan=kodekecamatan");
    }

	function datakecamatan()
	{
		return $this->db->query("SELECT * from kecamatan");
    }

    function simpan($kodenagari,$namanagari,$kode_kecamatan) {

        return $this->db->query("insert into nagari values('$kodenagari','$namanagari','$kode_kecamatan')");
    }
    function updatedata() {
        $kodenagari = $this->input->post('kodenagari', TRUE);
        $namanagari = $this->input->post('namanagari', TRUE);
        $kode_kecamatan = $this->input->post('kode_kecamatan',TRUE);

        return $this->db->query("update nagari set namanagari='$namanagari',kode_kecamatan='$kode_kecamatan' where kodenagari='$kodenagari'");
    }
    
    function hapusdata($kodenagari){
        return $this->db->query("DELETE FROM nagari WHERE kodenagari='$kodenagari'");
    }
}