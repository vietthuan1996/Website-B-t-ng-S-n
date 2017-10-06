<?php  if(!defined('_source')) die("Error");
	$d->setTable('khuyenmai');
	$d->select("ten,noidung,luotxem,h1,h2,h3,title,description,keywords");
	if($d->num_rows()>0){
		$row = $d->fetch_array();
			$noidung_ten= $row['ten'];
		$noidung_about= $row['noidung'];
			$luotxem= $row['luotxem'];

	}
		
		# Cap nhat so lan xem
		$sql_lanxem = "UPDATE #_about SET luotxem=luotxem+1  WHERE id =1";
			$d->query($sql_lanxem);
	// thanh tieu de
	

				$d->reset();
	$sql_seo = "select * from #_module where hienthi=1 and id=6";
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