<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (isset($this->session->userdata)) {
$datasess = $this->session->userdata('logged');
$username = $datasess['username'];
$lvls = $datasess['level'];
$division = $datasess['divisi'];
}
else {
header("location: login");
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<title>Home</title>
	<!-- Scripts -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
	<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/light-bootstrap-dashboard.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-notify.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/demo.js'); ?>"></script>
	<script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
	<!-- <script src="<?php echo base_url('assets/js/print.js'); ?>"></script> -->

	<!-- Webstyle -->
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/light-bootstrap-dashboard.css?v=1.4.0'); ?>" rel="stylesheet"/>
	<link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/css/pe-icon-7-stroke.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/css/demo.css'); ?>" rel="stylesheet" />
</head>
<body>
	<div class="wrapper">
					<?php if ($lvls==='0'): ?>
						<div class="sidebar" data-color="green" data-image="assets/img/sidebar-5.jpg">
							<div class="sidebar-wrapper">
								<div class="logo">
									<a href="#" class="simple-text">
										Penilaian PM5/6/9
									</a>
								</div>
						<ul class="nav navbar-header navbar-fixed">
							<li>
								<a href="<?php echo site_url('welcome/index');?>" role="button">
									<i class="pe-7s-note2"></i>
									<p>Absen (Indikator)</p>
								</a>
							</li>
							<li>
								<a hidden href="<?php echo site_url('welcome/absen2');?>" role="button">
									<i class="pe-7s-edit"></i>
									<p>Prioritas Absen</p>
								</a>
							</li>
							<li>
								<a hidden href="<?php echo site_url('welcome/tabelAbsen');?>" role="button">
									<i class="pe-7s-graph1"></i>
									<p>Analisa Absen </p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('welcome/page3');?>" role="button">
									<i class="pe-7s-users"></i>
									<p>Karyawan</p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('welcome/person_absen');?>" role="button">
									<i class="pe-7s-graph3"></i>
									<p>Hitung Absensi Karyawan</p>
								</a>
							</li>
						</ul>
					<?php elseif($lvls==='1'&&$division==='HR-GA'): ?>
						<div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">
							<div class="sidebar-wrapper">
								<div class="logo">
									<a href="#" class="simple-text">
										Penilaian PM5/6/9
									</a>
								</div>
						<ul class="nav navbar-header navbar-fixed">
							<li>
								<a href="<?php echo site_url('HR/index');?>" role="button">
									<i class="pe-7s-note2"></i>
									<p>Indikator</p>
								</a>
							</li>
							<li>
								<a href="#" class="showH" role="button">
									<i class="pe-7s-edit"></i>
									<p>Prioritas Indikator</p>
								</a>
							</li>
							<li id="buttonpr1">
								<a href="<?php echo site_url('HR/page2');?>" role="button">
									<p>Indikator Manajer/ Kabag</p>
								</a>
							</li>
							<li id="buttonpr2" >
								<a href="<?php echo site_url('HR/page2_kb');?>" role="button">
									<p>Indikator Kabid/ Staff/ Pengawas</p>
								</a>
							</li>
							<li id="buttonpr3" >
								<a href="<?php echo site_url('HR/page2_op');?>" role="button">
									<p>Indikator Kepala Shift/ Operator</p>
								</a>
							</li>
							<li>
								<a href="#" class="aKrit" role="button">
									<i class="pe-7s-graph1"></i>
									<p>Analisa Indikator	</p>
								</a>
							</li>
							<li id="ak1" hidden>
								<a href="<?php echo site_url('HR/tabelAnalisa');?>" role="button">
									<p>Manajer/ Kabag</p>
								</a>
							</li>
							<li id="ak2" hidden>
								<a href="<?php echo site_url('HR/tabelAnalisaKb');?>" role="button">
									<p>Kabid/ Staff/ Karyawan</p>
								</a>
							</li>
							<li id="ak3" hidden>
								<a href="<?php echo site_url('HR/tabelAnalisaOp');?>" role="button">
									<p>Kepala Shift/ Operator</p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('HR/page3');?>" role="button">
									<i class="pe-7s-users"></i>
									<p>Karyawan</p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('HR/karyawanku');?>" role="button">
									<i class="pe-7s-users"></i>
									<p>Nilai Karyawan Saya</p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('HR/person_rank');?>" role="button">
									<i class="pe-7s-graph3"></i>
									<p>Analisa Karyawan</p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('HR/lastView');?>" role="button">
									<i class="pe-7s-medal"></i>
									<p>Peringkat Karyawan</p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('HR/shw_user');?>" role="button">
									<i class="pe-7s-user"></i>
									<p>Pengguna</p>
								</a>
							</li>
						</ul>
						<script type="text/javascript">
						$(document).ready(function(){
								$("#buttonpr1").hide();
								$("#buttonpr2").hide();
								$("#buttonpr3").hide();
								$("#ak1").hide();
								$("#ak2").hide();
								$("#ak3").hide();
							$(".showH").click(function(event){
								event.preventDefault();
								$("#buttonpr1").toggle();
								$("#buttonpr2").toggle();
								$("#buttonpr3").toggle();
							});
							$(".aKrit").click(function(event){
								event.preventDefault();
								$("#ak1").toggle();
								$("#ak2").toggle();
								$("#ak3").toggle();
							});
						});
						</script>
					<?php elseif($lvls==='2'||$lvls==='1'): ?>
						<div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">
							<div class="sidebar-wrapper">
								<div class="logo">
									<a href="#" class="simple-text">
										Penilaian PM5/6/9
									</a>
								</div>
						<ul class="nav navbar-header navbar-fixed">
							<li>
								<a href="<?php echo site_url('assessors/index');?>" role="button">
									<i class="pe-7s-user"></i>
									<p>Karyawan Saya</p>
								</a>
							</li>
						</ul>
					<?php elseif($lvls==='-1'): ?>
						<div class="sidebar" data-color="orange" data-image="assets/img/sidebar-5.jpg">
							<div class="sidebar-wrapper">
								<div class="logo">
									<a href="#" class="simple-text">
										Penilaian PM5/6/9
									</a>
								</div>
						<ul class="nav navbar-header navbar-fixed">
							<li>
								<a href="<?php echo site_url('PU/index');?>" role="button">
									<i class="pe-7s-user"></i>
									<p>Ranking Seluruh Karyawan</p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('PU/karyawanku');?>" role="button">
									<i class="pe-7s-medal"></i>
									<p>Penilaian Manajer</p>
								</a>
							</li>
						</ul>
					<?php else: ?>
						<div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">
							<div class="sidebar-wrapper">
								<div class="logo">
									<a href="#" class="simple-text">
										Wrong Access
									</a>
								</div>
					<?php endif; ?>
		</div>
	</div>
	    <div class="main-panel">
				<nav class="navbar navbar-default navbar-fixed">
		            <div class="container-fluid">
		                <div class="navbar-header">
		                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
		                        <span class="sr-only">Toggle navigation</span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                        <span class="icon-bar"></span>
		                    </button>
		                    <a class="navbar-brand" href="#"></a>
		                </div>
		                <div class="collapse navbar-collapse">
		                    <ul class="nav navbar-nav navbar-right">
		                        <li>
		                            <a href="<?php echo site_url('login/out');?>">
		                                <p>Log out</p>
		                            </a>
		                        </li>
								<li class="separator hidden-lg hidden-md"></li>
		                    </ul>
		                </div>
		            </div>
		        </nav>
						<div class="content container-fluid ">
