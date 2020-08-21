<?php
class daerahrawan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Modeldaerahrawan','rawan');
        $this->load->model('Modelkecamatan');
        $this->load->model('Modelnagari');
        $this->load->model('Modelkorong');
        $this->load->model('Modeljenisbencana');
    }
    public function index() 
    {
        $a['judul']='Data Daerah Rawan';
        $data['tampil']=$this->rawan->datadaerahrawan();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('daerahrawan/viewdata',$data,TRUE);
        $this->parser->parse('template/template',$a);
    }
public function combo_tambah_nagari(){
    $kecamatan=$this->input->post('a');
    $d['datanagari']   =$this->Modelkorong->datanagari_Kecam($kecamatan);
    $this->load->view('daerahrawan/tampil_combo_nagari.php', $d);
}
public function combo_tambah_korong(){
    $nagari=$this->input->post('a');
    $d['datakorong']   =$this->Modelkorong->datakorong_nagari($nagari);
    $this->load->view('daerahrawan/tampil_combo_korong.php', $d);
}
    public function tambah ()
    {
        $a['judul']      = 'Input Data Daerah Rawan';
        // $d['datakorong']   =$this->Modelkorong->datakorong();
        // $d['datanagari']   =$this->Modelnagari->datanagari();
        $d['datakecamatan']   =$this->Modelkecamatan->datakecamatan();
        $d['datajenisbencana']   =$this->rawan->datajenisbencana();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('daerahrawan/formtambah',$d,true);
        $this->parser->parse('template/template',$a);
    }
    

    function simpantransaksi()
    {
        $kodedaerahrawan=$this->input->post('kodedaerahrawan');
        $dkodekorong=$this->input->post('dkodekorong');
        $dkodenagari=$this->input->post('kode_nagari');
        $dkodekecamatan=$this->input->post('dkodekecamatan');
        $dkodejenisbencana=$this->input->post('dkodejenisbencana');
        $keterangan=$this->input->post('keterangan');

        $this->rawan->simpan($kodedaerahrawan,$dkodekorong,$dkodenagari,$dkodekecamatan,$dkodejenisbencana,$keterangan);
        $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Simpan'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
        redirect('daerahrawan');

    }

    public function edit() {
        $a['judul']      = 'Edit Data Daerah Rawan Bencana';
        $kodedaerahrawan = $this->uri->segment(3);
        $queryambildata=$this->rawan->ambildata($kodedaerahrawan);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $d = array(
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
        $d['datakorong']   =$this->rawan->datakorong();
        $d['datajenisbencana']   =$this->rawan->datajenisbencana();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('daerahrawan/formedit',$d,true);
        $this->parser->parse('template/template',$a);
    }

    public function update() {
        $kodedaerahrawan = $this->input->post('kodedaerahrawan', TRUE);
        $queryupdatedata = $this->rawan->updatedata();
        $pesan = '<div class="alert alert-success alert-dismissible">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . 'Data Berhasil di Update'
                . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('daerahrawan/edit/' .$kodedaerahrawan);
    }

    public function hapus() {
        $kodedaerahrawan = $this->uri->segment(3);
        $queryhapus = $this->rawan->hapusdata($kodedaerahrawan);
        if ($queryhapus) {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Hapus'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('daerahrawan/index');
        }
    }

    public function combo_nagari_perkecamatan(){
        $kecamatan=$this->input->post('a');
        $d['datanagari']   =$this->Modelnagari->datanagari_Kecam($kecamatan);
        $this->load->view('korong/tampil_combo_nagari.php', $d);
    }
    public function combo_nagari(){
        $d['datanagari']   =$this->Modelnagari->datanagari();
        $this->load->view('korong/tampil_combo_nagari.php', $d);
    }

}