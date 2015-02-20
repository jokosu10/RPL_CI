<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {
	
	function __exportPdf($title, $header, $records){
		$data["title"] = $title;
		$data["header"] = $header;
		$data["records"] = $records;
		
		$this->load->library('html2pdf');
		$this->html2pdf->folder('./temp/');
		$this->html2pdf->filename(strtr($title, ' ', '_').'.pdf');
		$this->html2pdf->paper('a4', 'portrait');

		$this->html2pdf->html($this->load->view('p_pdf', $data, true));

	if($path = $this->html2pdf->create('save')) {
			return strtr($title, ' ', '_');
		}
	}

	function export_pdf(){
		$tgl_awal = $_POST['tgl_awal'];
		$tgl_ahkir = $_POST['tgl_ahkir'];
		$header = array('-', 'Nama Laboratorium', 'No Urut Meja', 'Kerusakan', 
			'Tgl Kerusakan', 'Perbaikan Kerusakan', 'Tgl Perbaikan');
		
		$query = "select 0 as a, l.Nama_Lab, m.NoUrut_meja, k.Keterangan_Kerusakan, k.Tgl_Kerusakan, k.Keterangan_Perbaikan, k.Tgl_Selesai from tbl_lab l inner join tbl_meja m on l.id_lab = m.id_lab inner join tbl_kerusakan k on k.id_meja = m.id_meja 
			where k.Tgl_Kerusakan >= '". $tgl_awal ."' AND k.Tgl_Selesai <= '". $tgl_ahkir ."' 
			order by k.Tgl_Kerusakan";

		$result = $this->db->query($query)->result();
		$a=$this->__exportPdf('Laporan Kerusakan', $header, $result);
		//echo $query;
		echo "<script> window.open('../../temp/". $a .".pdf');</script>";
		echo "<script>window.location.assign('laporan');</script>";
		
	}

	public function index(){
		$data['content'] = $this->load->view('view_report',array(),true) ;
		$this->load->view('main',$data);
		//$this->load->view('');
	}

}
