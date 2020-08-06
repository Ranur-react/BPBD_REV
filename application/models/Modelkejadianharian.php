<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelkejadianharian extends CI_Model{
	function tampil()
	{
		return $this->db->query("SELECT*,lokasi FROM kejadianhariandanpenanggulangan JOIN kasusbencana ON kkodekasus=kodekasus GROUP BY kodekejadian ORDER BY tanggal DESC");
	}
	function datakasusbencana()
	{
		return $this->db->query("SELECT *,namakecamatan,namanagari,namakorong,jenisbencana FROM kasusbencana JOIN kecamatan JOIN nagari JOIN korong JOIN jenisbencana JOIN regu ON kkodekecamatan=kodekecamatan and kkodenagari=kodenagari and kkodekorong=kodekorong and kkodejenis=kodejenis and regutimpenanggulangan=idregu");
	}
	function simpan($kodekejadian,$tanggal,$cuaca,$suhu,$kelembaban,$kencangangin,$arahangin,$kodekasus,$peringatandini)  
	{   
		return $this->db->query("INSERT INTO kejadianhariandanpenanggulangan VALUES('$kodekejadian','$tanggal','$cuaca','$suhu','$kelembaban','$kencangangin','$arahangin','$kodekasus','$peringatandini')");   
	}
}
?>