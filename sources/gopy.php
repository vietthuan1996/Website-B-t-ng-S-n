<?php if(!defined('_source')) die("Error");
		$title_bar .= "Góp ý - ";
		if(!empty($_POST)){			
			$data['ten'] = $_POST['ten'];
			$data['diachi'] = $_POST['diachi'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['email'] = $_POST['email'];			
			$data['noidung'] = $_POST['noidung'];	
			$data['hienthi'] = '0';					
			$data['ngaytao'] = time();
			
			$d->setTable('gopy');
		if($d->insert($data))
			transfer("Thông tin góp ý đã được gửi", "gop-y.html");
		else
			transfer("Lưu dữ liệu bị lỗi", "gop-y.html");
				
		}
		$d->reset();
	$sql_cauhoi = "select ten,email,noidung  from #_gopy where hienthi=1 order by id desc";
	$d->query($sql_cauhoi);	
	$rows_cauhoi=$d->result_array();
		
		$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
		$url=getCurrentPageURL();
		$maxR=10;
		$maxP=5;
		$paging=paging($rows_cauhoi, $url, $curPage, $maxR, $maxP);
		$tintuc=$paging['source'];
	
?>