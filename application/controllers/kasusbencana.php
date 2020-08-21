<?php
defined('BASEPATH') OR exit ('no directnscript access allowed');
class Kasusbencana extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Modelkasusbencana');
        $this->load->model('Modelkorong');
        $this->load->model('Modelnagari');
        $this->load->model('Modelkecamatan');
        $this->load->model('Modelkorban');
        $this->load->model('Modeljenisbencana');
        $this->load->model('Modelregutrc');
    }
    public function index() 
    {
        $a['judul']='Data Kasus Bencana';
        $data['tampil']=$this->Modelkasusbencana->tampil();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('kasusbencana/viewdata',$data,TRUE);
        $this->parser->parse('template/template',$a);
    }

    public function tambah()
    {
        $a['judul']      = 'Input Kasus Bencana';
        $d['datakorong'] =$this->Modelkorong->datakorong();
        $d['datanagari'] =$this->Modelnagari->datanagari();
        $d['datakecamatan'] =$this->Modelkecamatan->datakecamatan();
        $d['datajenisbencana'] =$this->Modeljenisbencana->datajenisbencana();
        $d['dataregutrc'] =$this->Modelregutrc->dataregutrc();
        $d['datakorban']   =$this->Modelkasusbencana->datakorban();
        // $d['datatempkorban']   =$this->Modelkasusbencana->datatempkorban();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('kasusbencana/formtambah',$d,true);
        $this->parser->parse('template/template',$a);
    }

public function combo_tambah_nagari(){
        $id[0]="";
        $d[0]="";
        $kecamatan=$this->input->post('a');
        $datanagari   =$this->Modelkorong->datanagari_Kecam($kecamatan);
                $i=0;
    foreach($datanagari->result_array() as $k){

                $id[$i]=$k['kodenagari'];
                $i++;
    }
                $i=0;

        foreach($datanagari->result_array() as $k){
                $d[$i]=$k['namanagari'];
                $i++;
    }
        $json["kodenagari"]=$id;
        $json["namanagari"]=$d;
        echo json_encode($json);    
}
public function combo_tambah_korong(){
    $id[0]="";
    $d[0]="";
    $nagari=$this->input->post('a');
    $datakorong   =$this->Modelkorong->datakorong_nagari($nagari);
    $i=0;

            foreach($datakorong->result_array() as $k)
            {

                $id[$i]=$k['kodekorong'];
                $i++;
            }
    $i=0;

            foreach($datakorong->result_array() as $k){
                $d[$i]=$k['namakorong'];
                $i++;
            }

        $json["kodekorong"]=$id;
        $json["namakorong"]=$d;
        echo json_encode($json);  

}
    function simpantransaksi()
    {
        $kodekasus=$this->input->post('kodekasus');
        // $date=$this->input->post('tglkejadian');
        $tglkejadian=$this->input->post('tglkejadian');
        $waktukejadian=$this->input->post('waktukejadian');
        $kkodejenis=$this->input->post('kkodejenis');
        $lokasi=$this->input->post('lokasi');
        $kkodekecamatan=$this->input->post('kkodekecamatan');
        $kkodenagari=$this->input->post('kkodenagari');
        $kkodekorong=$this->input->post('kkodekorong');
        $taksirankerugian=$this->input->post('taksirankerugian');
        $keterangan=$this->input->post('keterangan');
        $regutimpenanggulangan=$this->input->post('regutimpenanggulangan');
        $jumlahdanapenanggulangan=$this->input->post('jumlahdanapenanggulangan');
        $tindaklanjut=$this->input->post('tindaklanjut');
        $this->Modelkasusbencana->simpan($kodekasus,$tglkejadian,$waktukejadian,$kkodejenis,$lokasi,$kkodekecamatan,$kkodenagari,$kkodekorong,$taksirankerugian,$keterangan,$regutimpenanggulangan,$jumlahdanapenanggulangan,$tindaklanjut);
        // echo "$kkodekecamatan,$kkodenagari,$kkodekorong";
        redirect('kasusbencana/tambah');

    }

    function simpantempkorban()  {   
        $idtempkorban  = $this->input->post('kodekorban',true);   
        $namakorban  = $this->input->post('namakorban',true);   
        $alamatkorban  = $this->input->post('alamat',true);   
        $jeniskelaminkorban  = $this->input->post('jeniskelamin',true);   
        $keterangankorban  = $this->input->post('keterangan',true);   
        // simpantempkorban
        $this->Modelkasusbencana->smptempkorban($idtempkorban,$namakorban,$alamatkorban,$jeniskelaminkorban,$keterangankorban);
        // tampiltempkorban
        $d['datatempkorban']=$this->Modelkasusbencana->datatempkorban();
        $this->load->view('kasusbencana/tampil_korban',$d);
    }

    function hapusitemkorban($kode)
    {   
        $this->Modelkasusbencana->hapustmpkorban($kode);   

    }
    function tampilaplikasi(){
                 $d['datatempkorban']=$this->Modelkasusbencana->datatempkorban();
                    $this->load->view('kasusbencana/tampil_korban',$d);
    }

    function simpantempkerusakan()  {   
        $idtempkerusakan  = $this->input->post('idtempkerusakan',true);   
        $jeniskerusakan  = $this->input->post('jeniskerusakan',true);   
        $jumlah  = $this->input->post('jumlah',true);   
        $keteranganrusak  = $this->input->post('keteranganrusak',true); 

        $this->Modelkasusbencana->smptempkerusakan($idtempkerusakan,$jeniskerusakan,$jumlah,$keteranganrusak);
    }
    function tampil_kerusakana(){
        $d['datatempkerusakan']   =$this->Modelkasusbencana->datatempkerusakan();
                    $this->load->view('kasusbencana/tampil_kerusakan',$d);

    }

    function hapusitemkerusakan($kode)
    {   
        $this->Modelkasusbencana->hapustmpkerusakan($kode);   
        // redirect('kasusbencana/tambah');  
    }

    function detailkorban()
    {
        $kode=$this->uri->segment(3);
        $x['ambildatakorban']=$this->Modelkasusbencana->ambildatakorban($kode);
        $a['judul']= 'Detail Korban Bencana';
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('kasusbencana/detailkorban',$x,true);
        $this->parser->parse('template/template',$a);
    }
    function detailkerusakan()
    {
        $kode=$this->uri->segment(3);
        $x['ambildatakerusakan']=$this->Modelkasusbencana->ambildatakerusakan($kode);
        $a['judul']= 'Detail Kerusakan';
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('kasusbencana/detailkerusakan',$x,true);
        $this->parser->parse('template/template',$a);
    }
}