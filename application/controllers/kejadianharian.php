<?php
defined('BASEPATH') OR exit ('no directnscript access allowed');
class Kejadianharian extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Modelkejadianharian');
        $this->load->model('Modelkasusbencana');
    }
    
        public function index() 
        {
        $a['judul']='Data Kejadian harian Dan Penanggulangan';
        $data['tampil']=$this->Modelkejadianharian->tampil();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('kejadianharian/viewdata',$data,TRUE);
        $this->parser->parse('template/template',$a);
        }

    public function tambah()
    {
        $a['judul']      = 'Input Kejadian Harian Dan Penanggulangan';
        $d['datakasusbencana']   =$this->Modelkejadianharian->datakasusbencana();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('kejadianharian/formtambah',$d,true);
        $this->parser->parse('template/template',$a);
    }

    function simpantransaksi()
    {
        $kodekejadian=$this->input->post('kodekejadian');
        $date=$this->input->post('tglkejadian');
        $tanggal=date("Y-m-d",strtotime($date));
        $cuaca=$this->input->post('cuaca');
        $suhu=$this->input->post('suhu');
        $kelembaban=$this->input->post('kelembaban');
        $kencangangin=$this->input->post('kencangangin');
        $arahangin=$this->input->post('arahangin');
        $kodekasus=$this->input->post('kodekasus');
        $peringatandini=$this->input->post('peringatandini');
        $this->Modelkejadianharian->simpan($kodekejadian,$tanggal,$cuaca,$suhu,$kelembaban,$kencangangin,$arahangin,$kodekasus,$peringatandini);
        
        redirect('kejadianharian/tambah');

    }
}