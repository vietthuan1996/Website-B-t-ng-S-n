<?php


if(!defined('_source')) die("Error");

	if(isset($_GET['keyword']))
	{
		/// truy van tim kiem
		$key = $_GET['keyword'];
		$d->reset();
		$sql_search = " SELECT table_product.ten AS tenp, diachi,kieu,dientich,phongngu,phongtam,gia,
						table_product.thumb AS thumbp,mota,table_product_list.tenkhongdau AS tenkhongdaul,table_product.tenkhongdau AS tenkhongdaup
						FROM table_product, table_product_list
						WHERE table_product.id_list = table_product_list.id 
						AND table_product.hienthi = 1
						AND table_product.ten LIKE '%$key%'";
		$d->query($sql_search);
		$product_ketqua = $d->result_array();

		/// dem so ket qua tim duoc

		$d->reset();
		$sql_dem = " SELECT table_product.id,COUNT(table_product.id) AS dem
						FROM table_product, table_product_list
						WHERE table_product.id_list = table_product_list.id 
						AND table_product.hienthi = 1
						AND table_product.ten LIKE '%$key%'";
		$d->query($sql_dem);
		$product_dem = $d->result_array();


	//phan trang
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();	
	$maxR=6;
	$maxP=5;
	$paging=paging_home($product_ketqua, $url, $curPage, $maxR, $maxP);
	$product_ketqua=$paging['source'];	


	}


	$sql_khac = "select ten,tenkhongdau,ngaytao,id,thumb,mota,ngaytao,luotxem,photo from #_news where hienthi=1 and tenkhongdau <>'".$id."' order by stt,ngaytao desc limit 0,5";
	$d->query($sql_khac);
	$tintuc_khac = $d->result_array();


 ?>