<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function save($data,$id=FALSE) {
		if ($id == FALSE) {
			$this->db->set($data)->insert("tbl_login");
			return $this->db->insert_id();
		} else {
			$this->db->where('ID_User',$id);
			$this->db->set($data);
			$this->db->update('tbl_login');

		}
	}
	public function get() {
		$this->db->select("*")->from('tbl_login');
		$query = $this->db->get();
		return $query->result_array(); 
	}
	public function get_by($val,$single=FALSE) {
		$this->db->select("*")->from('tbl_login');
		$this->db->where($val);
		if($single == TRUE)
			$this->db->limit(1);
		$query = $this->db->get();
		if($single == TRUE)
			return $query->row_array(); 
		else
			return $query->result_array(); 
	}

	public function delete($id) {
		$this->db->where('ID_User', $id);
		$this->db->delete('tbl_login');
	}
}