<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id'])){
	#tin tuc chi tiet
	$id =  addslashes($_GET['id']);
	
	$sql_lanxem = "UPDATE #_news SET luotxem=luotxem+1  WHERE id ='".$id."'";
	$d->query($sql_lanxem);
	
	$sql = "select ten,mota,noidung from #_news where hienthi=1 and id='".$id."' and id_item=3 ";
	$d->query($sql);
	$tintuc_detail = $d->result_array();
	$title_bar=$tintuc_detail[0]['ten'].' - ';
	#các tin cu hon
	$sql_khac = "select ten,tenkhongdau,ngaytao,id from #_news where hienthi=1 and id <'".$id."' and id_item=3 order by stt,ngaytao desc limit 0,5";
	$d->query($sql_khac);
	$tintuc_khac = $d->result_array();
}else{
	$title_bar='Hoạt động - ';		
	$title_tcat='Hoạt động';	
	$sql_tintuc = "select ten,tenkhongdau,mota,thumb,id,ngaytao,luotxem from #_news where hienthi=1 and id_item=3  order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=$row_setting['hoatdong'];
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
}
?>