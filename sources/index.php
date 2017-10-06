<?php  if(!defined('_source')) die("Error");

		if(!empty($_POST)){
				//tiếp nhận dữ liệu		
				$hoten = $_POST['ten'];
				$diachi = $_POST['diachi'];
				$email = $_POST['email'];
				$dienthoai=$_POST['dienthoai'];
				$loaixe=$_POST['loaixe'];
					$titlek = $_POST['title'];
				//validate dữ liệu
				$hoten = trim(strip_tags($hoten));
				$email = trim(strip_tags($email));
				$dienthoai = trim(strip_tags($dienthoai));
					$diachi = trim(strip_tags($diachi));
	
				$loaixe = trim(strip_tags($loaixe));
					
				$ngaydangky =time();	
				if (get_magic_quotes_gpc()==false) {
					$hoten = mysql_real_escape_string($hoten);
					$email = mysql_real_escape_string($email);
					$dienthoai = mysql_real_escape_string(dienthoai);
						$diachi = mysql_real_escape_string(diachi);
							$loaixe = mysql_real_escape_string(loaixe);
				
				}
				$coloi=false;		
				if ($hoten == NULL) { 
					$coloi=true; $error_hoten = "<br>Bạn chưa nhập họ tên";
				} 	
				if ($email == NULL) { 
					$coloi=true; $error_email = "<br>Bạn chưa nhập email";
				} 				
				if ($dienthoai == NULL) { 
					$coloi=true; $error_dienthoai = "<br>Bạn chưa nhập điện thoại";
				}
				if ($diachi == NULL) { 
					$diachi=true; $error_diachi = "<br>Bạn chưa nhập địa chỉ";
				}					
								
				if ($coloi==FALSE) {
				
					$subject = "Thư ".$titlek." từ website".$row_setting['website'];
			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư '.$titlek.' từ website hondaconghoavn.com</th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Họ tên :</th><td>'.$_POST['ten'].'</td>
				</tr>
				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
				</tr>
					<tr>
					<th>Địa chỉ :</th><td>'.$_POST['diachi'].'</td>
				</tr>
				<tr>
					<th>Email :</th><td>'.$_POST['email'].'</td>
				</tr>
				
				<tr>
					<th>Loại xe :</th><td>'.$_POST['loaixe'].'</td>
				</tr>';
			$body .= '</table>';
						include_once "phpmailer/class.phpmailer.php";
//Khởi tạo đối tượng
$mail = new PHPMailer();
//Thiet lap thong tin nguoi gui va email nguoi gui
$mail->IsSMTP(); // Gọi đến class xử lý SMTP
$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
$mail->Host       = "103.1.236.16";     // Thiết lập thông tin của SMPT
$mail->Username   = 'dangky@hondaconghoavn.com'; // SMTP account username
$mail->Password   = 'R2eGJvVm';            // SMTP account password
$mail->SetFrom($row_setting['email'],$row_setting['ten']);

//Thiết lập thông tin người nhận
$mail->AddAddress($row_setting['email'],$row_setting['ten']);

//Thiết lập email nhận email hồi đáp
//nếu người nhận nhấn nút Reply
$mail->AddReplyTo($row_setting['email'],$row_setting['ten']);

/*=====================================
 * THIET LAP NOI DUNG EMAIL
 *=====================================*/

//Thiết lập tiêu đề
$mail->Subject    = "Thư ".$title." từ website hondaconghoavn.com ";

//Thiết lập định dạng font chữ
$mail->CharSet = "utf-8";

$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";

//Thiết lập nội dung chính của email
$mail->MsgHTML($body);

if(!$mail->Send()) {
 			 transfer( "Có lỗi xảy ra!","index.html");
} else {
			 /*$sql = "INSERT INTO  table_yeucau (ten,ngaydang,dienthoai,email,website,congty,noidung) 
					  VALUES ('$hoten','$ngaydangky','$dienthoai','$email','$website','$congty','$noidung')";	
				mysql_query($sql) or die(mysql_error());*/
			transfer("Gửi đăng ký thành công!<br/>", getCurrentPageURL());	
}
				
	
				}
						}
	$d->reset();
	$sql_seo = "select * from #_module where hienthi=1 and id=1";
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



	$d->reset();
	$sql="select ten,tenkhongdau,id,thumb,photo,mota,ngaytao,luotxem from #_news where hienthi =1 and tinnoibat>0 order by stt,id desc limit 0,2";
	$d->query($sql);
	$row_news=$d->result_array();

	$d->reset();
	$sql="select table_product.tenkhongdau AS tenkhongdaup,table_product_list.tenkhongdau AS tenkhongdaul,table_product.photo as photop,gia,table_product.ten as tenp,dientich,phongngu,phongtam,nhadexe,diachi,table_product.thumb as thumbp
		from table_product, table_product_list
		where table_product.hienthi =1 and table_product.noibat>0 and table_product.id_list = table_product_list.id 
		order by table_product.stt,table_product.id 
		desc limit 0,4";
	$d->query($sql);
	$r_product_hot=$d->result_array();	

	$d->reset();
	$sql="select table_product.tenkhongdau AS tenkhongdaup,table_product_list.tenkhongdau AS tenkhongdaul,table_product.photo as photop,gia,table_product.ten as tenp,dientich,phongngu,phongtam,nhadexe,diachi,table_product.thumb as thumbp
		 from table_product,table_product_list where table_product.hienthi =1 and table_product.spbc > 0 and table_product.id_list = table_product_list.id 
		 order by table_product.stt,table_product.id 
		  limit 0,4";
	$d->query($sql);
	$r_product_new_one=$d->result_array();

	$d->reset();
	$sql="select table_product.tenkhongdau AS tenkhongdaup,table_product_list.tenkhongdau AS tenkhongdaul,table_product.photo as photop,gia,table_product.ten as tenp,dientich,phongngu,phongtam,nhadexe,diachi,table_product.thumb as thumbp
		 from table_product,table_product_list where table_product.hienthi =1 and table_product.spbc > 0 and table_product.id_list = table_product_list.id 
		 order by table_product.stt,table_product.id 
		  limit 4,4";
	$d->query($sql);
	$r_product_new_two=$d->result_array();

	$d->reset();
	$sql="select ten,tenkhongdau,id,thumb from #_service where hienthi =1 and noibat>0 order by stt,id desc limit 0,4";
	$d->query($sql);
	$row_service=$d->result_array();
?>