<?php
class Kecamatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Modelkecamatan', 'kecamatan');
    }
	
   public function index() {
    $tcari=$this->input->post('tombolcari',TRUE);
        if(isset($tcari)){
            $cari = $this->input->post('cari',TRUE);
            $this->session->set_userdata('carikecamatan',$cari);
            redirect('kecamatan/index');
        }
        else{
        $cari = $this->session->userdata('carikecamatan');
        }
        $querykecamatan = $this->kecamatan->datakecamatan($cari);
        $data = array(
            'tampildata' => $querykecamatan,
            'cari'=>$cari
        );
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Data Kecamatan',
            'konten' => $this->load->view('kecamatan/viewdata', $data, TRUE),
        );
        $this->parser->parse('template/template', $template);
    }
    public function tambah() {
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Tambah Kecamatan',
            'konten' => $this->load->view('kecamatan/formtambah', '', TRUE),
        );
        $this->parser->parse('template/template', $template);
    }
    public function simpan() {
        $querysimpandata = $this->kecamatan->simpandata();
        if ($querysimpandata == FALSE) {
            $this->tambah();
        } else {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Simpan'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('kecamatan/tambah');
        }
    }

    public function edit() {
        $kodekecamatan = $this->uri->segment(3);
        $queryambildata = $this->kecamatan->ambildata($kodekecamatan);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $data = array(
                'kodekecamatan' => $baris['kodekecamatan'],
                'namakecamatan' => $baris['namakecamatan']
            );
        } else {
            exit('Data tidak DiTemukan');
        }
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Edit Kecamatan',
            'konten' => $this->load->view('kecamatan/formedit', $data, TRUE),
        );
        $this->parser->parse('template/template', $template);
    }

    public function update() {
        $kodekecamatan = $this->input->post('kodekecamatan', TRUE);
        $queryupdatedata = $this->kecamatan->updatedata();
        $pesan = '<div class="alert alert-success alert-dismissible">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . 'Data Berhasil di Update'
                . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('kecamatan/edit/' . $kodekecamatan);
    }

    public function hapus() {
        $kodekecamatan = $this->uri->segment(3);
        $queryhapus = $this->kecamatan->hapusdata($kodekecamatan);
        if ($queryhapus) {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Hapus'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('kecamatan/index');
        }
    }

}