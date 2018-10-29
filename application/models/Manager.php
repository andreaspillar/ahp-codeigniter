<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manager extends CI_Model{

	var $table = 'karyawan';
  public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	// test area
	public function gettenup($jabatan)
	{
		$this->db->select('nama_karyawan');
		$this->db->select('(final_total) AS final_t');
		$this->db->from($this->table);
		$this->db->where('jabatan',$jabatan);
		$this->db->order_by('final_total','DESC');
		$this->db->order_by('final_total','ASC');
		$this->db->limit(10);
		$query=$this->db->get();
		return $query->result();
	}

	// end test area

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

  public function get_try() {
  $this->db->from($this->table);
  $this->db->where('jabatan','Staff');
  $this->db->where('divisi','Finance');
  $this->db->order_by('final_total','DESC');
  $query = $this->db->get();
	if($query->num_rows()>0){
		return $query->result();
	}
	else {
		return 0;
	}
	}

  public function get_noMAN($divisi) {
  $this->db->where('jabatan !=','Manajer');
	$this->db->where('divisi', $divisi);
	$this->db->order_by('jabatan','ASC');
  $this->db->from($this->table);
  $query = $this->db->get();
	if($query->num_rows()>0){
		return $query->result();
	}
	else {
		return 0;
	}
	}
  public function get_noKBID($divisi) {
  $this->db->where('jabatan !=','Manajer');
  $this->db->where('jabatan !=','Kabid');
	$this->db->where('divisi', $divisi);
	$this->db->order_by('jabatan','ASC');
  $this->db->from($this->table);
  $query = $this->db->get();
	if($query->num_rows()>0){
		return $query->result();
	}
	else {
		return 0;
	}
	}
  public function get_MAN() {
  $this->db->where('jabatan','Manajer');
	$this->db->order_by('divisi','ASC');
  $this->db->from($this->table);
  $query = $this->db->get();
	if($query->num_rows()>0){
		return $query->result();
	}
	else {
		return 0;
	}
	}
  public function get_KBID($divisi) {
  $this->db->where('jabatan','Kabid');
  $this->db->where('divisi',$divisi);
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
		$this->db->where('jabatan',$uniqJ);
		$this->db->from($this->table);
		$this->db->order_by('final_total','DESC');
		$chek = $this->db->get();
		if ($chek->result()==0) {
			return FALSE;
		}
		else {
			return $chek->result();
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
		$this->db->where('id_karyawan',$id);
		$this->db->from($this->table);
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
	public function delKary($where)
	{
		$this->db->where('id_karyawan',$where);
		$this->db->delete('detail_karyawan');
		$this->db->where('id_karyawan',$where);
		$this->db->delete('absen_karyawan');
		$this->db->where('id_karyawan',$where);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}
}
?>
