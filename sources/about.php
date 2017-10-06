<?php 
 if(!defined('_source')) die("Error");
 
	$d->setTable('about');
	$d->select("ten,noidung,luotxem,mota");
	if($d->num_rows()>0){
		$row = $d->fetch_array();
			$noidung_ten= $row['ten'];
			$noidung_gioithieu= $row['mota'];
		$noidung_about= $row['noidung'];
			$luotxem= $row['luotxem'];
		$title_bar=$row['ten'].' - ';	
	
	}
		
		# Cap nhat so lan xem
		$sql_lanxem = "UPDATE #_about SET luotxem=luotxem+1  WHERE id =1";
			$d->query($sql_lanxem);
	// thanh tieu de


	$d->reset();
	$sql_seo = "select * from #_module where hienthi=1 and id=2";
	$d->query($sql_seo);
	$row_detail = $d->fetch_array();
	$title_bar .= $row_detail['ten'].'-' ;
	$h1_custom=$row_detail['h1'];
	$h2_custom=$row_detail['h2'];
	$h3_custom=$row_detail['h3'];
    $title_tcat =$row_detail['ten'];
    $title_custom = $row_detail['title'];
    $keywords_custom = $row_detail['keywords'];
    $description_custom = $row_detail['description'];				
?>