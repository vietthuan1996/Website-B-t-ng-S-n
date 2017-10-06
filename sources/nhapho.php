<?php  if(!defined('_source')) die("Error");

		@$idl =  addslashes($_GET['idl']);
		@$idc =  addslashes($_GET['idc']);
		@$idi =  addslashes($_GET['idi']);
		@$id=  addslashes($_GET['id']);				
		
		if($id!=''){
		# Cap nhat so lan xem
		$sql_lanxem = "UPDATE #_product SET luotxem=luotxem+1  WHERE tenkhongdau ='".$id."'";
			$d->query($sql_lanxem);
		

						
		$d->reset();
		$sql_detail = "select table_product_list.ten as tenl,table_product.ten as tenp,diachi,table_product.photo as photop,gia,kieu,tinhtrang,dientich,phongngu,phongtam,nhadexe,mota,tieude1,chitiet1,tieude2,chitiet2,tieude3,chitiet3,table_product_list.tenkhongdau as tenkhongdaul
			from table_product,table_product_list
			where table_product.id_list = table_product_list.id and table_product.hienthi=1 and table_product.tenkhongdau='".$id."'";
		$d->query($sql_detail);
		$row_detail = $d->fetch_array();
		
		
$h1_custom=$row_detail['h1'];
	$h2_custom=$row_detail['h2'];
	$h3_custom=$row_detail['h3'];
	
		$title_bar=$row_detail['ten'].' - ';	
		$title_custom=$row_detail['title'];
		$keywords_custom=$row_detail['keywords'];
		$description_custom=$row_detail['description'];
	
	
		$sql_hinhanh="select photo,thumb,ten from #_product_hinhanh where hienthi=1 and id_photo = '".$row_detail['id']."' order by stt,id desc";
		$d->query($sql_hinhanh);
		$row_hinhanhsp11 = $d->result_array();
								
		$d->reset();					
		$sql_sanphamkhac = "select * from #_product where hienthi=1 and tenkhongdau <>'".$id."' and id_list='".$row_detail['id_list']."' order by stt,ngaytao desc limit 0,8";
		$d->query($sql_sanphamkhac);
		$sanpham_khac = $d->result_array();				
		}else{
			

	
	
	$sql = "select * from #_product where hienthi=1 and id_list = 10  order by stt asc";
		$d->query($sql);
		$product_nhapho = $d->result_array();

	
			

		// san pham moi nhat nha pho
		$d->reset();
		$sql="select table_product.tenkhongdau AS tenkhongdaup,table_product_list.tenkhongdau AS tenkhongdaul,gia,table_product.ten as tenp,diachi,table_product.thumb as thumbp
		 from table_product,table_product_list where table_product.hienthi =1 and table_product.spbc > 0 and table_product.id_list = table_product_list.id and table_product.id_list = 10
		 order by table_product.stt,table_product.id 
		  limit 0,3";
	$d->query($sql);
	$r_product_newnhapho=$d->result_array();
	
	
	$tongsanpham=count($tintuc);
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();	
	$maxR=6;
	$maxP=5;
	$paging=paging_home($product_nhapho, $url, $curPage, $maxR, $maxP);
	$product_nhapho = $paging['source'];	
		

	$d->reset();
	$sql_seo = "select * from #_module where hienthi=1 and id=3";
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