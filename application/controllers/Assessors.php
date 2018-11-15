<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Login.php");

class Assessors extends Login {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->Model('Manager');
		$this->load->Model('Detkar');
		if (!$this->session->userdata('logged')) {
			redirect('login/index');
		}
		else if (($this->session->userdata('logged')['level'] == '1')&&($this->session->userdata('logged')['divisi'] == 'HR-GA')) {
			redirect('HR/index');
		}
		else if ($this->session->userdata('logged')['level'] == '0') {
			redirect('welcome/index');
		}
		else if ($this->session->userdata('logged')['level'] == '-1') {
			redirect('PU/index');
		}
	}

// navigation: karyawan-saya
	public function index() //view page
	{
		 $this->load->view('karyawan/data-karyawan-rs');
	}
	public function dataKDKbid() //view jquery untuk manajer
	{
		$idD = $this->session->userdata('logged')['divisi'];
		$data['karyawan']=$this->Manager->get_KBID($idD);
		$this->load->view('karyawan/data/prop-asc/karyasc',$data);
	}
	public function rank_man_new($value) //view modal nilai baru
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-asc/nilai-karyawan-rs',$data);
	}
	public function rank_man_edit($value) //view modal ubah
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-asc/nilai-rs-edit',$data);
	}
	//UNTUK KABID
	public function dataKDMan() //view jquery untuk kabid
	{
		$idD = $this->session->userdata('logged')['divisi'];
		$data['karyawan']=$this->Manager->get_noKBID($idD);
		$this->load->view('karyawan/data/prop-kbid/karyasc',$data);
	}
	public function rank_kb_new($value) //view modal nilai baru kabid
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-kbid/nilai-karyawan-rs',$data);
	}
	public function rank_kb_edit($value) //view modal ubah kabid
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-kbid/nilai-rs-edit',$data);
	}
	public function dataKDJ($idJ) //view jquery untuk kabid per jabatan
	{
		$idD = $this->session->userdata('logged')['divisi'];
		$data['karyawan']=$this->Manager->get_by_jd($idJ,$idD);
		$this->load->view('karyawan/data/prop-kbid/karykdj',$data);
	}
	public function rank_kdj_new($value) //view modal nilai baru kabid
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-kbid/nilai-kdj-new',$data);
	}
	public function rank_kdj_edit($value) //view modal ubah kabid
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-kbid/nilai-kdj-edit',$data);
	}
// -----------------------------------------------------------------------------

//fungsi
	public function updNiQa()
	{
		$idQ = $this->input->post('idqar');
		$this->Detkar->deltabID($idQ);
		$cRQ = $_POST['C'];
		$nLQ = $_POST['KR'];
		$niQ = $this->input->post('total');
		$data = array(
			'nilai'=>$niQ,
		);
		$update=$this->Manager->updateMan(array('id_karyawan'=>$idQ),$data);
		foreach ($cRQ as $Kr => $v) {
			$datb = array(
				'id_kriteria' => $v,
				'id_karyawan' => $idQ,
				'nilai_kriteria' => $nLQ[$Kr]
			);
			$this->Detkar->insertArray($datb);
		}
		redirect('welcome/page3');
	}
	public function updNiQaKu()
	{
		$idQ = $this->input->post('idqar');
		$this->Detkar->deltabID($idQ);
		$cRQ = $_POST['C'];
		$nLQ = $_POST['KR'];
		$niQ = $this->input->post('total');
		$data = array(
			'nilai'=>$niQ,
		);
		$update=$this->Manager->updateMan(array('id_karyawan'=>$idQ),$data);
		foreach ($cRQ as $Kr => $v) {
			$datb = array(
				'id_kriteria' => $v,
				'id_karyawan' => $idQ,
				'nilai_kriteria' => $nLQ[$Kr]
			);
			$this->Detkar->insertArray($datb);
		}
		redirect('assessors/index');
	}
}
