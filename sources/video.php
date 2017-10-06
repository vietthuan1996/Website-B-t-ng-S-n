<?php  if(!defined('_source')) die("Error");

	$title_bar='Video clip - ';		
	$title_tcat='Video clip';		
	$sql_tintuc = "select ten,photo,link from #_video where hienthi=1  order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=10;
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];

?>