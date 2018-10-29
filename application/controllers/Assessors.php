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

//pindah halaman
	public function index()
	{
		 $this->load->view('karyawan/data-karyawan-rs');
	}

	public function viewRank()
	{
		$this->load->view('karyawan/final-karyawan-asc');
	}
	public function rank($value)
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/nilai-karyawan-rs',$data);
	}
	public function rankn($value)
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/nilai-rs-edit',$data);
	}

	// dataKaryawan
	public function dataKDJ($idJ)
	{
		$idD = $this->session->userdata('logged')['divisi'];
		$data['karyawan']=$this->Manager->get_by_jd($idJ,$idD);
		$this->load->view('karyawan/data/karyasc',$data);
	}
	public function dataKDMan()
	{
		$idD = $this->session->userdata('logged')['divisi'];
		$data['karyawan']=$this->Manager->get_noKBID($idD);
		$this->load->view('karyawan/data/karyasc',$data);
	}
	public function dataKDKbid()
	{
		$idD = $this->session->userdata('logged')['divisi'];
		$data['karyawan']=$this->Manager->get_KBID($idD);
		$this->load->view('karyawan/data/karyasc',$data);
	}
	public function rka($idJ)
	{
  	$idD =  $this->session->userdata('logged')['divisi'];
		$data['finKa']=$this->Manager->get_by_jd($idJ,$idD);
		$this->load->view('karyawan/ranking/kary',$data);
	}

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
