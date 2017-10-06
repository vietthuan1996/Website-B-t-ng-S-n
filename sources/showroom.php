
<?php if(!defined('_source')) die("Error");
		$title_bar .= "Showroom - ";
		
				$d->reset();
			$sql_showroom = "select noidung from #_showroom ";
			$d->query($sql_showroom);
			$company_showroom = $d->fetch_array();
	
?>