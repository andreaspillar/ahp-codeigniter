<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (isset($this->session->userdata['logged'])) {
redirect("welcome");
}
?>
<html lang="en">
<head>
	<title>Penilaian PM5/6/9 Pura</title>
	<meta charset="UTF-8">
  <!-- Webscript -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
  <!-- <script src="<?php echo base_url('assets/js/popper.js'); ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/js/main.js'); ?>"></script> -->
  <!-- add into vendor -->
  <!-- <script src="<?php echo base_url('assets/vendor/animsition/js/animsition.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/select2/select2.min.js'); ?>"></script>
  <script>
  $(".selection-2").select2({
    minimumResultsForSearch: 20,
    dropdownParent: $('#dropDownSelect1')
  });
  </script>
  <script src="<?php echo base_url('assets/vendor/daterangepicker/daterangepicker.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/daterangepicker/moment.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/countdowntime/countdowntime.js'); ?>"></script> -->

  <!-- Styler -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url('assets/css/signin.css');?>" rel="stylesheet">
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
  <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->
  <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
	<!-- <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet"/> -->
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/util.css'); ?>"> -->
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>"> -->
  <!-- add into vendor -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/css-hamburgers/hamburgers.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/animsition/css/animsition.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/select2/select2.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/daterangepicker/daterangepicker.css'); ?>"> -->

</head>
