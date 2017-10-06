<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "setting/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}

function get_gioithieu(){
	global $d, $item;

	$sql = "select * from #_setting limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
		
	$data['title'] = $_POST['title'];
	$data['keywords'] = $_POST['keywords'];
	$data['description'] = $_POST['description'];
	$data['hotline'] = $_POST['hotline'];
	$data['h1'] = $_POST['h1'];
	$data['h2'] = $_POST['h2'];
	$data['h3'] = $_POST['h3'];
	$data['support'] = $_POST['support'];
	$data['ten'] = $_POST['ten'];
	$data['dienthoai'] = $_POST['dienthoai'];
	$data['diachi'] = $_POST['diachi'];
	$data['toado'] = $_POST['toado'];
	$data['email'] = $_POST['email'];
	$data['slogan'] = $_POST['slogan'];
	$data['slogan2'] = $_POST['slogan2'];
	$data['website'] = $_POST['website'];
	$data['facebook'] = $_POST['facebook'];
	$data['twitter'] = $_POST['twitter'];
	$data['google'] = $_POST['google'];
	$data['youtube'] = $_POST['youtube'];
	
	$d->reset();
	$d->setTable('setting');
	if($d->update($data))
		header("Location:index.php?com=setting&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=setting&act=capnhat");
}

?>