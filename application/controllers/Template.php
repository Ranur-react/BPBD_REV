<?php
class template extends CI_Controller{
	public function __construct(){
		parent:: __construct();
}
public function index(){
	$template = array(
		'menu' => $this->load->view('template/menu','',true),
		'judul' => 'Sistem Informasi Badan Penanggulangan Bencana Daerah Kabupaten Padang Pariaman',
		'konten' => $this->load->view('template/beranda','',true),
		);
		$this->parser->parse('template/template',$template);
	}
}
?>