<?php  if(!defined('_source')) die("Error");

		if(isset($_GET['id'])){
		#tin tuc chi tiet
		$id =  addslashes($_GET['id']);
		$sql = "select ten,mota,noidung,ngaytao,title,keywords,description from #_service where hienthi=1 and tenkhongdau='".$id."'";
		$d->query($sql);
		$tintuc_detail = $d->result_array();
		$title_bar=$tintuc_detail[0]['ten'].' - ';
		$title_custom=$tintuc_detail[0]['title'];
		$keywords_custom=$tintuc_detail[0]['keywords'];
		$description_custom=$tintuc_detail[0]['description'];
		
		
		#các tin cu hon
		$sql_khac = "select ten,tenkhongdau,ngaytao,id from #_service where hienthi=1 and tenkhongdau <>'".$id."' order by stt,ngaytao desc limit 0,5";
		$d->query($sql_khac);
		$tintuc_khac = $d->result_array();
		}elseif(isset($_GET['idi'])){
			
			$id =  addslashes($_GET['idi']);
			$sql="select tenkhongdau,ten,id from #_service_cat where id='$id' limit 0,1 ";
			$d->query($sql);
			$loaitin=$d->result_array();
			$title_bar=$loaitin[0]['ten'].' - ';	
			$title_tcat=$loaitin[0]['ten'];
			
			$sql_tintuc = "select ten,tenkhongdau,mota,thumb,id from #_service where hienthi=1 and id_cat='".$loaitin[0]['id']."' order by stt,ngaytao desc";
			$d->query($sql_tintuc);
			$tintuc = $d->result_array();
			$tongsanpham=count($tintuc);
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();	
			$maxR=10;
			$maxP=2;
			$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
			$tintuc=$paging['source'];	
			
		}elseif(isset($_GET['idc'])){
			$id =  addslashes($_GET['idc']);
			$sql="select tenkhongdau,ten,id,title,keywords,description from #_service_list where tenkhongdau='$id' limit 0,1 ";
			$d->query($sql);
			$loaitin=$d->result_array();
			$title_bar=$loaitin[0]['ten'].' - ';	
			$title_tcat=$loaitin[0]['ten'];
			
			$title_custom=$loaitin[0]['title'];
			$keywords_custom=$loaitin[0]['keywords'];
			$description_custom=$loaitin[0]['description'];
		
			
			$sql_tintuc = "select ten,tenkhongdau,mota,thumb,id from #_service where hienthi=1 and id_list='".$loaitin[0]['id']."' order by stt,ngaytao desc";
			$d->query($sql_tintuc);
			$tintuc = $d->result_array();
			$tongsanpham=count($tintuc);
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();	
			$maxR=10;
			$maxP=2;
			$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
			$tintuc=$paging['source'];	
			
			
		}else{
			
		$title_bar='Dịch vụ - ';
		$title_tcat='Dịch vụ';
			
		$sql_tintuc = "select ten,tenkhongdau,mota,thumb,id from #_service where hienthi=1  order by stt,ngaytao desc";
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