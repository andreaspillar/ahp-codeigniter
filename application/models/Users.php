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
	public function get_all()
	{
		$this->db->from($this->table);
		$query = $this->db->get();
		if ($query->result() != NULL) {
			return $query->result();
		}
		else{
			echo "Error!";
		}
	}
	public function get_byL()
	{
		$this->db->order_by('levels','ASC');
		$this->db->order_by('divisi','ASC');
		$this->db->from($this->table);
		$query = $this->db->get();
		if ($query->result() != NULL) {
			return $query->result();
		}
		else{
			echo "Error!";
		}
	}
	public function get_user($idU)
	{
		$this->db->from($this->table);
		$this->db->where('username',$idU);
		$res = $this->db->get();
		if ($res->result() != NULL) {
			return $res->result();
		}
		else {
			echo "Error!";
		}
	}
	public function updateMan($where,$data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function insertUsers($data)
	{
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}
	public function deleteUser($value)
	{
		$this->db->where('username', $value);
		$this->db->delete($this->table);
	}
}
?>
