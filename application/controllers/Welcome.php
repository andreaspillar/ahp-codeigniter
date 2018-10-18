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
		$this->load->library('encryption');
		$this->load->Model('Manager');
		$this->load->Model('Kriteria');
		$this->load->Model('Nilai');
		$this->load->Model('Ankrit');
		$this->load->Model('Anab');
		$this->load->Model('Detkar');
		$this->load->Model('Abkar');
		$this->load->Model('Absen');
		if (!$this->session->userdata('logged')) {
			redirect('login/index');
		}
		else if ($this->session->userdata('logged')['level'] != '0') {
			redirect('assessors/index');
		}
	}

	public function testPHP()
	{
		phpinfo();
	}
	public function tests()
	{
		$a = base64_encode('05781623');
		echo $a;
		$b = base64_decode('MDU3ODE2MjM=');
		echo "<br>".$b;
	}


//pindah halaman
	public function index()
	{
			$data['data_kriteria']=$this->Absen->get_asc();
			$this->load->view('absen/view-absen',$data);
	}
	public function chkrit_pg($idk)
	{
		$data['absen']=$this->Absen->get_id($idk);
		$this->load->view('kriteria/edit-kriteria',$data);
	}
	public function absen2()
	{
		$data2['data_absen']=$this->Absen->get_data();
		$this->load->view('nilai-absen/read-absen',$data2);
	}
	public function page3()
	{
		$this->load->view('karyawan/data-karyawan.php');
	}
	public function adperson_pg()
	{
		$data['data']=$this->Manager->getIDBaru();
		$this->load->view('karyawan/tambah-karyawan',$data);
	}
	public function chperson_pg($idg){
		$absen = base64_decode($idg);
		$data['ubah']=$this->Manager->get_id($absen);
		$this->load->view('karyawan/ubah-karyawan',$data);
	}
	public function rank($value) //NILAI PER KARYAWAN
	{
		$val2 = base64_decode($value);
		$data['nilK']=$this->Manager->get_id($val2);
		$this->load->view('karyawan/absen/absen-edit',$data);
	}
	public function rksen($value) //Absen PER karyawan
	{
		$absen = base64_decode($value);
		$data['nilK']=$this->Manager->get_no($absen);
		$this->load->view('karyawan/absen/absen-karyawan',$data);
	}
	public function person_rank()
	{
		$this->load->view('karyawan/ranking-absen');
	}
	public function person_absen()
	{
		$this->load->view('karyawan/ranking-absen');
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
	public function tabelAbsen()
	{
		$datb['tabel'] = $this->Anab->get_data();
		$this->load->view('nilai-absen/calculate-table',$datb);
	}

	// absen
	public function abk()
	{
		$data['raK']=$this->Absen->get_data();
		$this->load->view('karyawan/personabsen/kary',$data);
	}
	public function abm()
	{
		$data['raK']=$this->Absen->get_data();
		$this->load->view('karyawan/personabsen/man',$data);
	}
	public function abkb()
	{
		$data['raK']=$this->Absen->get_data();
		$this->load->view('karyawan/personabsen/kabid',$data);
	}
	public function abp()
	{
		$data['raK']=$this->Absen->get_data();
		$this->load->view('karyawan/personabsen/pengawas',$data);
	}
	public function abs()
	{
		$data['raK']=$this->Absen->get_data();
		$this->load->view('karyawan/personabsen/staff',$data);
	}
	public function abks()
	{
		$data['raK']=$this->Absen->get_data();
		$this->load->view('karyawan/personabsen/kshift',$data);
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

	public function updateKriteria()
	{
		$idKr = $this->input->post('id_absen');
		$nmKr = $this->input->post('nama_absen');
		$ks = $this->input->post('kurang_sekali');
		$k = $this->input->post('kurang');
		$c = $this->input->post('cukup');
		$b = $this->input->post('baik');
		$bs = $this->input->post('baik_sekali');
		$data = array(
			'nama_absen' => $nmKr,
			'ket_nil1' => $ks,
			'ket_nil2' => $k,
			'ket_nil3' => $c,
			'ket_nil4' => $b,
			'ket_nil5' => $bs,
		 );
		$update=$this->Absen->updateKrit(array('id_absen'=>$idKr),$data);
		redirect('welcome/index');
	}
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
	public function updateFiAb()
	{
		$idkr = $_POST['idK'];
		$nabs = $_POST['totalabsen'];
		$nakr = $_POST['totalakhir'];
		foreach ($idkr as $ide => $al) {
			$datc = array(
				'final_absen' => $nabs[$ide],
				'final_total' => $nakr[$ide],
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
	public function updAbQa()
	{
		$idQ = $this->input->post('idqar');
		$this->Abkar->deltabID($idQ);
		$cRQ = $_POST['C'];
		$nLQ = $_POST['KR'];
		$niQ = $this->input->post('total');
		$data = array(
			'absen'=>$niQ,
		);
		$update=$this->Manager->updateMan(array('id_karyawan'=>$idQ),$data);
		foreach ($cRQ as $Kr => $v) {
			$datb = array(
				'id_absen' => $v,
				'id_karyawan' => $idQ,
				'nilai_absen' => $nLQ[$Kr]
			);
			$this->Abkar->insertArray($datb);
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
	public function updateNiAb()
	{
		$idkr = $_POST['id_absen'];
		$nakr = $_POST['hasil'];
		foreach ($idkr as $ide => $al) {
			$datc = array(
				'jumlah_absen' => $nakr[$ide],
			);
			$this->Absen->updateKrit(array('id_absen'=>$al),$datc);
		}
		$datb['tabel'] = $this->Anab->get_data();
		$this->load->view('nilai-absen/calculate-table',$datb);
	}
	public function updateKaryawan()
	{
		$id = $this->input->post('id_karyawan');
		$nik = $this->input->post('no_karyawan');
		$nama = $this->input->post('nama_karyawan');
		// $tl = $this->input->post('tempat_lahir');
		// $tgl = $this->input->post('tanggal_lahir');
		// $jk = $this->input->post('jenis_kelamin');
		$jb = $this->input->post('jabatan');
		$di = $this->input->post('divisi');
		// $tgm = $this->input->post('tanggal_masuk');
		// $pnd = $this->input->post('pendidikan');
		$data = array(
			// 'id_karyawan' => $id,
			'no_karyawan' => $nik,
			'nama_karyawan' => $nama,
			// 'tempat_lahir' => $tl,
			// 'tanggal_lahir' => $tgl,
			// 'jenis_kelamin' => $jk,
			'jabatan' => $jb,
			'divisi' => $di,
			// 'tanggal_masuk' => $tgm,
			// 'pendidikan' => $pnd,
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
	public function showAbsen()
	{
		$cleT = $this->Anab->clearTB();
		$crit = $_POST['C'];
		$opt = $_POST['W'];
		$crib = $_POST['X'];
		foreach ($crit as $key => $vl) {
			$data = array(
				'absen_x'=>$vl,
				'nilai_krit'=>$opt[$key],
				'absen_y'=>$crib[$key]
			);
			$insert = $this->Anab->insertArray($data);
		}
		$datb['tabel'] = $this->Anab->get_data();
		$this->load->view('nilai-absen/calculate-table',$datb);
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
	public function delKrit($idKr)
	{
		$this->Kriteria->delKrit($idKr);
		redirect('welcome/index');
	}
}
