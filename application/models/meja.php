<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meja extends CI_Model {

	public function save($data,$id=FALSE) {
		if ($id == FALSE) {
			$this->db->set($data)->insert("tbl_meja");
			return $this->db->insert_id();
		} else {
			$this->db->where('ID_meja',$id);
			$this->db->set($data);
			$this->db->update('tbl_meja');

		}
	}
	public function cek_insert_meja($id,$jml_baru)  { 
		$this->db->select("*")->from('tbl_meja');
		$this->db->where('ID_Lab',$id);
		$query = $this->db->get();
		if ($query->num_rows() < $jml_baru){
			return $jml_baru-$query->num_rows();
		}
		else{
			return 0;
		}

	}

	public function get($id = FALSE) {
		$this->db->select("*")->from('tbl_meja');
		if($id == TRUE)
			$this->db->where("ID_lab",$id);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function get_id_meja($id) { //untuk view kerusakan
		$this->db->select("ID_meja")->from('tbl_meja');
		$this->db->where("ID_lab",$id);
		$query = $this->db->get();
		return $query; 
	}
}