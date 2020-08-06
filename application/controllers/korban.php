<?php
class Korban extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Modelkorban', 'korban');
    }
	
   public function index() {
    $tcari=$this->input->post('tombolcari',TRUE);
        if(isset($tcari)){
            $cari = $this->input->post('cari',TRUE);
            $this->session->set_userdata('carikorban',$cari);
            redirect('korban/index');
        }
        else{
        $cari = $this->session->userdata('carikorban');
        }
        $querykorban = $this->korban->datakorban($cari);
        $data = array(
            'tampildata' => $querykorban,
            'cari'=>$cari
        );
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Data korban',
            'konten' => $this->load->view('korban/viewdata', $data, TRUE),
        );
        $this->parser->parse('template/template', $template);
    }
    public function tambah() {
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Tambah korban',
            'konten' => $this->load->view('korban/formtambah', '', TRUE),
        );
        $this->parser->parse('template/template', $template);
    }
    public function simpan() {
        $querysimpandata = $this->korban->simpandata();
        if ($querysimpandata == FALSE) {
            $this->tambah();
        } else {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Simpan'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('korban/tambah');
        }
    }

    public function edit() {
        $kodekorban = $this->uri->segment(3);
        $queryambildata = $this->korban->ambildata($kodekorban);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $data = array(
                'kodekorban' => $baris['kodekorban'],
                'namakorban' => $baris['namakorban'],
                'umur' => $baris['umur'],
                'alamat' => $baris['alamat'],
                'jeniskelamin' => $baris['jeniskelamin'],
                'keterangan' => $baris['keterangan']
            );
        } else {
            exit('Data tidak DiTemukan');
        }
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Edit korban',
            'konten' => $this->load->view('korban/formedit', $data, TRUE),
        );
        $this->parser->parse('template/template', $template);
    }

    public function update() {
        $kodekorban = $this->input->post('kodekorban', TRUE);
        $queryupdatedata = $this->korban->updatedata();
        $pesan = '<div class="alert alert-success alert-dismissible">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . 'Data Berhasil di Update'
                . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('korban/edit/' . $kodekorban);
    }

    public function hapus() {
        $kodekorban = $this->uri->segment(3);
        $queryhapus = $this->korban->hapusdata($kodekorban);
        if ($queryhapus) {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Hapus'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('korban/index');
        }
    }

}