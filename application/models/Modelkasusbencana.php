<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelkasusbencana extends CI_Model{
	function tampil()
	{
		return $this->db->query("SELECT*,namakorong,namanagari,namakecamatan,regu,jenisbencana,COUNT(DISTINCT(dkodekorban)) AS korban, COUNT(DISTINCT(detjeniskerusakan)) AS rusak FROM kasusbencana JOIN korong JOIN nagari JOIN kecamatan JOIN jenisbencana JOIN regu JOIN detailkorban JOIN detailkerusakan ON kkodekorong=kodekorong AND kkodenagari=kodenagari AND kkodekecamatan=kodekecamatan AND kkodejenis=kodejenis AND regutimpenanggulangan=idregu AND dkodekasus=kodekasus AND detkodekasus=kodekasus GROUP BY kodekasus ORDER BY tglkejadian DESC");
	}
	function datakorban()
	{
		return $this->db->query("SELECT * FROM korban where kodekorban NOT IN(select idtempkorban from tempkorban)");
	}
	function simpan($kodekasus,$tglkejadian,$waktukejadian,$kkodejenis,$lokasi,$kkodekecamatan,$kkodenagari,$kkodekorong,$taksirankerugian,$keterangan,$regutimpenanggulangan,$jumlahdanapenanggulangan,$tindaklanjut)  
	{   
		$a = $this->db->query("INSERT INTO kasusbencana VALUES('$kodekasus','$tglkejadian','$waktukejadian','$kkodejenis','$lokasi','$kkodekecamatan','$kkodenagari','$kkodekorong','$taksirankerugian','$keterangan','$regutimpenanggulangan','$jumlahdanapenanggulangan','$tindaklanjut')");   
		$b = $this->db->query("INSERT INTO detailkorban(dkodekasus,dkodekorban,dnamakorban,dalamat,djeniskelamin,dketerangan) SELECT '$kodekasus',idtempkorban,namakorban,alamatkorban,jeniskelaminkorban,keterangankorban FROM tempkorban");   
		$c = $this->db->query("INSERT INTO detailkerusakan(detkodekasus,detjeniskerusakan,detjumlah,detketerangan) SELECT '$kodekasus',jeniskerusakan,jumlah,keteranganrusak FROM tempkerusakan");   
		$d = $this->db->query("DELETE FROM tempkorban");     
		$e = $this->db->query("DELETE FROM tempkerusakan");     
		return $a; return $b; return $c; return $d; return $e;  
	}
	function smptempkorban($idtempkorban,$namakorban,$alamatkorban,$jeniskelaminkorban,$keterangankorban)  
	{   
		return $this->db->query("INSERT into tempkorban values('$idtempkorban','$namakorban','$alamatkorban','$jeniskelaminkorban','$keterangankorban')");  
	}
	function smptempkerusakan($idtempkerusakan,$jeniskerusakan,$jumlah,$keteranganrusak)  
	{   
		return $this->db->query("INSERT into tempkerusakan values('$idtempkerusakan','$jeniskerusakan','$jumlah','$keteranganrusak')");  
	}
	function hapustmpkorban($kode)  
	{   
		return $this->db->query("DELETE from tempkorban where idtempkorban='$kode'"); 
	}
	function hapustmpkerusakan($kode)  
	{   
		return $this->db->query("DELETE from tempkerusakan where idtempkerusakan='$kode'"); 
	}
	function datatempkorban()
	{
		return $this->db->query("SELECT * from tempkorban join korban on idtempkorban=kodekorban");
	}
	function datatempkerusakan()
	{
		return $this->db->query("SELECT * from tempkerusakan");
	}
	function ambildatakorban($kode)
	{
		return $this->db->query("select kodekasus,tglkejadian,waktukejadian,namakorong,namanagari,namakecamatan,dkodekorban,dnamakorban,dalamat,djeniskelamin,dketerangan from kasusbencana join detailkorban join korong join nagari join kecamatan on kodekasus=dkodekasus and kkodekorong=kodekorong and kkodenagari=kodenagari and kkodekecamatan=kodekecamatan where kodekasus='$kode'");
	}
	function ambildatakerusakan($kode)
	{
		return $this->db->query("select kodekasus,tglkejadian,waktukejadian,namakorong,namanagari,namakecamatan,detjeniskerusakan,detjumlah,detketerangan,taksirankerugian from kasusbencana join detailkerusakan join korong join nagari join kecamatan on kodekasus=detkodekasus and kkodekorong=kodekorong and kkodenagari=kodenagari and kkodekecamatan=kodekecamatan where kodekasus='$kode'");
	}
}
?>