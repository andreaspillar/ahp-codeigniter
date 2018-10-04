<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manager extends CI_Model{

	var $table = 'karyawan';
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
	else {
		return 0;
	}
	}
	public function get_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_karyawan',$id);
		$query = $this->db->get();
		return $query->result();
	}
	public function getIDBaru(){
		$this->db->from($this->table);
		$this->db->order_by('id_karyawan','DESC');
		$this->db->limit(1);
		$query=$this->db->get();
		if ($query->result()==NULL) {
			$data = array('id_karyawan' => 'A1' );
			$this->db->insert($this->table,$data);
			return $query->result();
		}
		else {
			return $query->result();
		}
	}
	public function updateMan($where,$data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function delete_id($id)
	{
		$this->db->where('id_karyawan', $id);
		$this->db->delete($this->table);
	}
	public function insertKaryawan($data)
	{
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}
}
?>
