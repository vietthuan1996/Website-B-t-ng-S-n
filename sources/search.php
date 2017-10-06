<?php  if(!defined('_source')) die("Error");
			
		if(isset($_GET['keyword'])){
			$tukhoa =  $_GET['keyword'];
			$tukhoa = trim(strip_tags($tukhoa));    	
    		if (get_magic_quotes_gpc()==false) {
    			$tukhoa = mysql_real_escape_string($tukhoa);    			
    		}								
			$title_tcat='Kết quả tìm kiếm';
			
			
			
			$sql = "select ten,gia,id,tenkhongdau,thumb,photo,masp,giakm,spbc from #_product where (ten LIKE '%$tukhoa%') and  hienthi=1 and gia>0  order by gia";
		$d->query($sql);
		$product1 = $d->result_array();

		$sql1="select ten,gia,id,tenkhongdau,thumb,photo,masp,giakm,spbc from #_product where (ten LIKE '%$tukhoa%') and hienthi=1 and gia=0 order by id desc";		
		$d->query($sql1);		
		$product2 = $d->result_array();
			
			
			$product = array_merge($product1, $product2);
			
			
			
			
			
			
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=24;
			$maxP=2;
			$paging=paging_home($product, $url, $curPage, $maxR, $maxP);
			$product=$paging['source'];
		}									
?>