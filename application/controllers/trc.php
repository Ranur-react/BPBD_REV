<?php
class trc extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('Modeltrc','trc');
        $this->load->model('Modelregutrc');
    }
    public function kodetrc()
    {
        $this->db->select('RIGHT(kodetrc,1) as kodetrc', FALSE); 
        $this->db->order_by('kodetrc','DESC'); 
        $this->db->limit(1); 
        $query = $this->db->get('timtrc');  
        if($query->num_rows() <> 0){ 
            $dt = $query->row(); 
            $kodetrc = intval($dt->kodetrc) + 1; 
        }else{ 
            $kodetrc = 1; 
        } 
        $kodetrcmax  = str_pad($kodetrc, 1, "0", STR_PAD_LEFT); 
        $kodetrcjadi = "TRC-0".$kodetrcmax;  
        return $kodetrcjadi;
    }
    public function index() 
    {
        $a['judul']='Data TRC';
        $data['tampil']=$this->trc->datatrc();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('trc/viewdata',$data,TRUE);
        $this->parser->parse('template/template',$a);
    }
    public function tambah ()
    {
        $a['judul']      = 'Input Data TRC';
        $d['dataregutrc']   =$this->trc->dataregutrc();
        $d['kodetrc'] = $this->kodetrc();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('trc/formtambah',$d,true);
        $this->parser->parse('template/template',$a);
    }

    function simpantransaksi()
    {
        $kodetrc=$this->input->post('kodetrc');
        $namatrc=$this->input->post('namatrc');
        $tanggallahir=$this->input->post('tanggallahir');
        $alamat=$this->input->post('alamat');
        $notelp=$this->input->post('notelp');
        $jeniskelamin=$this->input->post('jeniskelamin');
        $pendidikanakhir=$this->input->post('pendidikanakhir');
        $bagian=$this->input->post('bagian');
        $koderegu=$this->input->post('koderegu');

        $this->trc->simpan($kodetrc,$namatrc,$tanggallahir,$alamat,$notelp,$jeniskelamin,$pendidikanakhir,$bagian,$koderegu);
        $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Simpan'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
        redirect('trc');

    }

    public function edit() {
        $a['judul']      = 'Input Data TRC';
        $kodetrc = $this->uri->segment(3);
        $queryambildata=$this->trc->ambildata($kodetrc);
        if ($queryambildata->num_rows() > 0) {
            $baris = $queryambildata->row_array();
            $d = array(
                'kodetrc' => $baris['kodetrc'],
                'namatrc' => $baris['namatrc'],
                'tanggallahir' => $baris['tanggallahir'],
                'alamat' => $baris['alamat'],
                'notelp' => $baris['notelp'],
                'jeniskelamin' => $baris['jeniskelamin'],
                'pendidikanakhir' => $baris['pendidikanakhir'],
                'bagian' => $baris['bagian'],
                'koderegu' => $baris['koderegu'],
                'regu' => $baris['regu']
            );
        } else {
            exit('Data tidak DiTemukan');
        }
        $d['dataregutrc']   =$this->trc->dataregutrc();
        $a['menu']=$this->load->view('template/menu','',TRUE);
        $a['konten']=$this->load->view('trc/formedit',$d,true);
        $this->parser->parse('template/template',$a);
    }

    public function update() {
        $kodetrc = $this->input->post('kodetrc', TRUE);
        $queryupdatedata = $this->trc->updatedata();
        $pesan = '<div class="alert alert-success alert-dismissible">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . 'Data Berhasil di Update'
                . '</div>';
        $this->session->set_flashdata('pesan', $pesan);
        redirect('trc/edit/' .$kodetrc);
    }

    public function hapus() {
        $kodetrc = $this->uri->segment(3);
        $queryhapus = $this->trc->hapusdata($kodetrc);
        if ($queryhapus) {
            $pesan = '<div class="alert alert-success alert-dismissible">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . 'Data Berhasil di Hapus'
                    . '</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('trc/index');
        }
    }

}