<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Login.php");

class PU extends Login {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->Model('Manager');
		$this->load->Model('Kriteria');
		$this->load->Model('Nilai');
		$this->load->Model('Ankrit');
		$this->load->Model('Anab');
		$this->load->Model('Detkar');
		$this->load->Model('Abkar');
		$this->load->Model('Users');
		$this->load->Model('Absen');
		if (!$this->session->userdata('logged')) {
			redirect('login/index');
		}
		else if ($this->session->userdata('logged')['level'] != '-1') {
			redirect('assessors/index');
		}
	}

//pindah halaman
// navigation: peringkat karyawan
	public function index()
	{
			$this->load->view('karyawan/final-karyawan-PU');
	}
	public function rka($idJ,$idD)
	{
		$idJ =  $this->uri->segment(3);
		$idD =  $this->uri->segment(4);
		$data['finKa']=$this->Manager->get_by_jd($idJ,$idD);
		$this->load->view('karyawan/ranking/kary-spec',$data);
	}
	public function rkj($idJ)
	{
		$data['finKa']=$this->Manager->get_by_jonly($idJ);
		$this->load->view('karyawan/ranking/kary-spec',$data);
	}
	public function rkd($idD)
	{
		$data['finKa']=$this->Manager->get_by_donly($idD);
		$this->load->view('karyawan/ranking/kary-spec',$data);
	}
	public function allRK()
	{
		$data['finKa']=$this->Manager->get_try();
		$this->load->view('karyawan/ranking/kary-spec',$data);
	}
// -----------------------------------------------------------------------------

// navigation: nilai manajer
	public function karyawanku()
	{
		 $this->load->view('karyawan/data-rs-man');
	}
	public function karyawanNJ()
	{
		$data['karyawan']=$this->Manager->get_MAN();
		$this->load->view('karyawan/data/karyascman',$data);
	}
	public function rank_pu_edit($value)
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-pu/nilai-karyawan-edit',$data);
	}
	public function rank_pu_new($value)
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-pu/nilai-karyawan-edma',$data);
	}
// -----------------------------------------------------------------------------
	public function karyawanJ($idJ)
	{
		$data['karyawan']=$this->Manager->get_by_jonly($idJ);
		$this->load->view('karyawan/data/karyascman',$data);
	}


	//finalresuls:')

	public function dataK()
	{
		$data['karyawan']=$this->Manager->get_data();
		$this->load->view('karyawan/data/kary-man',$data);
	}
	public function dataKDJ($idJ,$idD)
	{
		$idJ =  $this->uri->segment(3);
		$idD =  $this->uri->segment(4);
		$data['karyawan']=$this->Manager->get_by_jd($idJ,$idD);
		$this->load->view('karyawan/data/kary-man',$data);
	}
	public function dataKJ($idJ)
	{
		$data['karyawan']=$this->Manager->get_by_jnoOR($idJ);
		$this->load->view('karyawan/data/kary-man',$data);
	}
	public function dataKD($idD)
	{
		$data['karyawan']=$this->Manager->get_by_dnoOR($idD);
		$this->load->view('karyawan/data/kary-man',$data);
	}




//fungsi
	public function updateKriteria()
	{
		$idKr = $this->input->post('id_kriteria');
		$nmKr = $this->input->post('nama_kriteria');
		$ks = $this->input->post('kurang_sekali');
		$k = $this->input->post('kurang');
		$c = $this->input->post('cukup');
		$b = $this->input->post('baik');
		$bs = $this->input->post('baik_sekali');
		$data = array(
			'nama_kriteria' => $nmKr,
			'ket_nil1' => $ks,
			'ket_nil2' => $k,
			'ket_nil3' => $c,
			'ket_nil4' => $b,
			'ket_nil5' => $bs,
		 );
		$update=$this->Kriteria->updateKrit(array('id_kriteria'=>$idKr),$data);
		redirect('HR/index');
	}
	//FOR KARYAWANKU
	public function updNiQaku()
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
		redirect('PU/karyawanku');
	}
	
}
