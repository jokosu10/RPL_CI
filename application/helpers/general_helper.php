<?php
	/**
	 * Preformatted print_r()
	 */
	function dpr() {
		$args = func_get_args();
		echo "<pre>";
		foreach ($args as $k => $v) {
			echo "dpr".($k + 1).":\n";
			print_r($v);
			echo "\n";
		}
		echo "</pre>";
	}
	
	/**
	 * Preformatted var_dump()
	 */
	function mpr() {
		$args = func_get_args();
		echo "<pre>";
		foreach ($args as $k => $v) {
			echo "mpr".($k + 1).":\n";
			var_dump($v);
			echo "\n";
		}
		echo "</pre>";
	}
	
	/**
	 * Preformatted dd var_dump()
	 */
	function dd() {
		$args = func_get_args();
		echo "<pre>";
		foreach ($args as $k => $v) {
			echo "dd".($k + 1).":\n";
			var_dump($v);
			echo "\n";
		}
		echo "</pre>";
		
		exit();
	}
	
	
	
	
	/* function generate_pdf($object, $filename='', $direct_download=TRUE) 
	{
		require_once("../third_party/dompdf/dompdf_config.inc.php");
		//
		$dompdf = new DOMPDF();
		$dompdf->load_html($object);
		$dompdf->render();
		//
		if ($direct_download == TRUE)
			$dompdf->stream($filename);
		else
			return $dompdf->output();
	} */
?>