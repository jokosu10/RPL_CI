<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kerusakan extends CI_Model {

	public function save($data,$id = FALSE) {
		if ($id == FALSE) {
			$this->db->set($data)->insert("tbl_kerusakan");
			return $this->db->insert_id();
		} else {
			$this->db->where('ID_Kerusakan',$id);
			$this->db->set($data);
			$query = $this->db->update('tbl_kerusakan');

		}
	}
	public function get($id = FALSE, $single = FALSE, $order = FALSE) {
		$this->db->select("*")->from('tbl_kerusakan');
		if($id == TRUE){
			if(is_array($id))
				$this->db->where($id);
			else
				$this->db->where("ID_lab",$id);
		}
		if($order == TRUE)
			$this->db->order_by($order);
		if($single == TRUE){
			$this->db->limit(1);
			$method = "row_array";
		} else {
			$method = "result_array";
		}
		$query = $this->db->get();
		return $query->$method(); 
	}

	public function get_kerusakan($id_lab, $kolom) {
		/*select * from tbl_lab l inner join 
		tbl_meja m on l.id_lab = m.id_lab
		where l.id_lab = 19
		*/
		$this->db->select($kolom)->get('tbl_lab');
		$this->db->join('tbl_meja','tbl_lab.ID_lab = tbl_meja.ID_lab','inner');
	}
}