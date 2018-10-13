<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Login.php");

class Welcome extends Login {
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
		$this->load->Model('Detkar');
		if (!$this->session->userdata('logged')) {
			redirect('login/index');
		}
		else if ($this->session->userdata('logged')['level'] != '0') {
			redirect('assessors/index');
		}
	}

//pindah halaman
	public function index()
	{
			$data['data_kriteria']=$this->Kriteria->get_asc();
			$this->load->view('kriteria/view-kriteria',$data);
	}
	public function page2()
	{
		$data2['data_kriteria']=$this->Kriteria->get_data();
		$this->load->view('nilai-kriteria/read-nilai',$data2);
	}
	public function page3()
	{
		$this->load->view('karyawan/data-karyawan.php');
	}
	public function addkrit_pg()
	{
		$data['data']=$this->Kriteria->getIDBaru();
		$this->load->view('kriteria/tambah-kriteria',$data);
	}
	public function chkrit_pg($idk)
	{
		$data['ubah']=$this->Kriteria->get_id($idk);
		$this->load->view('kriteria/edit-kriteria',$data);
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
	public function add_user()
	{
		$this->load->view('users/tambah');
	}
	public function shw_user()
	{
		$data['users']=$this->Users->get_all();
		$this->load->view('users/read',$data);
	}
	public function chuser($idU)
	{
		$data['usub']=$this->Users->get_user($idU);
		$this->load->view('users/ubah',$data);
	}
	public function finalView()
	{
		$this->load->view('karyawan/final-karyawan');
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
	//finalresuls:')
	public function rka($idJ,$idD)
	{
		$idJ =  $this->uri->segment(3);
  	$idD =  $this->uri->segment(4);
		$data['finKa']=$this->Manager->get_by_jd($idJ,$idD);
		$this->load->view('karyawan/ranking/kary',$data);
	}
	public function rkj($idJ)
	{
		$data['finKa']=$this->Manager->get_by_jonly($idJ);
		$this->load->view('karyawan/ranking/kary',$data);
	}
	public function dataK()
	{
		$data['karyawan']=$this->Manager->get_data();
		$this->load->view('karyawan/data/kary',$data);
	}
	public function dataKDJ($idJ,$idD)
	{
		$idJ =  $this->uri->segment(3);
		$idD =  $this->uri->segment(4);
		$data['karyawan']=$this->Manager->get_by_jd($idJ,$idD);
		$this->load->view('karyawan/data/kary',$data);
	}
	public function dataKJ($idJ)
	{
		$data['karyawan']=$this->Manager->get_by_jnoOR($idJ);
		$this->load->view('karyawan/data/kary',$data);
	}
	public function dataKD($idD)
	{
		$data['karyawan']=$this->Manager->get_by_dnoOR($idD);
		$this->load->view('karyawan/data/kary',$data);
	}




//fungsi
	public function updateNiFi()
	{
		$idkr = $_POST['idK'];
		$nakr = $_POST['totalakhir'];
		foreach ($idkr as $ide => $al) {
			$datc = array(
				'final_nilai' => $nakr[$ide],
			);
			$this->Manager->updateMan(array('id_karyawan'=>$al),$datc);
		}
		redirect('welcome/person_rank');
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
		redirect('welcome/page3');
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
		redirect('welcome/index');
	}
	public function ubahm($id){
		$data['manager']=$this->Manager->get_id($id);
		$this->load->view('edit_man',$data);
	}
	public function updateUSR()
	{
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
		 $update=$this->Users->updateMan(array('username'=>$id),$data);
		 redirect('welcome/shw_user');
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
		redirect('welcome/shw_user');
	}
}
