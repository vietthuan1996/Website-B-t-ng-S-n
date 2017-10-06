<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_duyetbl();
		$template = "gopy/duyetbl";
		break;
	case "delete":
		delete_binhluan();
		$template = "gopy/duyetbl";
		break;
	default:
		$template = "index";
}
function get_duyetbl(){
	global $d, $items, $paging;	
	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_gopy where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_gopy SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_gopy SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	$sql = "select * from #_gopy";	
	$sql.=" order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=gopy&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}
function delete_binhluan(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$sql = "delete from #_gopy where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=gopy&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=gopy&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_gopy where id='".$id."'";
				$d->query($sql);
			
		}redirect("index.php?com=gopy&act=man");}else transfer("Không nhận được dữ liệu", "index.php?com=gopy&act=man");
}

?>

	
