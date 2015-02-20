<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input_lab extends CI_Controller {

	public function input_data_lab()
	{
		$this->form_validation->set_rules("nm_lab","Nama Lab","required");
		$this->form_validation->set_rules("total_meja_lab","Total Meja Lab","required");
		if ($this->form_validation->run() == FALSE ) {
			$this->load->model(array('lab','meja'));
			$data['lab'] = $this->lab->get();
			$data['content'] = $this->load->view('form_input_lab',$data,true) ;
			$this->load->view('main',$data);
		} else {
			if ($this->input->post('id') == '') {
				$this->load->model('lab');
				$nm_lab = $this->input->post("nm_lab");
				$total_meja_lab = $this->input->post("total_meja_lab");
				$data = array("Nama_lab"=>$nm_lab,"Total_meja"=>$total_meja_lab
					);
				$id_lab = $this->lab->save($data);
				$this->load->model('meja');
				for ($i=1; $i<=$total_meja_lab; $i++) { 
					$data = array("ID_lab"=>$id_lab,"NoUrut_meja"=>$i);
					$this->meja->save($data);
					
				} 
				?>
					<script type="text/javascript">
						alert( "Data Laboratorium Berhasil Di Tambahkan");
						document.location.href = "<?php echo base_url();?>index.php/Input_lab/input_data_lab";
					</script>
				<?php
			} else {
				$id = $this->input->post('id'); 
				$this->load->model('lab');
				$this->load->model('meja');
				$nm_lab = $this->input->post("nm_lab");
				$total_meja_lab = $this->input->post("total_meja_lab");
				$data = array("Nama_lab"=>$nm_lab,"Total_meja"=>$total_meja_lab);
				$id_lab = $this->lab->save($data,$id);
				$jml_update = $this->meja->cek_insert_meja($id,$total_meja_lab);
				if ($jml_update > 0){
					for ($i=1; $i<=$jml_update; $i++) { 
					$data = array("ID_lab"=>$id,"NoUrut_meja"=>$i);
					$this->meja->save($data);
					
				}
				}
				?>
				<script type="text/javascript">
						alert( "Data Laboratorium Berhasil Di Ubah");
						document.location.href = "<?php echo base_url();?>index.php/Input_lab/input_data_lab";
				</script>
				<?php
			}

		}			
	}

	public function hapus($id)
	{
		$this->load->model('lab');
		$this->lab->delete($id);
		redirect('Input_lab/input_data_lab');
	}
	public function pdf()
	{
	$this->load->library('CI_Pdf');

	$data['content'] = $this->load->view('form_input_lab',$data,true) ;
	$html = $this->load->view('main',$data);
	$this->CI_Pdf->pdf_create($html, "tes.pdf");
	}
}

