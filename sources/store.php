<?php  if(!defined('_source')) die("Error");

		
		$sql_tintuc = "select * from #_chinhanh  order by stt ";
		$d->query($sql_tintuc);
		$tintuc = $d->result_array();						
		$title_bar='Hệ thống cửa hàng - ';
		
	
	
?>