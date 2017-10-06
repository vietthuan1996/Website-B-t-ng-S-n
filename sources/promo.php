<?php  if(!defined('_source')) die("Error");

		@$idc =  addslashes($_GET['idc']);
		@$idi =  addslashes($_GET['idi']);
		@$id=  addslashes($_GET['id']);
		#các sản phẩm khác======================
		$sql_sanphamkhac = "select id,thumb,photo,id_item,ten,maso,giaban,mota,id_cat from #_product where hienthi=1 and khuyenmai>0 and id <> '".$id."' and id_item in (select id from #_product_item where id_cat='1') order by stt,ngaytao desc limit 6";
		$d->query($sql_sanphamkhac);
		$sanpham_khac = $d->result_array();

		$sql_detail = "select id,photo,id_item,ten,mota,thumb,maso,giaban,noidung from #_product where hienthi=1 and id='".$id."'";
		$d->query($sql_detail);
		$row_detail = $d->fetch_array();
		
		if($idc!='')
		{
		$sql = "select id,thumb,photo,id_item,ten,mota,id_cat from #_product where hienthi=1 and id_item='".$idc."'  order by id desc";
		}
		
		else{
		$sql = "select *  from #_product where hienthi=1 and khuyenmai>0 and id_item in (select id from #_product_item where id_cat='1')";
		if(!empty($_POST)&& $_REQUEST['act']=='find')
		{
		$ten=trim($_POST['ten']);
		$sql.=" and ten like'%$ten'";
		}
		$sql.=" order by id desc";
		}
		$d->query($sql);
		$product = $d->result_array();
		$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
		$url="index.php?com=product&idc=".$idc;
		$maxR=12;
		$maxP=4;
		$paging=paging($product, $url, $curPage, $maxR, $maxP);
		$product=$paging['source'];
	
			
?>