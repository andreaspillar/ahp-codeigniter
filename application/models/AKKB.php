<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AKKB extends CI_Model{

	var $table = 'anls_krit_kb';
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
	public function clearTB()
	{
		$this->db->empty_table($this->table);
	}
	public function insertArray($data)
	{
    $this->db->insert($this->table,$data);
    return $this->db->insert_id();
	}
}
?>
