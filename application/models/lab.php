<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lab extends CI_Model {

	public function save($data,$id=FALSE) {
		if ($id == FALSE) {
			$this->db->set($data)->insert("tbl_lab");
			return $this->db->insert_id();
		} else {
			$this->db->where('ID_lab',$id);
			$this->db->set($data);
			$this->db->update('tbl_lab');
			

		}
	}
	public function get() {
		$this->db->select("*")->from('tbl_lab');
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function get_kerusakan($id_lab, $kolom){
		/*select k.* from tbl_lab l inner join 
		tbl_meja m on l.id_lab = m.id_lab
		inner join tbl_kerusakan k on k.id_meja = m.id_meja 
		where l.id_lab = 17*/

		$this->db->select($kolom)->from('tbl_lab');
		$this->db->join('tbl_meja', 'tbl_lab.ID_Lab = tbl_meja.ID_Lab', 'inner');
		$this->db->join('tbl_kerusakan', 'tbl_kerusakan.ID_Meja = tbl_meja.ID_Meja', 'inner');

		if(is_array($id_lab)){
			$id_meja = array();

			foreach ($id_lab as $key => $value) {
				array_push($id_meja, $value['ID_meja']);	
			}
			$this->db->where_in('tbl_kerusakan.ID_Meja',$id_meja);
		} else {
			$this->db->where('tbl_lab.ID_Lab', $id_lab);
		}
		$this->db->order_by("tbl_kerusakan.ID_Kerusakan", "desc"); 
			$result = $this->db->get();
			return $result;
		
	}

	public function delete($id) {
		$this->db->where('ID_lab', $id);
		$this->db->delete('tbl_lab');
	}
}