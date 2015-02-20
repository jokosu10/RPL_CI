<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules("nm_user","Nama_User","required");
		$this->form_validation->set_rules("pass_user","Pass_User","required|callback_cek_pass");
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("login");
		} else {
			$nm_user=$this->input->post("nm_user");
			$pass=$this->input->post("pass_user");
			$user = $this->user->get_by(array("Nama_User"=>$nm_user,"Pass_User"=>$pass),TRUE);
			$this->session->set_userdata(array("id_user"=>$user["ID_User"],"nm_user"=>$user['Nama_User'],"Status_User"=>$user['Status_User']));
			redirect("main");
		}
	}
	function cek_pass($pass){
		$this->load->model('user');
		$nm_user = $this->input->post("nm_user");
		$user = $this->user->get_by(array("Nama_User"=>$nm_user,"Pass_User"=>$pass));
		if(count($user) > 0){
			return true;
		} else {
			$this->form_validation->set_message("cek_pass","Username atau password salah.");
			return false;
		}
	}
	function logout(){
		session_destroy();
		redirect(base_url());
	}
	

}