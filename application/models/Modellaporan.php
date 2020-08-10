<?php
	class Modellaporan extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function datajenis()
		{
			$hs1=$this->db->query("SELECT DISTINCT dkodejenisbencana,jenisbencana FROM daerahrawan JOIN jenisbencana ON dkodejenisbencana=kodejenis");
			return $hs1;
        }
		function lap_daerahrawan($dkodejenisbencana)
		{
			$hs1=$this->db->query("SELECT *,namakorong,namanagari,namakecamatan,jenisbencana FROM daerahrawan JOIN korong JOIN nagari JOIN kecamatan JOIN jenisbencana ON dkodekorong=kodekorong AND dkodenagari=kodenagari AND dkodekecamatan=kodekecamatan AND dkodejenisbencana=kodejenis where dkodejenisbencana='$dkodejenisbencana'");
			return $hs1;
        }
		function lap_kasusbencana($tglawal,$tglakhir)
		{
			$hs1=$this->db->query("select*,namakorong,namanagari,namakecamatan,dkodekorban,dnamakorban,dalamat,djeniskelamin,dketerangan,regu,jenisbencana from kasusbencana join detailkorban join korong join nagari join kecamatan join regu join jenisbencana on kodekasus=dkodekasus and kkodekorong=kodekorong and kkodenagari=kodenagari and kkodekecamatan=kodekecamatan and kkodejenis=kodejenis and regutimpenanggulangan=idregu WHERE tglkejadian BETWEEN '$tglawal' AND '$tglakhir' GROUP BY kodekasus");
			return $hs1;
		}
		function lap_kasusbencana_kodekasus($kode)
		{
			$hs1=$this->db->query("select*,namakorong,namanagari,namakecamatan,dkodekorban,dnamakorban,dalamat,djeniskelamin,dketerangan,regu,jenisbencana from kasusbencana join detailkorban join korong join nagari join kecamatan join regu join jenisbencana on kodekasus=dkodekasus and kkodekorong=kodekorong and kkodenagari=kodenagari and kkodekecamatan=kodekecamatan and kkodejenis=kodejenis and regutimpenanggulangan=idregu WHERE kodekasus='$kode' ");
			return $hs1;
		}
		function lap_kasusbencanarusak($tglawal,$tglakhir)
		{
			$hs1=$this->db->query("select*,namakorong,namanagari,namakecamatan,detjeniskerusakan,detketerangan,regu,jenisbencana from kasusbencana join detailkerusakan join korong join nagari join kecamatan join regu join jenisbencana on kodekasus=detkodekasus and kkodekorong=kodekorong and kkodenagari=kodenagari and kkodekecamatan=kodekecamatan and kkodejenis=kodejenis and regutimpenanggulangan=idregu WHERE tglkejadian BETWEEN '$tglawal' AND '$tglakhir' GROUP BY kodekasus");
			return $hs1;
		}
		function lap_kasusbencanarusak_Kode($kode)
		{
			$hs1=$this->db->query("select*,namakorong,namanagari,namakecamatan,detjeniskerusakan,detketerangan,regu,jenisbencana from kasusbencana join detailkerusakan join korong join nagari join kecamatan join regu join jenisbencana on kodekasus=detkodekasus and kkodekorong=kodekorong and kkodenagari=kodenagari and kkodekecamatan=kodekecamatan and kkodejenis=kodejenis and regutimpenanggulangan=idregu WHERE kodekasus='$kode'");
			return $hs1;
		}

		function lap_kejadianharian($tglawal,$tglakhir)
		{
			$hs1=$this->db->query("SELECT*,lokasi,namakorong,namanagari,namakecamatan,regu,jenisbencana,keterangan,taksirankerugian,jumlahdanapenanggulangan,tindaklanjut FROM kejadianhariandanpenanggulangan JOIN kasusbencana JOIN korong JOIN nagari JOIN kecamatan JOIN jenisbencana JOIN regu ON kkodekasus=kodekasus and kkodekorong=kodekorong AND kkodenagari=kodenagari AND kkodekecamatan=kodekecamatan AND kkodejenis=kodejenis AND regutimpenanggulangan=idregu WHERE tanggal BETWEEN '$tglawal' AND '$tglakhir' GROUP BY kodekejadian");
			return $hs1;
		}
	}