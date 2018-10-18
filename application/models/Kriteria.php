<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kriteria extends CI_Model{

	var $table = 'kriteria';
  public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

  public function get_data() {
  $this->db->from($this->table);
  $query = $this->db->get();
	if($query->num_rows()>0){
		return $query->result();
	}
	else {
		return "Impossible";
	}
	}

  public function get_asc() {
  $this->db->from($this->table);
	$this->db->order_by("jumlah_kriteria","desc");
  $query = $this->db->get();
	if($query->num_rows()>0){
		return $query->result();
	}
	else {
		return "Impossible";
	}
	}
	public function get_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_kriteria',$id);
		$query = $this->db->get();
		return $query->result();
	}
	public function getIDBaru(){
		$this->db->from($this->table);
		$this->db->order_by('id_kriteria','DESC');
		$this->db->limit(1);
		$query=$this->db->get();
		if ($query->result()==0) {
		 	return FALSE;
		}
		else {
			return $query->result();
		}
	}
	public function insertKriteria($data)
	{
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
	}
	public function updateKrit($where,$data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function delKrit($where)
	{
		$this->db->where('id_kriteria',$where);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}
}
?>
