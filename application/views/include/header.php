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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
	<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
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
										Sistem Penilaian Karyawan - PM569 Pura
									</a>
								</div>
						<ul class="nav navbar-header navbar-fixed">
							<li>
								<a href="<?php echo site_url('welcome/index');?>" role="button">
									<i class="pe-7s-note2"></i>
									<p>Kriteria</p>
								</a>

							</li>
							<li>
								<a href="<?php echo site_url('welcome/page2');?>" role="button">
									<i class="pe-7s-edit"></i>
									<p>Prioritas Kriteria</p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('welcome/tabelAnalisa');?>" role="button">
									<i class="pe-7s-graph1"></i>
									<p>Analisa Kriteria	</p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('welcome/page3');?>" role="button">
									<i class="pe-7s-user"></i>
									<p>Karyawan</p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('welcome/person_rank');?>" role="button">
									<i class="pe-7s-graph3"></i>
									<p>Analisa Karyawan</p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('welcome/finalView');?>" role="button">
									<i class="pe-7s-medal"></i>
									<p>Peringkat Karyawan</p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('welcome/shw_user');?>" role="button">
									<i class="pe-7s-users"></i>
									<p>Pengguna</p>
								</a>
							</li>
						</ul>
					<?php elseif($lvls==='Manajer'): ?>
						<div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">
							<div class="sidebar-wrapper">
								<div class="logo">
									<a href="#" class="simple-text">
										Sistem Penilaian Karyawan - PM569 Pura
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
					<?php elseif($lvls==='2'||$lvls==='1'): ?>
						<div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">
							<div class="sidebar-wrapper">
								<div class="logo">
									<a href="#" class="simple-text">
										Sistem Penilaian Karyawan - PM569 Pura
									</a>
								</div>
						<ul class="nav navbar-header navbar-fixed">
							<li>
								<a href="<?php echo site_url('assessors/index');?>" role="button">
									<i class="pe-7s-user"></i>
									<p>Karyawan Saya</p>
								</a>
							</li>
							<li>
								<a href="<?php echo site_url('assessors/viewRank');?>" role="button">
									<i class="pe-7s-medal"></i>
									<p>Ranking Karyawan Saya</p>
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
