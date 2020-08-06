<?php

class Modeltrc extends CI_Model {

   public function ambildata($kodetrc) {
    return $this->db->query("SELECT *,regu FROM timtrc JOIN regu ON koderegu=idregu where kodetrc='$kodetrc'");}

    function datatrc(){
    return $this->db->query("SELECT *,regu FROM timtrc JOIN regu ON koderegu=idregu");
    }

	function dataregutrc()
	{
		return $this->db->query("SELECT * from regu");
    }

    function simpan($kodetrc,$namatrc,$tanggallahir,$alamat,$notelp,$jeniskelamin,$pendidikanakhir,$bagian,$koderegu) {

        return $this->db->query("insert into timtrc values('$kodetrc','$namatrc','$tanggallahir','$alamat','$notelp','$jeniskelamin','$pendidikanakhir','$bagian','$koderegu')");
    }
    function updatedata() {
        $kodetrc = $this->input->post('kodetrc', TRUE);
        $namatrc = $this->input->post('namatrc', TRUE);
        $tanggallahir = $this->input->post('tanggallahir', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $notelp = $this->input->post('notelp',TRUE);
        $jeniskelamin = $this->input->post('jeniskelamin',TRUE);
        $pendidikanakhir = $this->input->post('pendidikanakhir',TRUE);
        $bagian = $this->input->post('bagian',TRUE);
        $koderegu = $this->input->post('koderegu',TRUE);

        return $this->db->query("update timtrc set namatrc='$namatrc',tanggallahir='$tanggallahir',alamat='$alamat',notelp='$notelp',jeniskelamin='$jeniskelamin',pendidikanakhir='$pendidikanakhir',bagian='$bagian',koderegu='$koderegu' where kodetrc='$kodetrc'");
    }
    
    function hapusdata($kodetrc){
        return $this->db->query("DELETE FROM timtrc WHERE kodetrc='$kodetrc'");
    }
}