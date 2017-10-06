<?php  if(!defined('_source')) die("Error");

	
		
		if(isset($_GET['idc'])){
		
		$id =  addslashes($_GET['idc']);
		$sql="select ten,id from #_hinhanh_item where id='$id' limit 0,1 ";
		$d->query($sql);
		$loaitin=$d->result_array();
		$title_bar=$loaitin[0]['ten'].' - ';
		$title_tcat=$loaitin[0]['ten'];
	
		$sql_hinhanh="select ten,thumb,photo from #_hinhanh where hienthi =1 and id_item='".$loaitin[0]['id']."' order by stt,id desc";
		$d->query($sql_hinhanh);
		$tintuc=$d->result_array();
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
		$url=getCurrentPageURL();
		$maxR=$row_setting['hinhalbum'];
		$maxP=5;
		$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
		$tintuc=$paging['source'];		
		
	
		
	}
	else{
		$title_bar='Album ảnh - ';		
		$title_tcat='Album ảnh';	
		$sql="select ten,tenkhongdau,id,thumb,ngaytao,mota,luotxem from #_hinhanh_item where hienthi=1 order by stt,id desc";	
		$d->query($sql);
		$tintuc = $d->result_array();
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
		$url=getCurrentPageURL();
		$maxR=$row_setting['albumanh'];
		$maxP=5;
		$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
		$tintuc=$paging['source'];		
	
	}		
				
?>