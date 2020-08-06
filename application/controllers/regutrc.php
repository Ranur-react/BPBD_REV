<?php
class Regutrc extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Modelregutrc', 'regutrc');
    }
	
   public function index() {
    $tcari=$this->input->post('tombolcari',TRUE);
        if(isset($tcari)){
            $cari = $this->input->post('cari',TRUE);
            $this->session->set_userdata('cariregutrc',$cari);
            redirect('regutrc/index');
        }
        else{
        $cari = $this->session->userdata('cariregutrc');
        }
        $queryregutrc = $this->regutrc->dataregutrc($cari);
        $data = array(
            'tampildata' => $queryregutrc,
            'cari'=>$cari
        );
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Data Regu TRC',
            'konten' => $this->load->view('regutrc/viewdata', $data, TRUE),
        );
        $this->parser->parse('template/template', $template);
    }
    public function tambah() {
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Tambah Data TRC',
            'konten' => $this->load->view('regutrc/formtambah', '', TRUE),
        );
        $this->parser->parse('template/template', $template);
    }
    public function simpan() {
        $querysimpandata = $this->regutrc->simpandata();
        if ($querysimpandata == FALSE) {
            $this->tambah();
        } else {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Simpan'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('regutrc/tambah');
        }
    }

    public function edit() {
        $idregu = $this->uri->segment(3);
        $queryambildata = $this->regutrc->ambildata($idregu);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $data = array(
                'idregu' => $baris['idregu'],
                'regu' => $baris['regu']
            );
        } else {
            exit('Data tidak DiTemukan');
        }
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Edit Regu Tim TRC',
            'konten' => $this->load->view('regutrc/formedit', $data, TRUE),
        );
        $this->parser->parse('template/template', $template);
    }

    public function update() {
        $idregu = $this->input->post('idregu', TRUE);
        $queryupdatedata = $this->regutrc->updatedata();
        $pesan = '<div class="alert alert-success alert-dismissible">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . 'Data Berhasil di Update'
                . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('regutrc/edit/' . $idregu);
    }

    public function hapus() {
        $idregu = $this->uri->segment(3);
        $queryhapus = $this->regutrc->hapusdata($idregu);
        if ($queryhapus) {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Hapus'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('regutrc/index');
        }
    }

}