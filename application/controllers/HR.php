<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Login.php");

class HR extends Login {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->Model('Manager');
		$this->load->Model('Kriteria');
		$this->load->Model('KriteriaB');
		$this->load->Model('KriteriaO');
		$this->load->Model('Nilai');
		$this->load->Model('Ankrit');
		$this->load->Model('AKKB');
		$this->load->Model('AKOP');
		$this->load->Model('Anab');
		$this->load->Model('Detkar');
		$this->load->Model('Abkar');
		$this->load->Model('Users');
		$this->load->Model('Absen');
		if (!$this->session->userdata('logged')) {
			redirect('login/index');
		}
		else if (($this->session->userdata('logged')['level'] != '1')&&($this->session->userdata('logged')['divisi'] != 'HR-GA')) {
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
	public function page2_kb()
	{
		$data2['data_kriteria']=$this->KriteriaB->get_data();
		$this->load->view('nilai-kriteria/read-kriteria-b',$data2);
	}
	public function page2_op()
	{
		$data2['data_kriteria']=$this->KriteriaO->get_data();
		$this->load->view('nilai-kriteria/read-kriteria-o',$data2);
	}
	public function page3()
	{
		$this->load->view('karyawan/data-karyawan-man.php');
	}
	public function plusid()
	{
		$this->load->view('kriteria/baru-kriteria');
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
	public function person_rank()
	{
		$this->load->view('karyawan/ranking-karyawan');
	}
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
	public function add_user()
	{
		$this->load->view('users/tambah');
	}
	public function shw_user()
	{
		$data['users']=$this->Users->get_byL();
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
// showTBAn
	public function tabelAnalisa()
	{
		$datb['tabel'] = $this->Ankrit->get_data();
		$this->load->view('nilai-kriteria/calculate-table',$datb);
	}
	public function tabelAnalisaKb()
	{
		$datb['tabel'] = $this->AKKB->get_data();
		$this->load->view('nilai-kriteria/cal-tab-kb',$datb);
	}
	public function tabelAnalisaOp()
	{
		$datb['tabel'] = $this->AKOP->get_data();
		$this->load->view('nilai-kriteria/cal-tab-op',$datb);
	}
// showTBAb
	public function tabelAbsen()
	{
		$datb['tabel'] = $this->Anab->get_data();
		$this->load->view('nilai-absen/calculate-table',$datb);
	}

	public function karyawanku()
	{
		 $this->load->view('karyawan/data-rs-man');
	}
	public function karyawanJ($idJ)
	{
		$idD = $this->session->userdata('logged')['divisi'];
		$data['karyawan']=$this->Manager->get_by_jd($idJ,$idD);
		$this->load->view('karyawan/data/karyascman',$data);
	}

	//ranking-karyawan
	public function shw()
	{
		$data['raK']=$this->KriteriaO->get_data();
		$this->load->view('karyawan/persons/kary',$data);
	}
	public function man()
	{
		$data['raK']=$this->Kriteria->get_data();
		$this->load->view('karyawan/persons/man',$data);
	}
	public function kbid()
	{
		$data['raK']=$this->KriteriaB->get_data();
		$this->load->view('karyawan/persons/kabid',$data);
	}
	public function pengawas()
	{
		$data['raK']=$this->KriteriaB->get_data();
		$this->load->view('karyawan/persons/pengawas',$data);
	}
	public function staff()
	{
		$data['raK']=$this->KriteriaB->get_data();
		$this->load->view('karyawan/persons/staff',$data);
	}
	public function kshift()
	{
		$data['raK']=$this->KriteriaO->get_data();
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
		$data['karyawan']=$this->Manager->get_noMAN();
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
		$data['karyawan']=$this->Manager->get_by_dnoMANOR($idD);
		$this->load->view('karyawan/data/kary-man',$data);
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
		redirect('HR/person_rank');
	}
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
		redirect('HR/page3');
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
		redirect('HR/karyawanku');
	}

// updateNIKR
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
	public function updateNiKrB()
	{
		$idkr = $_POST['id_kriteria'];
		$nakr = $_POST['hasil'];
		foreach ($idkr as $ide => $al) {
			$datc = array(
				'jumlah_kriteria' => $nakr[$ide],
			);
			$this->KriteriaB->updateKrit(array('id_kriteria'=>$al),$datc);
		}
		$datb['tabel'] = $this->AKKB->get_data();
		$this->load->view('nilai-kriteria/cal-tab-kb',$datb);
	}
	public function updateNiKrO()
	{
		$idkr = $_POST['id_kriteria'];
		$nakr = $_POST['hasil'];
		foreach ($idkr as $ide => $al) {
			$datc = array(
				'jumlah_kriteria' => $nakr[$ide],
			);
			$this->KriteriaO->updateKrit(array('id_kriteria'=>$al),$datc);
		}
		$datb['tabel'] = $this->AKOP->get_data();
		$this->load->view('nilai-kriteria/cal-tab-op',$datb);
	}
// end updateNIKR

// tabelKRIT
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
	public function showTbKbid()
	{
		$cleT = $this->AKKB->clearTB();
		$crit = $_POST['C'];
		$opt = $_POST['W'];
		$crib = $_POST['X'];
		foreach ($crit as $key => $vl) {
			$data = array(
				'kriteria_x'=>$vl,
				'nilai_krit'=>$opt[$key],
				'kriteria_y'=>$crib[$key]
			);
			$insert = $this->AKKB->insertArray($data);
		}
		$datb['tabel'] = $this->AKKB->get_data();
		$this->load->view('nilai-kriteria/cal-tab-kb',$datb);
	}
	public function showTbOp()
	{
		$cleT = $this->AKOP->clearTB();
		$crit = $_POST['C'];
		$opt = $_POST['W'];
		$crib = $_POST['X'];
		foreach ($crit as $key => $vl) {
			$data = array(
				'kriteria_x'=>$vl,
				'nilai_krit'=>$opt[$key],
				'kriteria_y'=>$crib[$key]
			);
			$insert = $this->AKOP->insertArray($data);
		}
		$datb['tabel'] = $this->AKOP->get_data();
		$this->load->view('nilai-kriteria/cal-tab-op',$datb);
	}
// end tabelKRIT

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
		$insert=$this->KriteriaB->insertKriteria($data);
		$insert=$this->KriteriaO->insertKriteria($data);
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
