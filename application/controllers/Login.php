<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
    $this->load->Model('Users');
    $this->load->Model('Kriteria');
    $this->load->Model('Manager');
	}

	public function index()
	{
		$this->load->view('login/login');
	}
  public function ath()
  {
    $username = $this->input->post('username',TRUE);
    $password = $this->input->post('password',TRUE);
    $hash = hash('sha256','hu8945iot7gdreoi'.$password.'94085ire8562ue');
    // $validate = $this->Users->validate($username,$password);
    $validate = $this->Users->validate($username,$hash);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $uid   = $data['id_user'];
        $name  = $data['username'];
        $level = $data['levels'];
				$role = $data['divisi'];
        $sesdata = array(
            'uid'       => $uid,
            'username'  => $name,
            'level'     => $level,
						'divisi'		=> $role,
          );
        if($level === '0'){
					$this->session->set_userdata('logged',$sesdata);
					redirect('welcome');
        }elseif (($level === '1')&&($role != 'HR-GA')) {
        	$this->session->set_userdata('logged',$sesdata);
					redirect('assessors');
        }elseif (($level === '1')&&($role == 'HR-GA')) {
        	$this->session->set_userdata('logged',$sesdata);
					redirect('HR');
        }
				elseif($level === '2'){
					$this->session->set_userdata('logged',$sesdata);
          redirect('assessors');
        }
				elseif($level === '-1'){
					$this->session->set_userdata('logged',$sesdata);
          redirect('PU');
        }
				else{
          redirect('Error');
        }
				return $level;
    }else{
				$msg = "Username atau Password Salah";
				$this->session->set_flashdata('msg', $msg);
        redirect('login/index');
    }
  }
	public function out(){
		$this->session->unset_userdata('logged');
		$this->session->sess_destroy();
		$this->load->view('login/login');
	}

}
