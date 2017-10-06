<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id'])){
	#tin tuc chi tiet
	$id =  addslashes($_GET['id']);

	$sql_lanxem = "UPDATE #_news SET luotxem=luotxem+1  WHERE tenkhongdau ='".$id."'";
	$d->query($sql_lanxem);
			
	$sql = "select ten,mota,noidung,ngaytao,title,h1,h2,h3,keywords,description from #_news where hienthi=1 and tenkhongdau='".$id."'";
	$d->query($sql);
	$tintuc_detail = $d->result_array();

	$title_bar=$tintuc_detail[0]['ten'].' - ';

	$h1_custom=$row_detail['h1'];
	$h2_custom=$row_detail['h2'];
	$h3_custom=$row_detail['h3'];


	$title_custom=$tintuc_detail[0]['title'];
	$keywords_custom=$tintuc_detail[0]['keywords'];
	$description_custom=$tintuc_detail[0]['description'];
	#các tin cu hon
	$sql_khac = "select ten,tenkhongdau,ngaytao,id,thumb,mota,ngaytao,luotxem,photo from #_news where hienthi=1 and tenkhongdau <>'".$id."' order by stt,ngaytao desc limit 0,5";
	$d->query($sql_khac);
	$tintuc_khac = $d->result_array();
}else{
		//tin tuc tiep theo
	$sql_tintuc = "select ten,tenkhongdau,mota,ngaytao,thumb from #_news where hienthi=1 and tinnoibat = 0 order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	//phan trang

	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=3;
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];

		/// tin tuc o dau trang
	$d->reset();
	$sql_tintuc_noibat = " select photo,ten,mota,ngaytao,tenkhongdau,thumb from table_news where hienthi = 1 and tinnoibat > 0 limit 0,1";
	$d->query($sql_tintuc_noibat);
	$tintuc_noibat = $d->result_array();


	$d->reset();
	$sql_seo = "select * from #_module where hienthi=1 and id=7";
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
}
?>