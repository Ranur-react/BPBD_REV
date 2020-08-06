<?php
class Modelkorong extends CI_Model {

   public function ambildata($kodekorong) {
    return $this->db->query("SELECT *,namakecamatan,namanagari from korong JOIN nagari JOIN kecamatan ON kode_nagari=kodenagari AND kd_kecamatan=kodekecamatan where kodekorong='$kodekorong'");}

	function datakorong()
	{
		return $this->db->query("SELECT *,namakecamatan,namanagari from korong JOIN nagari JOIN kecamatan ON kode_nagari=kodenagari AND kd_kecamatan=kodekecamatan");
    }
    function datakecamatan()
    {
        return $this->db->query("SELECT * FROM kecamatan");
    }
    function datanagari()
    {
        return $this->db->query("SELECT * FROM nagari JOIN kecamatan ON kode_kecamatan=kodekecamatan");
    }
    function datanagari_Kecam($val)
    {
        return $this->db->query("SELECT * FROM nagari JOIN kecamatan ON kode_kecamatan=kodekecamatan WHERE kodekecamatan='$val';");
    }
    function simpan($kodekorong,$namakorong,$kd_kecamatan,$kode_nagari) {

        return $this->db->query("insert into korong values('$kodekorong','$namakorong','$kd_kecamatan','$kode_nagari')");
    }

    function updatedata() {
        $kodekorong = $this->input->post('kodekorong', TRUE);
        $namakorong = $this->input->post('namakorong', TRUE);
        $kd_kecamatan = $this->input->post('kd_kecamatan',TRUE);
        $kode_nagari = $this->input->post('kode_nagari',TRUE);


        return $this->db->query("update korong set namakorong='$namakorong',kd_kecamatan='$kd_kecamatan',kode_nagari='$kode_nagari' where kodekorong='$kodekorong'");
    }
    
    function hapusdata($kodekorong){
        return $this->db->query("DELETE FROM korong WHERE kodekorong='$kodekorong'");
    }

}
