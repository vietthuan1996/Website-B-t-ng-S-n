<?php  if(!defined('_source')) die("Error");

		if(isset($_GET['id'])){
		#tin tuc chi tiet
		$id =  addslashes($_GET['id']);
		$sql = "select ten,mota,noidung,ngaytao from #_news where hienthi=1 and id='".$id."'";
		$d->query($sql);
		$tintuc_detail = $d->result_array();
		$title_bar=$tintuc_detail[0]['ten'].' - ';
		#các tin cu hon
		$sql_khac = "select ten,tenkhongdau,ngaytao,id from #_news where hienthi=1 and id <>'".$id."' and id_item=2 order by stt,ngaytao desc limit 0,5";
		$d->query($sql_khac);
		$tintuc_khac = $d->result_array();
		}else{
			
		$title_bar='Tư vấn - ';
		$title_tcat='Tư vấn';
			
		$sql_tintuc = "select ten,tenkhongdau,mota,thumb,id from #_news where hienthi=1 and id_item=2  order by stt,ngaytao desc";
		$d->query($sql_tintuc);
		$tintuc = $d->result_array();
		
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
		$url=getCurrentPageURL();
		$maxR=10;
		$maxP=5;
		$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
		$tintuc=$paging['source'];
		
		}

	
	
?>