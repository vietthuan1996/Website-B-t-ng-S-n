<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "faq/items";
		break;
	case "add":
		get_list();
		$template = "faq/item_add";
		break;
	case "edit":		
		get_item();		
		$template = "faq/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_cat":
		get_cats();
		$template = "faq/cats";
		break;
	case "add_cat":		
		$template = "faq/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "faq/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	default:
		$template = "index";
}

function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}


function get_items(){
	global $d, $items, $paging;
		
	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_faq where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_faq SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_faq SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	$sql = "select * from #_faq ";	
	$sql.=" order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=faq&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=faq&act=man");
	
	$sql = "select * from #_faq where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=faq&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,8);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=faq&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		$data['id_item'] = (int)$_POST['id_item'];		
		$data['hoten'] = $_POST['hoten'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['email'] = $_POST['email'];
		$data['diachi'] = $_POST['diachi'];		
		$data['noidung'] = $_POST['noidung'];
		$data['traloi'] = $_POST['traloi'];		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		
		$d->setTable('faq');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=faq&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=faq&act=man");
	}else{
		$data['id_item'] = (int)$_POST['id_item'];			
		$data['hoten'] = $_POST['hoten'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['email'] = $_POST['email'];
		$data['diachi'] = $_POST['diachi'];		
		$data['noidung'] = $_POST['noidung'];
		$data['traloi'] = $_POST['traloi'];		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;	
		
		$d->setTable('faq');
		if($d->insert($data))
			redirect("index.php?com=faq&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=faq&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$d->reset();		
		$sql = "delete from #_faq where id='".$id."'";
		$d->query($sql);

		
		if($d->query($sql))
			redirect("index.php?com=faq&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=faq&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_faq where id='".$id."'";
				$d->query($sql);
			
		}redirect("index.php?com=faq&act=man");}else transfer("Không nhận được dữ liệu", "index.php?com=faq&act=man");
}
#====================================

function get_cats(){
	global $d, $items, $paging;
	
	$sql = "select * from #_faq_item";
		
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where id_cat=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by stt";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=faq&act=man_cat";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=faq&act=man_cat");
	
	$sql = "select * from #_faq_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=faq&act=man_cat");
	$item = $d->fetch_array();	
}

function save_cat(){
	global $d;
	$file_name_item=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=faq&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){					
		$data['ten'] = $_POST['ten'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('faq_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=faq&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=faq&act=man_cat");
	}else{			
		$data['ten'] = $_POST['ten'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('faq_item');
		if($d->insert($data))
			redirect("index.php?com=faq&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=faq&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		echo "id:".$id;
		$d->reset();		
		$sql = "delete from #_faq_item where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=faq&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=faq&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=faq&act=man_cat");
}
?>

	
