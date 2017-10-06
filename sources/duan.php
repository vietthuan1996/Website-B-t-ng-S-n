<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id'])){
	#tin tuc chi tiet
	$id =  addslashes($_GET['id']);

	$sql_lanxem = "UPDATE #_duan SET luotxem=luotxem+1  WHERE id ='".$id."'";
	$d->query($sql_lanxem);
			
	$sql = "select ten,mota,noidung from #_duan where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$tintuc_detail = $d->result_array();
	$title_bar=$tintuc_detail[0]['ten'].' - ';
	#các tin cu hon
	$sql_khac = "select ten,tenkhongdau,ngaytao,id from #_duan where hienthi=1 and id <'".$id."' order by stt,ngaytao desc limit 0,5";
	$d->query($sql_khac);
	$tintuc_khac = $d->result_array();
}else{
	$title_bar='Dự án & Công trình - ';		
	$title_tcat='Dự án & Công trình';	
	$sql_tintuc = "select ten,tenkhongdau,mota,thumb,id,ngaytao,luotxem from #_duan where hienthi=1 order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=$row_setting['tintuc'];
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
}
?>