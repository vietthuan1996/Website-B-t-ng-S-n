<?php  if(!defined('_source')) die("Error");
			
		if(isset($_POST['maso'])){
			$tukhoa =  $_POST['maso'];
			$tukhoa = trim(strip_tags($tukhoa));    	
    		if (get_magic_quotes_gpc()==false) {
    			$tukhoa = mysql_real_escape_string($tukhoa);    			
    		}								
			// cac tin tuc
			$sql_tintuc = "select * from #_solienlac where maso='$tukhoa' order by id desc";			
			$d->query($sql_tintuc);
			$product = $d->result_array();	
			
			if(count($product) !=1)			$tb='<span style="color:#F00;">Không tìm thấy mã số này.</span>';
		}									
?>