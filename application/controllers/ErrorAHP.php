<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorAHP extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
  public function index()
	{
		$this->load->view('index');
	}
}
