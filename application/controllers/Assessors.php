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
		else if ($this->session->userdata('logged')['level'] != '2') {
			redirect('assessors/index');
		}
	}

//pindah halaman
	public function index()
	{
		$data['karyawan']=$this->Manager->get_data();
		$this->load->view('karyawan/data-karyawan.php',$data);
	}
	public function adperson_pg()
	{
		$data['data']=$this->Manager->getIDBaru();
		$this->load->view('karyawan/tambah-karyawan',$data);
	}
	public function chperson_pg($idg){
		$data['ubah']=$this->Manager->get_id($idg);
		$this->load->view('karyawan/ubah-karyawan',$data);
	}
	public function rank($value)
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai-karyawan',$data);
	}
	public function person_rank()
	{
		$this->load->view('karyawan/ranking-karyawan');
	}
	public function ubahm($id){
		$data['manager']=$this->Manager->get_id($id);
		$this->load->view('edit_man',$data);
	}

	//ranking-karyawan
	public function shw()
	{
		$data['raK']=$this->Kriteria->get_data();
		$this->load->view('karyawan/persons/kary',$data);
	}
	public function man()
	{
		$data['raK']=$this->Kriteria->get_data();
		$this->load->view('karyawan/persons/man',$data);
	}
	public function kbid()
	{
		$data['raK']=$this->Kriteria->get_data();
		$this->load->view('karyawan/persons/kabid',$data);
	}
	public function pengawas()
	{
		$data['raK']=$this->Kriteria->get_data();
		$this->load->view('karyawan/persons/pengawas',$data);
	}
	public function staff()
	{
		$data['raK']=$this->Kriteria->get_data();
		$this->load->view('karyawan/persons/staff',$data);
	}
	public function kshift()
	{
		$data['raK']=$this->Kriteria->get_data();
		$this->load->view('karyawan/persons/kshift',$data);
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

	public function updateKaryawan()
	{
		$id = $this->input->post('id_karyawan');
		$nik = $this->input->post('no_karyawan');
		$nama = $this->input->post('nama_karyawan');
		$tl = $this->input->post('tempat_lahir');
		$tgl = $this->input->post('tanggal_lahir');
		$jk = $this->input->post('jenis_kelamin');
		$jb = $this->input->post('jabatan');
		$di = $this->input->post('divisi');
		$tgm = $this->input->post('tanggal_masuk');
		$pnd = $this->input->post('pendidikan');
		$data = array(
			'id_karyawan' => $id,
			'no_karyawan' => $nik,
			'nama_karyawan' => $nama,
			'tempat_lahir' => $tl,
			'tanggal_lahir' => $tgl,
			'jenis_kelamin' => $jk,
			'jabatan' => $jb,
			'divisi' => $di,
			'tanggal_masuk' => $tgm,
			'pendidikan' => $pnd,
		 );
		 $update=$this->Manager->updateMan(array('id_karyawan'=>$id),$data);
		 redirect('welcome/page3');
	}

	public function tabelAnalisa()
	{
		$datb['tabel'] = $this->Ankrit->get_data();
		$this->load->view('nilai-kriteria/calculate-table',$datb);
	}
	public function insertKaryawan()
	{
		$id = $this->input->post('id_karyawan');
		$nik = $this->input->post('no_karyawan');
		$nama = $this->input->post('nama_karyawan');
		$tl = $this->input->post('tempat_lahir');
		$tgl = $this->input->post('tanggal_lahir');
		$jk = $this->input->post('jenis_kelamin');
		$jb = $this->input->post('jabatan');
		$di = $this->input->post('divisi');
		$tgm = $this->input->post('tanggal_masuk');
		$pnd = $this->input->post('pendidikan');
		$nil = 0;
		$data = array(
			'id_karyawan' => $id,
			'no_karyawan' => $nik,
			'nama_karyawan' => $nama,
			'tempat_lahir' => $tl,
			'tanggal_lahir' => $tgl,
			'jenis_kelamin' => $jk,
			'jabatan' => $jb,
			'divisi' => $di,
			'tanggal_masuk' => $tgm,
			'pendidikan' => $pnd,
			'nilai' => $nil,
		 );
		 $insert=$this->Manager->insertKaryawan($data);
		 redirect('welcome/page3');
	}
}