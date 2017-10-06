<?php  if(!defined('_source')) die("Error");
if(isset($_GET['idc'])){
	
	
	
	
	$id =  addslashes($_GET['idc']);						
	$sql="select title,keywords,description,tenkhongdau,ten,id from #_product_list where tenkhongdau='$id' limit 0,1 ";			
	$d->query($sql);
	$loaitin=$d->result_array();
	
	$title_bar=$loaitin[0]['ten'].' - ';	
	$title_tcat=$loaitin[0]['ten'];
	
	$title_custom=$loaitin[0]['title'];
	$keywords_custom=$loaitin[0]['keywords'];
	$description_custom=$loaitin[0]['description'];
	
	
		$sql = "select ten,gia,id,tenkhongdau,mota,thumb,masp,giakm,spbc from #_product where hienthi =1  and id_list='".$loaitin[0]['id']."'  order by stt asc";
		$d->query($sql);
    $product = $d->result_array();


		

	
	$tongsanpham=count($tintuc);
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();	
	$maxR=24;
	$maxP=2;
	$paging=paging_home($product, $url, $curPage, $maxR, $maxP);
	$product=$paging['source'];	
}
?>