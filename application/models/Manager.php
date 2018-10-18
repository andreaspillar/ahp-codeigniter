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
  $this->db->from($this->table);
  $query = $this->db->get();
	if($query->num_rows()>0){
		return $query->result();
	}
	else {
		return 0;
	}
	}
  public function get_noMAN() {
  $this->db->where('jabatan !=','Manajer');
  $this->db->from($this->table);
  $query = $this->db->get();
	if($query->num_rows()>0){
		return $query->result();
	}
	else {
		return 0;
	}
	}

	public function get_by_jd($uniqJ,$uniqD)
	{
		$this->db->from($this->table);
		$this->db->where('jabatan',$uniqJ);
		$this->db->where('divisi',$uniqD);
		$this->db->order_by('final_total','DESC');
		$fire = $this->db->get();
		if ($fire->result()==0) {
			return FALSE;
		}
		else {
			return $fire->result();
		}
	}
	public function get_by_jonly($uniqJ)
	{
		$this->db->from($this->table);
		$this->db->where('jabatan',$uniqJ);
		$this->db->order_by('final_total','DESC');
		$fire = $this->db->get();
		if ($fire->result()==0) {
			return FALSE;
		}
		else {
			return $fire->result();
		}
	}
	public function get_by_donly($uniqD)
	{
		$this->db->from($this->table);
		$this->db->where('divisi',$uniqD);
		$this->db->order_by('final_total','DESC');
		$fire = $this->db->get();
		if ($fire->result()==0) {
			return FALSE;
		}
		else {
			return $fire->result();
		}
	}

	public function get_by_jnoOR($uniqJ)
	{
		$this->db->from($this->table);
		$this->db->where('jabatan',$uniqJ);
		$fire = $this->db->get();
		if ($fire->result()==0) {
			return FALSE;
		}
		else {
			return $fire->result();
		}
	}
	public function get_by_dnoOR($uniqD)
	{
		$this->db->from($this->table);
		$this->db->where('divisi',$uniqD);
		$fire = $this->db->get();
		if ($fire->result()==0) {
			return FALSE;
		}
		else {
			return $fire->result();
		}
	}
	public function get_by_dnoMANOR($uniqD)
	{
		$this->db->where('jabatan !=','Manajer');
		$this->db->from($this->table);
		$this->db->where('divisi',$uniqD);
		$fire = $this->db->get();
		if ($fire->result()==0) {
			return FALSE;
		}
		else {
			return $fire->result();
		}
	}

  public function get_where($rold) {
	$this->db->where('divisi',$rold);
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
	public function get_no($id)
	{
		$this->db->from($this->table);
		$this->db->where('no_karyawan',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getIDBaru(){
		$this->db->from($this->table);
		$this->db->order_by('id_karyawan','DESC');
		$this->db->limit(1);
		$query=$this->db->get();
		if ($query->result()==NULL) {
			$data = array('id_karyawan' => '1' );
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
	public function resetN($data)
	{
		$this->db->update($this->table, $data);
		$this->db->empty_table('absen_karyawan');
		$this->db->empty_table('detail_karyawan');
		return $this->db->affected_rows();
	}
}
?>
