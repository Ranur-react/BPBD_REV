<?php
class Jenisbencana extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Modeljenisbencana', 'bencana');
    }
	
   public function index() {
    $tcari=$this->input->post('tombolcari',TRUE);
        if(isset($tcari)){
            $cari = $this->input->post('cari',TRUE);
            $this->session->set_userdata('carijenisbencana',$cari);
            redirect('jenisbencana/index');
        }
        else{
        $cari = $this->session->userdata('carijenisbencana');
        }
        $queryjenisbencana = $this->bencana->datajenisbencana($cari);
        $data = array(
            'tampildata' => $queryjenisbencana,
            'cari'=>$cari
        );
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Data Jenis Bencana',
            'konten' => $this->load->view('jenisbencana/viewdata', $data, TRUE),
        );
        $this->parser->parse('template/template', $template);
    }
    public function tambah() {
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Tambah Jenis Bencana',
            'konten' => $this->load->view('jenisbencana/formtambah', '', TRUE),
        );
        $this->parser->parse('template/template', $template);
    }
    public function simpan() {
        $querysimpandata = $this->bencana->simpandata();
        if ($querysimpandata == FALSE) {
            $this->tambah();
        } else {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Simpan'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('jenisbencana/tambah');
        }
    }

    public function edit() {
        $kodejenis = $this->uri->segment(3);
        $queryambildata = $this->bencana->ambildata($kodejenis);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $data = array(
                'kodejenis' => $baris['kodejenis'],
                'jenisbencana' => $baris['jenisbencana']
            );
        } else {
            exit('Data tidak DiTemukan');
        }
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Edit Jenis Bencana',
            'konten' => $this->load->view('jenisbencana/formedit', $data, TRUE),
        );
        $this->parser->parse('template/template', $template);
    }

    public function update() {
        $kodejenis = $this->input->post('kodejenis', TRUE);
        $queryupdatedata = $this->bencana->updatedata();
        $pesan = '<div class="alert alert-success alert-dismissible">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . 'Data Berhasil di Update'
                . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('jenisbencana/edit/' . $kodejenis);
    }

    public function hapus() {
        $kodejenis = $this->uri->segment(3);
        $queryhapus = $this->bencana->hapusdata($kodejenis);
        if ($queryhapus) {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Hapus'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('jenisbencana/index');
        }
    }

}