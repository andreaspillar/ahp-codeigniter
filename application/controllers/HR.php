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

	// testing room
	public function toJSON()
	{
		header('Content-Type: application/json');
		$datA=$this->Manager->gettenup('Staff');
		print json_encode($datA);
	}
	public function toJSONII()
	{
		header('Content-Type: application/json');
		$datB=$this->Manager->gettenup('Manajer');
		print json_encode($datB);
	}
	public function toJSONIII()
	{
		header('Content-Type: application/json');
		$datC=$this->Manager->gettenup('Kabid');
		print json_encode($datC);
	}
	public function toJSONIV()
	{
		header('Content-Type: application/json');
		$datD=$this->Manager->gettenup('Pengawas');
		print json_encode($datD);
	}
	public function toJSONV()
	{
		header('Content-Type: application/json');
		$datE=$this->Manager->gettenup('Kashift');
		print json_encode($datE);
	}
	public function toJSONVI()
	{
		header('Content-Type: application/json');
		$datF=$this->Manager->gettenup('Operator');
		print json_encode($datF);
	}
	public function viewchart()
	{
		$this->load->view('view-chart');
	}
	// end testing room


// navigation: indikator (kriteria)
	public function index()
	{
			$data['data_kriteria']=$this->Kriteria->get_asc();
			$this->load->view('kriteria/view-kriteria',$data);
	}
	public function chkrit_pg($idk) //ganti kriteria
	{
		$data['ubah']=$this->Kriteria->get_id($idk);
		$this->load->view('kriteria/edit-kriteria',$data);
	}
	public function updateKriteria() //function ganti kriteria
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
		$updateB=$this->KriteriaB->updateKrit(array('id_kriteria'=>$idKr),$data);
		$updateO=$this->KriteriaO->updateKrit(array('id_kriteria'=>$idKr),$data);
		redirect('HR/index');
	}
	public function delKrit($idKr)
	{
		$this->Kriteria->delKrit($idKr);
		redirect('HR/index');
	}
	public function addkrit_pg()
	{
		$data['data']=$this->Kriteria->getIDBaru();
		$this->load->view('kriteria/tambah-kriteria',$data);
	}
// -----------------------------------------------------------------------------

// navigation: prioritas indikator
	public function page2() //view tabel manajer
	{
		$data2['data_kriteria']=$this->Kriteria->get_data();
		$this->load->view('nilai-kriteria/read-nilai',$data2);
	}
	public function page2_kb() //view tabel kabid
	{
		$data2['data_kriteria']=$this->KriteriaB->get_data();
		$this->load->view('nilai-kriteria/read-kriteria-b',$data2);
	}
	public function page2_op() //view tabel operator
	{
		$data2['data_kriteria']=$this->KriteriaO->get_data();
		$this->load->view('nilai-kriteria/read-kriteria-o',$data2);
	}
	public function showTabel() //kalkulasi tabel manajer
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
	public function showTbKbid()	//kalkulasi tabel kabid
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
	public function showTbOp()	//kalkulasi tabel operator
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
// -----------------------------------------------------------------------------

// navigation: analisa indikator
	public function tabelAnalisa() //analisa manajer
	{
		$datb['tabel'] = $this->Ankrit->get_data();
		$this->load->view('nilai-kriteria/calculate-table',$datb);
	}
	public function tabelAnalisaKb() //analisa kabid
	{
		$datb['tabel'] = $this->AKKB->get_data();
		$this->load->view('nilai-kriteria/cal-tab-kb',$datb);
	}
	public function tabelAnalisaOp()	//analisa operator
	{
		$datb['tabel'] = $this->AKOP->get_data();
		$this->load->view('nilai-kriteria/cal-tab-op',$datb);
	}
// -----------------------------------------------------------------------------

// navigation: karyawan
	public function page3() //view page
	{
		$this->load->view('karyawan/data-karyawan-man.php');
	}
	public function dataK() //view jquery semua karyawan
	{
		$data['karyawan']=$this->Manager->get_data();
		$this->load->view('karyawan/data/prop-man/kary-all',$data);
	}
	public function rank($value) //view modal kalo nilai kriteria sudah ada yang isi
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-manajer/rank',$data);
	}
	public function dataKDJ($idJ,$idD) // view jquery jabatan dan divisi
	{
		$idJ =  $this->uri->segment(3);
		$idD =  $this->uri->segment(4);
		$data['karyawan']=$this->Manager->get_by_jd($idJ,$idD);
		$this->load->view('karyawan/data/prop-man/kary-specific',$data);
	}
	public function rank_specific($value) //view modal untuk datakdj
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-manajer/rank-specific',$data);
	}
	public function dataKD($idD) //view jquery divisi
	{
		$data['karyawan']=$this->Manager->get_by_dnoMANOR($idD);
		$this->load->view('karyawan/data/prop-man/kary-divisi',$data);
	}
	public function rank_divisi($value) //view modal untuk datakdj
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-manajer/rank-divisi',$data);
	}
	public function dataKJ($idJ) //view jquery jabatan
	{
		$data['karyawan']=$this->Manager->get_by_jnoOR($idJ);
		$this->load->view('karyawan/data/prop-man/kary-jabatan',$data);
	}
	public function rank_jabatan($value) //view modal untuk datakdj
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-manajer/rank-jabatan',$data);
	}
	public function resetall() //reset nilai karyawan
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
	public function updNiQa() //update nilai karyawan lain (dipakai juga di nilai karyawan saya)
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
// -----------------------------------------------------------------------------

// navigation: nilai karyawan saya
	public function karyawanku() //view nilai karyawan saya
	{
		 $this->load->view('karyawan/data-rs-man');
	}
	public function karyawanJ($idJ) //view jquery karyawan
	{
		$idD = $this->session->userdata('logged')['divisi'];
		$data['karyawan']=$this->Manager->get_by_jd($idJ,$idD);
		$this->load->view('karyawan/data/karyascman',$data);
	}
	public function rankn($value) //view modal nilai kriteria baru
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-manajer/rank-manajer',$data);
	}
	public function rankexist($value) //view modal kalo nilai kriteria sudah ada yang isi
	{
		$data['nilK']=$this->Manager->get_id($value);
		$this->load->view('karyawan/nilai/prop-manajer/rank-exist',$data);
	}
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
// -----------------------------------------------------------------------------

// navigation: analisa-karyawan
	public function person_rank() //view analisa-karyawan
	{
		$this->load->view('karyawan/ranking-karyawan');
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
	//end ranking-karyawan
	public function updateNiFi() //update nilai final
	{
		$idkr = $_POST['idK'];
		$nakr = $_POST['totalkriteria'];
		$nato = $_POST['totalakhir'];
		foreach ($idkr as $ide => $al) {
			$datc = array(
				'final_nilai' => $nakr[$ide],
				'final_total' => $nato[$ide],
			);
			$this->Manager->updateMan(array('id_karyawan'=>$al),$datc);
		}
		redirect('HR/person_rank');
	}
// -----------------------------------------------------------------------------

// navigation: peringkat-karyawan
	public function lastView()
	{
		$this->load->view('karyawan/final-karyawan');
	}
// finalresuls:')
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
// navigation: pengguna
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
	public function updateUSR()
	{
		$idU = $this->input->post('id_user');
		$id = $this->input->post('username');
		$psw = $this->input->post('password');
		$hasap = hash('sha256', 'hu8945iot7gdreoi'.$psw.'94085ire8562ue');
		$jbt = $this->input->post('jabatan');
		$dvs = $this->input->post('divisi');
		$data = array(
			'username' => $id,
			'password' => $hasap,
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
		$hasap = hash('sha256', 'hu8945iot7gdreoi'.$psw.'94085ire8562ue');
		$data = array(
			'username' => $id,
			'password' => $hasap,
		 );
		 $update=$this->Users->updateMan(array('id_user'=>$idU),$data);
		 redirect('HR/shw_user');
	}
	public function usr_add()
	{
		$adus = $this->input->post('username');
		$adpa = $this->input->post('password');
		$hasap = hash('sha256', 'hu8945iot7gdreoi'.$adpa.'94085ire8562ue');
		$adja = $this->input->post('jabatan');
		$addi = $this->input->post('divisi');
		$data = array(
				'username'=>$adus,
				'password'=>$hasap,
				'levels'=>$adja,
				'divisi'=>$addi
		);
		$insert = $this->Users->insertUsers($data);
		redirect('HR/shw_user');
	}
// -----------------------------------------------------------------------------

	public function karyawanNJ()
	{
		$idD = $this->session->userdata('logged')['divisi'];
		$data['karyawan']=$this->Manager->get_noMAN($idD);
		$this->load->view('karyawan/data/karyascman',$data);
	}

//fungsi lain
// insert kriteria
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
public function dluser($value)
{
	$this->Users->deleteUser($value);
	redirect('HR/shw_user');
}
// -----------------------------------------------------------------------------
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
// -----------------------------------------------------------------------------
}
