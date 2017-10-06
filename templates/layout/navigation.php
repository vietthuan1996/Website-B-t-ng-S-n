


 <?php
    $d->reset();
    $sql_banner_giua = "select photo from #_photo where com='banner_top' order by id desc";
    $d->query($sql_banner_giua);
    $row_banner_giua = $d->result_array();      
    ?>


<div class="navigation">
        <div class="secondary-navigation">
            <div class="container">
                <div class="contact">
                    <figure><strong><i class="fa fa-phone-square fa-2x"  aria-hidden="true"></i></strong><a href="tel:<?=$row_setting['hotline']?>" ><?= $row_setting['hotline']?></a></figure>
                    <figure><strong><i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i></strong><?= $row_setting['email']?></figure>
                    <figure style="margin-left: 50px">
                         <form role="form" name=frm id="form-contact" method="get" action="index.php"  class="clearfix">
                         <div class="form-group">
                            <input type="hidden" name="com" value="tim-kiem">
                            <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Xin mời tìm kiếm !!! " required style="width: 400px;position: relative;border-radius: 5px">
                            <button  type="submit" class="btn pull-right btn-default" id="form-contact-submit" style="position: absolute;top: 0;right: 0" >Tìm Kiếm</button>
                        </div><!-- /.form-group -->
                            
                         </form>
                    </figure>
                </div>
                <div class="user-area">
                    <div class="actions">
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square " aria-hidden="true"></i>Yêu cầu tư vấn online</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <header class="navbar" id="top" role="banner">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <a href="index.html"><img src="<?=_upload_hinhanh_l.$row_banner_giua[0]['photo']?>" alt="<?=$row_setting['ten']?>" width=94px height=27px ></a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="active has-child"><a href="index.html">Trang Chủ</a>
                        </li>
                        <li class="has-child"><a href="gioi-thieu.html">Giới Thiệu</a>
                        </li>
                        <li class="has-child"><a href="can-ho.html">Căn Hộ</a>
                        </li>
                        <li class="has-child"><a href="biet-thu.html">Biệt Thự</a>
                        </li>
                        <li><a href="nha-pho.html">Nhà Phố</a></li>
                        <li class="has-child"><a href="dat-nen.html">Đất Nền</a>
                        </li>
                        <li><a href="tin-tuc.html">Tin Tức</a></li>
                        <li><a href="lien-he.html">Liên Hệ</a></li>
                    </ul>
                </nav><!-- /.navbar collapse-->
            </header><!-- /.navbar -->
        </div><!-- /.container -->
    </div><!-- /.navigation -->






<?php 


if(!empty($_POST)){
            include_once _lib."C_email.php";
            $data['ten'] = $_POST['form-contact-name'];
            $data['diachi'] = $_POST['form-contact-adress'];
            $data['dienthoai'] = $_POST['form-contact-phone'];         
            $data['ngaytao'] = time();
            
            
            $subject = "Thư liên hệ từ ".$data['ten'];
            $body = '<table>';
            $body .= '
                <tr>
                    <th colspan="2">&nbsp;</th>
                </tr>
                <tr>
                    <th colspan="2">Yêu cầu tư vấn online của khách hàng từ website batdongsan.com</th>
                </tr>
                <tr>
                    <th colspan="2">&nbsp;</th>
                </tr>
                <tr>
                    <th>Họ tên :</th><td>'.$_POST['form-contact-name'].'</td>
                </tr>
                
                <tr>
                    <th>Điện thoại :</th><td>'.$_POST['form-contact-phone'].'</td>
                </tr>
                <tr>
                    <th>Email :</th><td>'.$_POST['form-contact-email'].'</td>
                </tr>
                
                ';
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
} 
else 
{
            ?>
            <script>
                alert('Gửi Yêu Cầu Thành Công !, Xin Cảm Ơn !!!');
                location.href='index.html';
            </script>
            <?php 
}   
}
    
?>





    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Đăng Ký Tư Vấn Online</h4>
        </div>
        <form action="" method="post">
        <div class="modal-body">
          
            <div class="form-group">
            <label for="form-contact-name">Họ và tên<em>*</em></label>
            <input type="text" class="form-control" id="form-contact-name" name="form-contact-name" required>
            </div><!-- /.form-group -->
            <div class="form-group">
            <label for="form-contact-email"> Email<em>*</em></label>
            <input type="email" class="form-control" id="form-contact-email" name="form-contact-email" required>
            </div><!-- /.form-group -->
            <div class="form-group">
            <label for="form-contact-phone"> Số điện thoại<em>*</em></label>
            <input type="text" class="form-control" id="form-contact-phone" name="form-contact-phone" required>
            </div><!-- /.form-group -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-default">Đăng Ký</button>
        </div>
         </form>
      </div>
      
    </div>
  </div>