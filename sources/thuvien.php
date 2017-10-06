<?php  if(!defined('_source')) die("Error");

		if(isset($_GET['id'])){
		
		#tin tuc chi tiet
		$id =  addslashes($_GET['id']);
		$sql = "select ten,mota,noidung,id_item,urlfile  from #_thuvien where hienthi=1 and id='".$id."'";
		$d->query($sql);
		$tintuc_detail = $d->result_array();
		$title_bar=$tintuc_detail[0]['ten'].' - ';
		
		#các tin cu hon
		$sql_khac = "select ten,id from #_thuvien where hienthi=1 and id <>'".$id."' and id_item = '".$tintuc_detail[0]['id_item']."' order by stt,ngaytao desc limit 0,5";
		$d->query($sql_khac);
		$tintuc_khac = $d->result_array();
		}elseif(isset($_GET['idc'])){
		
		$id =  addslashes($_GET['idc']);
		
		$sql="select ten from #_thuvien_item where id='$id'";
		$d->query($sql);
		$loaitin_detail = $d->result_array();
		
		
		$sql_tintuc = "select ten,mota,photo,id from #_thuvien where id_item='$id' and hienthi=1  order by stt,ngaytao desc";
		$d->query($sql_tintuc);
		$tintuc = $d->result_array();
		
		$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
		$url="index.php?com=thuvien";
		$maxR=8;
		$maxP=5;
		$paging=paging($tintuc, $url, $curPage, $maxR, $maxP);
		$tintuc=$paging['source'];
		
		}

	
	
?>