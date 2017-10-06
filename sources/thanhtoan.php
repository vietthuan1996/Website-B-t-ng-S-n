<?php  if(!defined('_source')) die("Error");		
	// thanh tieu de
	$title_bar .= "Thanh toán - ";
	
	if(!empty($_POST)){
		
		$hoten=$_POST['ten'];
		$dienthoai=$_POST['dienthoai'];
		$diachi=$_POST['diachi'];
		$email=$_POST['email'];
		$noidung=$_POST['noidung'];		
		
		//validate dữ liệu
	
	$hoten = trim(strip_tags($hoten));
	$dienthoai = trim(strip_tags($dienthoai));	
	$diachi = trim(strip_tags($diachi));	
	$email = trim(strip_tags($email));	
	$noidung = trim(strip_tags($noidung));	

	if (get_magic_quotes_gpc()==false) {
		$hoten = mysql_real_escape_string($hoten);
		$dienthoai = mysql_real_escape_string($dienthoai);
		$diachi = mysql_real_escape_string($diachi);
		$email = mysql_real_escape_string($email);
		$noidung = mysql_real_escape_string($noidung);						
	}
	$coloi=false;		
	if ($hoten == NULL) { 
		$coloi=true; $error_hoten = "Bạn chưa nhập họ tên<br>";
	} 
	if ($dienthoai == NULL) { 
		$coloi=true; $error_dienthoai = "Bạn chưa nhập điện thoại<br>";
	}
	if ($diachi == NULL) { 
		$coloi=true; $error_diachi = "Bạn chưa nhập địa chỉ<br>";
	}	
	
	if ($email == NULL) { 
		$coloi=true; $error_email = "Bạn chưa nhập email<br>";
	}elseif (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE) { 
		$coloi=true; $error_email="Bạn nhập email không đúng<br>";
	}
		
	if ($coloi==FALSE) {
										
			 $body.='<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1; padding:5px;" width="100%">';
			if(is_array($_SESSION['cart']))
			{
            	$body.='<tr bgcolor="#075992"><td align="center" style="font-weight:bold;color:#FFF">STT</td><td style="font-weight:bold;color:#FFF">Tên</td><td align="center" style="font-weight:bold;color:#FFF">Giá</td><td align="center" style="font-weight:bold;color:#FFF">Số lượng</td><td align="center" style="font-weight:bold;color:#FFF">Tổng giá</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];					
					$pname=get_product_name($pid);					
					if($q==0) continue;
            		$body.='<tr bgcolor="#FFFFFF"><td width="10%" align="center">'.($i+1).'</td>';
            		$body.='<td width="29%">'.$pname;				
					$body.='</td>';
                    $body.='<td width="20%">'.number_format(get_price($pid),0, ',', '.').'&nbsp;VNĐ</td>';
                    $body.='<td width="14%">'.$q.'</td>';                 
                    $body.='<td>'.number_format(get_price($pid)*$q,0, ',', '.') .'&nbsp;VNĐ</td>
                    </tr>
					<br/>';
				}
				$body.='<tr><td colspan="5">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
              <td style="text-align:left;"> '; 
               $body.=' <strong>Tổng giá bán:'. number_format(get_order_total(),0, ',', '.') .' &nbsp;VNĐ</strong></td>
              <td colspan="5" align="right">&nbsp;</td>
             </tr>
             </table>   
                </td></tr>';
            }
			else{
				$body.='<tr bgColor="#FFFFFF"><td>There are no items in your shopping cart!</td>';
			}
       $body.='</table>';
  			
			$mahoadon=strtoupper (ChuoiNgauNhien(6));
			$ngaydangky=time();
			$tonggia=get_order_total();
			
			$sql = "INSERT INTO  table_donhang (madonhang,hoten,dienthoai,diachi,email,httt,tonggia,noidung,donhang,ngaytao,trangthai ) 
				  VALUES ('$mahoadon','$hoten','$dienthoai','$diachi','$email','$httt','$tonggia','$noidung','$body','$ngaydangky','1')";	
			mysql_query($sql) or die(mysql_error());
			$iduser = mysql_insert_id();
										
					include_once "phpmailer/class.phpmailer.php";
					//Khởi tạo đối tượng
					$mail = new PHPMailer();
					//Thiet lap thong tin nguoi gui va email nguoi gui
					$mail->IsSMTP(); // Gọi đến class xử lý SMTP
					$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
					$mail->Host       = "116.193.76.20";     // Thiết lập thông tin của SMPT
					$mail->Username   = 'info@ruoubuoinhanhoa.com'; // SMTP account username
					$mail->Password   = 'GyWS7Vwa';            // SMTP account password
					$mail->SetFrom($row_setting['email'],$row_setting['ten']);
					
					//Thiết lập thông tin người nhận
					$mail->AddAddress($row_setting['email'],$row_setting['ten']);
					
					//Thiết lập email nhận email hồi đáp
					//nếu người nhận nhấn nút Reply
					$mail->AddReplyTo($row_setting['email'],$row_setting['ten']);

										
					$thongtinnguoidat='<b>THÔNG TIN NGƯỜI ĐẶT</b><br/>';
					$thongtinnguoidat.='<b>Họ tên: </b>'.$hoten.'<br/>';
					$thongtinnguoidat.='<b>Điện thoại: </b>'.$dienthoai.'<br/>';
					$thongtinnguoidat.='<b>Email: </b>'.$email.'<br/>';
					$thongtinnguoidat.='<b>Địa chỉ: </b>'.$diachi.'<br/>';
					$thongtinnguoidat.='<b>THÔNG TIN ĐƠN HÀNG</b><br/>';
					/*=====================================
					 * THIET LAP NOI DUNG EMAIL
					 *=====================================*/
					
					//Thiết lập tiêu đề
					$mail->Subject    = "Có đặt hàng mới từ website ruoubuoinhanhoa.com";
					
					//Thiết lập định dạng font chữ
					$mail->CharSet = "utf-8";
					
					$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
					
					//Thiết lập nội dung chính của email
					$mail->MsgHTML($thongtinnguoidat.$body);
					
					if(!$mail->Send()) {
								 echo "Có lỗi xảy ra!";
					} else {
								 
								transfer("Gửi đơn hàng thành công!<br/>", "index.php");	
					}	
							
			
			
	}
	
	}
?>