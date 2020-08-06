<?php

class Modeldaerahrawan extends CI_Model {

   public function ambildata($kodedaerahrawan) {
    return $this->db->query("SELECT *,namakorong,namanagari,namakecamatan,jenisbencana FROM daerahrawan JOIN korong JOIN nagari JOIN kecamatan JOIN jenisbencana ON dkodekorong=kodekorong AND dkodenagari=kodenagari AND dkodekecamatan=kodekecamatan AND dkodejenisbencana=kodejenis where kodedaerahrawan='$kodedaerahrawan'");
    }

    function datadaerahrawan(){
        return $this->db->query("SELECT *,namakorong,namanagari,namakecamatan,jenisbencana FROM daerahrawan JOIN korong JOIN nagari JOIN kecamatan JOIN jenisbencana ON dkodekorong=kodekorong AND dkodenagari=kodenagari AND dkodekecamatan=kodekecamatan AND dkodejenisbencana=kodejenis");        
    }

    function datakorong(){
    return $this->db->query("SELECT *,namakecamatan,namanagari FROM korong JOIN kecamatan JOIN nagari ON kd_kecamatan=kodekecamatan AND kode_nagari=kodenagari");
    }
    
    function datajenisbencana(){
        return $this->db->query("SELECT * FROM jenisbencana");
        }

    function simpan($kodedaerahrawan,$dkodekorong,$dkodenagari,$dkodekecamatan,$dkodejenisbencana,$keterangan) {
        return $this->db->query("insert into daerahrawan values('$kodedaerahrawan','$dkodekorong','$dkodenagari','$dkodekecamatan','$dkodejenisbencana','$keterangan')");
    }
    function updatedata() {
        $kodedaerahrawan = $this->input->post('kodedaerahrawan', TRUE);
        $dkodekorong = $this->input->post('dkodekorong', TRUE);
        $dkodenagari = $this->input->post('dkodenagari',TRUE);
        $dkodekecamatan = $this->input->post('dkodekecamatan',TRUE);
        $keterangan = $this->input->post('keterangan',TRUE);

        return $this->db->query("update daerahrawan set dkodekorong='$dkodekorong',dkodenagari='$dkodenagari',dkodekecamatan='$dkodekecamatan',keterangan='$keterangan' where kodedaerahrawan='$kodedaerahrawan'");
    }
    
    function hapusdata($kodedaerahrawan){
        return $this->db->query("DELETE FROM daerahrawan WHERE kodedaerahrawan='$kodedaerahrawan'");
    }
}