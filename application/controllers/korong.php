<?php
class Korong extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Modelkorong','korong');
        $this->load->model('Modelnagari');
        $this->load->model('Modelkecamatan');
    }
    public function index() 
    {
        $a['judul']='Data korong';
        $data['tampil']=$this->korong->datakorong();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('korong/viewdata',$data,TRUE);
        $this->parser->parse('template/template',$a);
    }
    public function tambah ()
    {
        $a['judul']      = 'Input Data Korong';
        $d['datakorong']   =$this->korong->datakorong();
        $d['datakecamatan']   =$this->korong->datakecamatan();
        $d['datanagari']   =$this->korong->datanagari();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('korong/formtambah',$d,true);
        $this->parser->parse('template/template',$a);
    }
public function combo_tambah_nagari(){
    $kecamatan=$this->input->post('a');
    $d['datanagari']   =$this->korong->datanagari_Kecam($kecamatan);
    $this->load->view('korong/tampil_combo.php', $d);
}
public function combo_nagari(){
    $d['datanagari']   =$this->korong->datanagari();
    $this->load->view('korong/tampil_combo.php', $d);
}

    function simpantransaksi()
    {
        $kodekorong=$this->input->post('kodekorong');
        $namakorong=$this->input->post('namakorong');
        $kd_kecamatan=$this->input->post('kd_kecamatan');
        $kode_nagari = $this->input->post('kode_nagari');

        $this->korong->simpan($kodekorong,$namakorong,$kd_kecamatan,$kode_nagari);
        $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Simpan'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
        redirect('korong');

    }

    public function edit() {
        $a['judul']      = 'Input Data Korong';
        $kodekorong = $this->uri->segment(3);
        $queryambildata=$this->korong->ambildata($kodekorong);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $d = array(
                'kodekorong' => $baris['kodekorong'],
                'namakorong' => $baris['namakorong']
            );
        } else {
            exit('Data tidak DiTemukan');
        }
        $d['datanagari']   =$this->korong->datanagari();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('korong/formedit',$d,true);
        $this->parser->parse('template/template',$a);
    }

    public function update() {
        $kodekorong = $this->input->post('kodekorong', TRUE);
        $queryupdatedata = $this->korong->updatedata();
        $pesan = '<div class="alert alert-success alert-dismissible">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . 'Data Berhasil di Update'
                . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('korong/edit/' .$kodekorong);
    }

    public function hapus() {
        $kodekorong = $this->uri->segment(3);
        $queryhapus = $this->korong->hapusdata($kodekorong);
        if ($queryhapus) {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Hapus'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('korong/index');
        }
    }

}