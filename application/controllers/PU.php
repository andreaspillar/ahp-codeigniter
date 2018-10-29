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
	public function index()
	{
			$this->load->view('karyawan/final-karyawan-PU');
	}
	public function karyawanku()
	{//ganti view
		 $this->load->view('karyawan/data-rs-man');
	}
	public function karyawanJ($idJ)
	{
		$data['karyawan']=$this->Manager->get_by_jonly($idJ);
		$this->load->view('karyawan/data/karyascman',$data);
	}
	public function karyawanNJ()
	{
		$data['karyawan']=$this->Manager->get_MAN();
		$this->load->view('karyawan/data/karyascman',$data);
	}


	//finalresuls:')
	public function rank($value)
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/nilai-karyawan-edit',$data);
	}
	public function rankn($value)
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/nilai-karyawan-edma',$data);
	}
	public function rka($idJ,$idD)
	{
		$idJ =  $this->uri->segment(3);
  	$idD =  $this->uri->segment(4);
		$data['NalKa']=$this->Manager->get_by_jd($idJ,$idD);
		$this->load->view('karyawan/ranking/kary-spec',$data);
	}
	public function rkj($idJ)
	{
		$data['NalKa']=$this->Manager->get_by_jonly($idJ);
		$this->load->view('karyawan/ranking/kary',$data);
		// $this->load->view('karyawan/ranking/kary');
	}
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
		redirect('PU/karyawanku');
	}
	//FOR KARYAWANKU

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
		redirect('PU/karyawanku');
	}
	public function updateNiKr()
	{
		$idkr = $_POST['id_kriteria'];
		$nakr = $_POST['hasil'];
		foreach ($idkr as $ide => $al) {
			$datc = array(
				'jumlah_kriteria' => $nakr[$ide],
			);
			$this->Kriteria->updateKrit(array('id_kriteria'=>$al),$datc);
		}
		$datb['tabel'] = $this->Ankrit->get_data();
		$this->load->view('nilai-kriteria/calculate-table',$datb);
	}

	public function showTabel()
	{
		$cleT = $this->Ankrit->clearTB();
		$crit = $_POST['C'];
		$opt = $_POST['W'];
		$crib = $_POST['X'];
		foreach ($crit as $key => $vl) {
			$data = array(
				'kriteria_x'=>$vl,
				'nilai_krit'=>$opt[$key],
				'kriteria_y'=>$crib[$key]
			);
			$insert = $this->Ankrit->insertArray($data);
		}
		$datb['tabel'] = $this->Ankrit->get_data();
		$this->load->view('nilai-kriteria/calculate-table',$datb);
	}

	public function insertKriteria()
	{
		$crit = $this->input->post('id_kriteria');
		$nama = $this->input->post('nama_kriteria');
		$harga = 0;
		$data = array(
			'id_kriteria' => $crit,
			'nama_kriteria' => $nama,
			'jumlah_kriteria' => $harga,
		 	);
		$insert=$this->Kriteria->insertKriteria($data);
		redirect('HR/index');
	}
	public function updateUSR()
	{
		$idU = $this->input->post('id_user');
		$id = $this->input->post('username');
		$psw = $this->input->post('password');
		$jbt = $this->input->post('jabatan');
		$dvs = $this->input->post('divisi');
		$data = array(
			'username' => $id,
			'password' => $psw,
			'divisi' => $dvs,
			'levels' => $jbt,
		 );
		 $update=$this->Users->updateMan(array('id_user'=>$idU),$data);
		 redirect('HR/shw_user');
	}
	public function updadpu()
	{
		$idU = $this->input->post('id_user');
		$id = $this->input->post('username');
		$psw = $this->input->post('password');
		$data = array(
			'username' => $id,
			'password' => $psw,
		 );
		 $update=$this->Users->updateMan(array('id_user'=>$idU),$data);
		 redirect('HR/shw_user');
	}
	public function usr_add()
	{
		$adus = $this->input->post('username');
		$adpa = $this->input->post('password');
		$adja = $this->input->post('jabatan');
		$addi = $this->input->post('divisi');
		$data = array(
				'username'=>$adus,
				'password'=>$adpa,
				'levels'=>$adja,
				'divisi'=>$addi
		);
		$insert = $this->Users->insertUsers($data);
		redirect('HR/shw_user');
	}
	public function delKrit($idKr)
	{
		$this->Kriteria->delKrit($idKr);
		redirect('HR/index');
	}
	public function resetall()
	{
		$nilaiR = array(
			'nilai' => 0,
			'absen' => 0,
			'final_nilai' => 0,
			'final_absen' => 0,
			'final_total' => 0
	 );
		$this->Manager->resetN($nilaiR);
		redirect('HR/page3');
	}
}
