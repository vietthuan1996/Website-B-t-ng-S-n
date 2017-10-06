<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);
	
	$d->reset();
	$sql_setting = "select * from #_setting limit 0,1";
	$d->query($sql_setting);
	$row_setting= $d->fetch_array();
	
	$title_custom='';
	$keywords_custom='';
	$description_custom='';
	
	
	switch($com){

		case 'cat1':
				$source = "cat1";
				$template = "product";					
		break;	
		case 'cat2':
				$source = "cat2";
				$template = "product";					
		break;
		case 'cat3':
				$source = "cat3";
				$template = "cat3";					
		break;	
		
		case 'bang-gia-xe':
			$source = "banggia";
			$template ="banggia";
			break;
			
		case 'tuyen-dung':
			$source = "tuyendung";
			$template ="tuyendung";
			break;
			
		case 'khuyen-mai':
			$source = "khuyenmai";
			$template ="khuyenmai";
			break;
		
		

		
		case 'download':
			$source = "download";
			$template ="download";
			break;
			
		case 'gioi-thieu':
			$source = "about";
            $template ="about";
			break;
		case 'dich-vu':
			$source = "dichvu";
			$template = isset($_GET['id']) ? "dichvu_detail" : "dichvu";			
			break;

		case 'can-ho':
			$source = "canho";
			$template =isset($_GET['id']) ? "chitietsanpham" : "canho";			
			break;
		case 'biet-thu':
			$source = "bietthu";
			$template =isset($_GET['id']) ? "chitietsanpham" : "bietthu";	
			break;
		case 'nha-pho':
			$source = "nhapho";
			$template =isset($_GET['id']) ? "chitietsanpham" : "nhapho";	
			break;
		case 'dat-nen':
			$source = "datnen";
			$template =isset($_GET['id']) ? "chitietsanpham" : "datnen";	
			break;	
		case 'tin-tuc':
			$source = "news";
			$template = isset($_GET['id']) ? "tintuc_chitiet" : "tintuc";
			break;

		case 'lien-he':
			$source = "contact";
			$template = "contact";
			break;
		
		case 'tim-kiem':
			$source = "timkiem";
			$template = "timkiem";
			break;
		case 'gio-hang':
			$source = "giohang";
			$template = "giohang";
			break;	
		case 'thanh-toan':
			$source = "thanhtoan";
			$template = "thanhtoan";
			break;		
		case 'xe':
			$source = "product";
			$template =isset($_GET['id']) ? "product_detail" : "product";
			break;
			
		default: 
			$source = "index";
			$template = "index";
			break;
	}
	
	if($source!="") include _source.$source.".php";
	
	if($_REQUEST['com']=='logout')
	{
	session_unregister($login_name);
	header("Location:index.php");
	}		
?>