<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class detkar extends CI_Model{

	var $table = 'detail_karyawan';
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
		return "Impossible";
	}
	}
	public function get_id()
	{
		$this->db->select('id_kriteria');
		$this->db->select('nama_kriteria');
		$this->db->from($this->table);
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
	public function deltabID($where)
	{
    $this->db->where('id_karyawan',$where);
		$this->db->delete($this->table);
	}
	public function insertArray($data)
	{
    $this->db->insert($this->table,$data);
    return $this->db->insert_id();
	}
}
?>
