<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";


if(isset($_POST["cb_item"])){
		$chkid = $_POST["cb_item"];
		
		if($file = upload_image("file", 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF', _upload_file,$file_name)){
		$data['file'] = $file;
		}
		
		
		include_once "../phpmailer/class.phpmailer.php";	
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = "120.72.99.70"; // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Host       = "120.72.99.70";     // Thiết lập thông tin của SMPT
		$mail->Username   = "support@hotboysbakery.com"; // SMTP account username
		$mail->Password   = "123qwe";            // SMTP account password

		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom('support@hotboysbakery.com','Hotboys Bakery');

		//Thiết lập thông tin người nhận
		//$mail->AddAddress($company_contact[0]['email'], $_POST['name']);

		
		$n = count($chkid);
		for($i=0; $i<$n; $i++ )
		{
			$id =  themdau($chkid[$i]);
			$d->reset();
			$sql = "select email from #_email_dk where id='".$chkid[$i]."'";
			/*$d->query($sql);
			$email= $d->result_array();
			echo $email[0]['email'];*/
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					echo "Thư được gửi đến: ".$row['email'];
				$mail->AddAddress($row['email'], $company_mail['title']);
				}
			}

		} 
		
		//Thiết lập tiêu đề
		$mail->Subject    = "[Hotboys Bakery] - ".$_POST['tieude'];
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	
		
		$body .= str_replace('\"','"', $_POST['noidung_email']);

		
		$mail->Body = $body;
		
		if($data['file']){
		$mail->AddAttachment(_upload_file.$data['file']);
		}
		
		if($mail->Send())
		transfer("Email đã được gửi đi.", "index.php?com=email_dk&act=man");
		else
		transfer("Hệ thống bị lỗi, xin thử lại sau.", "index.php?com=email_dk&act=man");

		
	}


switch($act){
	case "man":
		get_items();
		$template = "email_dk/items";
		break;
	case "add":
		$template = "email_dk/item_add";
		break;
	case "edit":
		get_item();
		$template = "email_dk/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
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
	
	if(@$_REQUEST['update']!='')
	{
	$id_up = @$_REQUEST['update'];
	
	$tinnoibat=time();
	
	$sql_sp = "SELECT id,tinnoibat FROM table_email_dk where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['tinnoibat'];
	//echo "id:". $spdc1;
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_email_dk SET tinnoibat ='".$tinnoibat."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_email_dk SET tinnoibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	
	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	
	
	$sql_sp = "SELECT id,hienthi FROM table_email_dk where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_email_dk SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_email_dk SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	
	
	
	$sql = "select * from #_email_dk order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=email_dk&act=man";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=email_dk&act=man");
	
	$sql = "select * from #_email_dk where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=email_dk&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,8);
	$file_email_dk=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=email_dk&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);

		// du lieu
		$data['email'] = $_POST['email'];
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('email_dk');
		$d->setWhere('id', $id);
		if($d->update($data))
				header("Location:index.php?com=email_dk&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=email_dk&act=man");
	}else{
		
		$data['email'] = $_POST['email'];
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('email_dk');
		if($d->insert($data))
			header("Location:index.php?com=email_dk&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=email_dk&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		// xoa hinh anh
		$d->reset();
		$sql = "select id from #_email_dk where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_email_dk.$row['photo']);
			}
			$sql = "delete from #_email_dk where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			header("Location:index.php?com=email_dk&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=email_dk&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=email_dk&act=man");
}
?>

	
