<?php  if(!defined('_source')) die("Error");
	$d->reset();
	$sql_tuyendung = "select noidung from #_noiquy";
	$result=$d->query($sql_tuyendung);
	
	$rows_tuyendung=mysql_fetch_assoc($result);
	$title_bar .= "Nội quy dành cho cha mẹ học sinh - ";
?>