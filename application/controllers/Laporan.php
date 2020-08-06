<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_controller { 
	function __Construct() 
	{ 
		parent :: __Construct(); 
		$this->load->model('Modellaporan'); 
		$this->load->helper(array('form','url')); 
    } 
    
	function daerahrawan()
	{
		$a['judul']="Cetak Daerah Rawan Bencana";
		$d['datajenis'] =$this->Modellaporan->datajenis();
		$a['menu']=$this->load->view('template/menu','',TRUE);
		$a['konten']=$this->load->view('laporan/daerahrawan',$d,TRUE);
		$this->parser->parse('template/template',$a);
	}

	function lap_daerahrawan()
	{
		$dkodejenisbencana =$this->input->post('dkodejenisbencana');
		$queryambildata = $this->Modellaporan->lap_daerahrawan($dkodejenisbencana);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $data = array(
                'kodedaerahrawan' => $baris['kodedaerahrawan'],
				'namakorong' => $baris['namakorong'],
				'namanagari' => $baris['namanagari'],
				'namakecamatan' => $baris['namakecamatan'],
				'jenisbencana' => $baris['jenisbencana'],
				'keterangan' => $baris['keterangan']
			);
		} else {
            exit('Data tidak DiTemukan');
        }
		$data['judul']='Laporan Daerah Rawan Bencana';
		$data['data']=$this->Modellaporan->lap_daerahrawan($dkodejenisbencana);
		$this->load->view('laporan/laporan_daerahrawan',$data);
    }
    function kasusbencana()
	{
		$a['judul']="Cetak Kasus Bencana Berdasarkan Korban";
		$a['menu']=$this->load->view('template/menu','',TRUE);
		$a['konten']=$this->load->view('laporan/kasusbencana','',TRUE);
		$this->parser->parse('template/template',$a);
	}

	function lap_kasusbencana()
	{
		$tgl1 =$this->input->post('tglawal');
		$tgl2 = $this->input->post('tglakhir');
		$tglawal= date("Y-m-d",strtotime($tgl1));
		$tglakhir= date("Y-m-d",strtotime($tgl2));
		$data['awal'] =$this->input->post('tglawal');
		$data['akhir'] =$this->input->post('tglakhir');
		$data['data']=$this->Modellaporan->lap_kasusbencana($tglawal,$tglakhir);
		$this->load->view('laporan/laporan_kasusbencana',$data);
	}
	function kasusbencanarusak()
	{
		$a['judul']="Cetak Kasus Bencana Berdasarkan Kerusakan";
		$a['menu']=$this->load->view('template/menu','',TRUE);
		$a['konten']=$this->load->view('laporan/kasusbencanarusak','',TRUE);
		$this->parser->parse('template/template',$a);
	}

	function lap_kasusbencanarusak()
	{
		
        $data['judul']='Laporan Kasus Bencana Berdasarkan Kerusakan';
		$tgl1 =$this->input->post('tglawal');
		$tgl2 = $this->input->post('tglakhir');
		$tglawal= date("Y-m-d",strtotime($tgl1));
		$tglakhir= date("Y-m-d",strtotime($tgl2));
		$data['awal'] =$this->input->post('tglawal');
		$data['akhir'] =$this->input->post('tglakhir');
		$data['data']=$this->Modellaporan->lap_kasusbencanarusak($tglawal,$tglakhir);
		$this->load->view('laporan/laporan_kasusbencanarusak',$data);
    }
    function kejadianharian()
	{
		$a['judul']="Cetak Laporan Kejadian Harian dan Penanggulangan";
		$a['menu']=$this->load->view('template/menu','',TRUE);
		$a['konten']=$this->load->view('laporan/kejadianharian','',TRUE);
		$this->parser->parse('template/template',$a);
	}

	function lap_kejadianharian()
	{
		
		$data['judul']='Laporan Kejadian Harian dan Penanggulangan';
		$tgl1 =$this->input->post('tglawal');
		$tgl2 = $this->input->post('tglakhir');
		$tglawal= date("Y-m-d",strtotime($tgl1));
		$tglakhir= date("Y-m-d",strtotime($tgl2));
		$data['awal'] =$this->input->post('tglawal');
		$data['akhir'] =$this->input->post('tglakhir');
		$data['data']=$this->Modellaporan->lap_kejadianharian($tglawal,$tglakhir);
		$this->load->view('laporan/laporan_kejadianharian',$data);
	}
}