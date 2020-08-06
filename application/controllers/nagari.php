<?php
class Nagari extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Modelnagari','nagari');
        $this->load->model('Modelkecamatan');
    }
    public function index() 
    {
        $a['judul']='Data Nagari';
        $data['tampil']=$this->nagari->datanagari();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('nagari/viewdata',$data,TRUE);
        $this->parser->parse('template/template',$a);
    }
    public function tambah ()
    {
        $a['judul']      = 'Input Data Nagari';
        $d['datakecamatan']   =$this->nagari->datakecamatan();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('nagari/formtambah',$d,true);
        $this->parser->parse('template/template',$a);
    }

    function simpantransaksi()
    {
        $kodenagari=$this->input->post('kodenagari');
        $namanagari=$this->input->post('namanagari');
        $kode_kecamatan=$this->input->post('kode_kecamatan');

        $this->nagari->simpan($kodenagari,$namanagari,$kode_kecamatan);
        $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Simpan'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
        redirect('nagari');

    }

    public function edit() {
        $a['judul']      = 'Input Data Nagari';
        $kodenagari = $this->uri->segment(3);
        $queryambildata=$this->nagari->ambildata($kodenagari);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $d = array(
                'kodenagari' => $baris['kodenagari'],
                'namanagari' => $baris['namanagari']
            );
        } else {
            exit('Data tidak DiTemukan');
        }
        $d['datakecamatan']   =$this->nagari->datanagari();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('nagari/formedit',$d,true);
        $this->parser->parse('template/template',$a);
    }

    public function update() {
        $kodenagari = $this->input->post('kodenagari', TRUE);
        $queryupdatedata = $this->nagari->updatedata();
        $pesan = '<div class="alert alert-success alert-dismissible">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . 'Data Berhasil di Update'
                . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('nagari/edit/' .$kodenagari);
    }

    public function hapus() {
        $kodenagari = $this->uri->segment(3);
        $queryhapus = $this->nagari->hapusdata($kodenagari);
        if ($queryhapus) {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Hapus'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('nagari/index');
        }
    }

}