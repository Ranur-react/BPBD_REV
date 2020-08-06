<?php
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Modeluser','user');
    }

public function index() {
    $tcari=$this->input->post('tombolcari',TRUE);
    if(isset($tcari)){
        $cari = $this->input->post('cari',TRUE);
        $this->session->set_userdata('cariuser',$cari);
        redirect('user/index');
    }
    else{
    $cari = $this->session->userdata('cariuser');
    }
    $queryuser = $this->user->datauser($cari);
        $data = array(
        'tampildata' => $queryuser,
        'cari'=>$cari
    );
    $template = array(
        'menu' => $this->load->view('template/menu', '', TRUE),
        'judul' => 'Data User',
        'konten' => $this->load->view('user/viewdata', $data, TRUE),
        );
    $this->parser->parse('template/template', $template);
}


    public function tambah() {
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Tambah User',
            'konten' => $this->load->view('user/formtambah', '', TRUE),
        );
        $this->parser->parse('template/template', $template);
    }

    public function simpan() {
        $querysimpandata = $this->user->simpandata();
        if ($querysimpandata == FALSE) {
            $this->tambah();
        } else {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Simpan'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('user/tambah');
        }
    }

    public function edit() {
        $userid = $this->uri->segment(3);
        $queryambildata = $this->user->ambildata($userid);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $data = array(
                'userid' => $baris['userid'],
                'username' => $baris['username'],
				'userpassword' => $baris['userpassword'],
                'userhakakses' => $baris['userhakakses']
            );
        } else {
            exit('Data tidak DiTemukan');
        }
        $template = array(
            'menu' => $this->load->view('template/menu', '', TRUE),
            'judul' => 'Edit User',
            'konten' => $this->load->view('user/formedit', $data, TRUE),
        );
        $this->parser->parse('template/template', $template);
    }

    public function update() {
        $userid = $this->input->post('userid', TRUE);
        $queryupdatedata = $this->user->updatedata();
        $pesan = '<div class="alert alert-success alert-dismissible">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . 'Data Berhasil di Update'
                . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('user/edit/' . $userid);
    }

    public function hapus() {
        $userid = $this->uri->segment(3);
        $queryhapus = $this->user->hapusdata($userid);
        if ($queryhapus) {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Hapus'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('user/index');
        }
    }
	
    public function uploadfoto() {
        $userid = $this->uri->segment(3);
        $queryambildata = $this->user->ambildata($userid);
        if ($queryambildata ->num_rows() > 0) {
        $baris = $queryambildata->row_array();
        $data = array(
        'userid' => $userid,
        'foto' => $baris['foto']
        );
        $template = array(
        'menu' => $this->load->view('template/menu', '', TRUE),
        'judul' => 'Form Upload Foto User',
        'konten' => $this->load->view('user/formupload', $data, TRUE),
        );
        $this->parser->parse('template/template', $template);
        } else {
        exit('Maaf Data tidak ditemukan');
        }
    }

    public function doupload() {
            $userid = $this->input->post('userid', TRUE);
            //Cek apakah user ini sudah ada foto atau belum
            $ambildata= $this->user->ambildata($userid);
            $baris = $ambildata->row_array();
            if ($baris['foto'] != NULL || $baris['foto'] != '') {
            @unlink($baris['foto']);
            }
            mkdir('template/uploadfoto'); //perintah untuk membuat folder        
            $this->load->library('upload');
            $config['upload_path'] = './template/uploadfoto/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name'] = $userid;
            $config['max_size'] = 2048;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('uploadfoto')) {
                $pesan = '<div class="alert alert-danger">' . $this->upload->display_errors() . 
                '</div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('user/uploadfoto/' . $userid);
            } else {
                $media = $this->upload->data();
                $pathgambar = './template/uploadfoto/' . $media['file_name'];
                $updatefoto = $this->user->updatefoto($pathgambar, $userid);
                $pesan = '<div class="alert alert-success">Foto Berhasil di Upload</div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('user/uploadfoto/' . $userid);
            }
        }
}

