
<?php if(!defined('_source')) die("Error");
					$d->reset();
	$sql_seo = "select * from #_module where hienthi=1 and id=8";
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

		if(!empty($_POST)){
			include_once _lib."C_email.php";
			$data['ten'] = $_POST['form-contact-name'];
			$data['diachi'] = $_POST['form-contact-adress'];
			$data['dienthoai'] = $_POST['form-contact-phone'];
			$data['email'] = $_POST['form-contact-email'];
			$data['noidung'] = $_POST['form-contact-message'];			
			$data['ngaytao'] = time();
			
			
			$subject = "Thư liên hệ từ ".$row_setting['title'];
			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư liên hệ từ website batdongsan.com</th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Họ tên :</th><td>'.$_POST['form-contact-name'].'</td>
				</tr>
				<tr>
					<th>Địa chỉ :</th><td>'.$_POST['form-contact-adress'].'</td>
				</tr>
				<tr>
					<th>Điện thoại :</th><td>'.$_POST['form-contact-phone'].'</td>
				</tr>
				<tr>
					<th>Email :</th><td>'.$_POST['form-contact-email'].'</td>
				</tr>
				<tr>
					<th>Nội dung :</th><td>'.$_POST['form-contact-message'].'</td>
				</tr>';
			$body .= '</table>';
			
					include_once "mail/class.phpmailer.php";
					require 'mail/PHPMailerAutoload.php';
					//Khởi tạo đối tượng
					$mail = new PHPMailer();
					//Thiet lap thong tin nguoi gui va email nguoi gui
					$mail->IsSMTP(); // Gọi đến class xử lý SMTP
					$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
					$mail->Host       = "smtp.gmail.com";     // Thiết lập thông tin của SMPT
					$mail->Username   = 'thuanit1996@gmail.com'; // SMTP account username
					$mail->Password   = 'lanhvietthuan1996';            // SMTP account password
					$mail->SetFrom('thuanit1996@gmail.com','Trang Web Bat Dong San');


					//Thiết lập thông tin người nhận
                   // $truyvanemail = "SELECT email FROM table_donhang WHERE madonhang = '$mahoadon'";
                    //$ketqua = mysql_query($truyvanemail);
                    //if(mysql_num_rows($ketqua) >0)
                    //{
                      //  $d = mysql_fetch_array($ketqua);
                   // }

					$mail->AddAddress('lanhvietthuan1996@gmail.com');
					
					//Thiết lập email nhận email hồi đáp
					//nếu người nhận nhấn nút Reply
					$mail->AddReplyTo($data['email'],$data['ten']);

/*=====================================
 * THIET LAP NOI DUNG EMAIL
 *=====================================*/

//Thiết lập tiêu đề
$mail->Subject    = "Thông tin liên hệ";

//Thiết lập định dạng font chữ
$mail->CharSet = "utf-8";

$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";

//Thiết lập nội dung chính của email
$mail->MsgHTML($body);

if(!$mail->Send()) {
 			 transfer( "Có lỗi xảy ra!","index.html");
} else {
			 
			transfer("Gửi liên hệ thành công!<br/>", "index.html");	
}	
		}
				$d->reset();
			$sql_contact = "select noidung from #_lienhe ";
			$d->query($sql_contact);
			$company_contact = $d->fetch_array();
	
?>