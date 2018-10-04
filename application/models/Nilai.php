<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nilai extends CI_Model{

	var $table = 'nilai';
  public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

  public function get_data() {
  $this->db->select('*');
  $this->db->from($this->table);
  $query = $this->db->get();
	if($query->num_rows()>0){
		return $query->result();
	}
	}
	public function get_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('no',$id);
		$query = $this->db->get();
		return $query->result();
	}
	public function updarr($where,$data)
	{
		$this->db->update($this->table,$data,$where);
		return $this->db->affected_rows();
	}
}
?>
