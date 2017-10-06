<?php  if(!defined('_source')) die("Error");
	
		@$idc =  addslashes($_GET['idc']);
		
		if($idc!='')
		{
		$sql="select ten,id from #_product_kynang where tenkhongdau='$idc' limit 0,1 ";
		$d->query($sql);
		$loaitin=$d->result_array();
		$title_bar=$loaitin[0]['ten'].' - ';
		$title_tcat=$loaitin[0]['ten'];
		
		$idc=$loaitin[0]['id'];
		$sql = "select ten,tenkhongdau,thumb,giaban,id from #_product where hienthi=1 and id_kynang='".$loaitin[0]['id']."'  order by id desc";
		$d->query($sql);
		$product = $d->result_array();
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=16;
			$maxP=5;
			$paging=paging_home($product, $url, $curPage, $maxR, $maxP);
			$product=$paging['source'];
		
			
		}
			
?>