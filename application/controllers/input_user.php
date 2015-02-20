<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input_user extends CI_Controller {

	public function input_data_user()
	{
		$this->form_validation->set_rules("nm_user","Nama_User","required");
		$this->form_validation->set_rules("status_user","Status_User","required");
		$this->form_validation->set_rules("user_pass","Pass_User","required");
		$this->form_validation->set_rules("confrim_pass","Confrim User","required|matches[user_pass]");
		if ($this->form_validation->run() == FALSE ) {
			$this->load->model('user');
			$data['user'] = $this->user->get();
			$data['content'] = $this->load->view('form_input_user',$data,true) ;
			$this->load->view('main',$data);
		} else {
			if ($this->input->post('id') == '') {
				$this->load->model('user');
				$nm_user = $this->input->post("nm_user");
				$status_user = $this->input->post("status_user");
				$user_pass = $this->input->post("user_pass");
				$data = array("Nama_User"=>$nm_user,"Status_User"=>$status_user,"Pass_User"=>$user_pass
					);
				$id_user = $this->user->save($data);
				?>
					<script type="text/javascript">
						alert( "Data User Berhasil Di Tambahkan");
						document.location.href = "<?php echo base_url();?>index.php/Input_user/input_data_user";
					</script>
				<?php
			} else {
				$id = $this->input->post('id'); 
				$this->load->model('user');
				$nm_user = $this->input->post("nm_user");
				$status_user = $this->input->post("status_user");
				$user_pass = $this->input->post("user_pass");
				$data = array("Nama_User"=>$nm_user,"Status_User"=>$status_user,"Pass_User"=>$user_pass
					);
				$id_user = $this->user->save($data,$id);
				?>
				<script type="text/javascript">
						alert( "Data User Berhasil Di Ubah");
						document.location.href = "<?php echo base_url();?>index.php/Input_user/input_data_user";
				</script>
				<?php
			}

		}			
	}

	public function hapus($id)
	{
		$this->load->model('user');
		$this->user->delete($id);
		redirect('Input_user/input_data_user');
	}
}

