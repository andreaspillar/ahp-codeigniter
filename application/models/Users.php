<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Model{

	var $table = 'user';
  public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function validate($email,$password){
		$this->db->where('username',$email);
		$this->db->where('password',$password);
		$result = $this->db->get($this->table,1);
		return $result;
	}
}
?>
