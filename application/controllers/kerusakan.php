<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kerusakan extends CI_Controller {

	public function lab($id=FALSE)
	{
		$this->load->model(array('lab','meja'));
		$data['lab'] = $this->lab->get();
		

		if($id == TRUE) {
			$data["meja"] = $this->meja->get($id);
			$id_meja = $this->meja->get_id_meja($id)->result_array();

	
			//$data['kerusakan'] = $this->lab->get_kerusakan($id,'Keterangan_Kerusakan')->row()->Keterangan_Kerusakan;			
			$data['detail_kerusakan'] = $this->lab->get_kerusakan($id_meja,'tbl_kerusakan.ID_Meja, 
				Keterangan_Kerusakan,Tgl_Kerusakan,Keterangan_Perbaikan,Tgl_Selesai')->result();
		}

		$data['content'] = $this->load->view('view_lab',$data,true) ;
		$this->load->view('main',$data);	
		
	}
	public function form(){ //input kerusakan user
		$this->load->model(array("m_kerusakan","meja"));
		$keterangan = $this->input->post("keterangan");
		$id_meja	= $this->input->post("id");
		$id_lab	= $this->input->post("id_lab");
		$tgl = date("Y-m-d");
		$id_user = $this->session->userdata("id_user");
		$data	= array("Keterangan_Kerusakan"=>$keterangan,"Tgl_Kerusakan"=>$tgl,"ID_User"=>$id_user,"ID_Meja"=>$id_meja);
		$this->m_kerusakan->save($data);
		$this->meja->save(array("Status"=>1),$id_meja);
		redirect(site_url("kerusakan/lab/" . $id_lab));
	}

	public function form_teknisi() { //update kerusakan
		$this->load->model(array("m_kerusakan","meja"));
		$keterangan = $this->input->post("keterangan");
		$id_meja	= $this->input->post("id");
		$id_lab	= $this->input->post("id_lab");
		$tgl = date("Y-m-d");
		$id_user = $this->session->userdata("id_user");
		$data	= array("Keterangan_Perbaikan"=>$keterangan,"Tgl_Selesai"=>$tgl);
		$kerusakan = $this->m_kerusakan->get(array("ID_Meja"=>$id_meja),TRUE,"ID_Kerusakan DESC");
		$this->m_kerusakan->save($data,$kerusakan['ID_Kerusakan']);
		$this->meja->save(array("Status"=>0),$id_meja);
		redirect(site_url("kerusakan/lab/" . $id_lab));
	}

	public function view_history($id){
		$data["lab"] = $this->lab->get($id);
		$data['content'] = $this->load->view('view_history_kerusakan','',true);
		$this->load->view('main',$data);	
	}
}