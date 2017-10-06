<div style="margin-top:150px "></div>

<!--<script type="text/javascript" src="admin/media/scripts/my_script.js"></script>
<script type="text/javascript">
function js_submit(){
    if(isEmpty(document.getElementById('form-contact-name'), "Xin nhập Họ tên.")){
        document.getElementById('form-contact-name').focus();
        return false;
    }

    
    if(isEmpty(document.getElementById('form-contact-email'), "Xin nhập Email.")){
        document.getElementById('form-contact-email').focus();
        return false;
    }
    if(isEmpty(document.getElementById('form-contact-phone'), "Xin nhập Số Điện Thoại.")){
        document.getElementById('form-contact-phone').focus();
        return false;
    }
    if(isEmpty(document.getElementById('form-contact-message'), "Xin nhập Thông Điệp.")){
        document.getElementById('form-contact-message').focus();
        return false;
    }

    
    document.frm.submit();
}
</script>
-->
<!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.php">Trang Chủ</a></li>
                <li class="active">Liên Hệ</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Contact -->
                <div class="col-md-9 col-sm-9">
                    <section id="agent-detail">
                        <header><h1>Liên Hệ</h1></header>
                        <section id="contact-information">
                            <div class="row">
                                <div class="col-md-4 col-sm-5">
                                    <section id="address">
                                        <header><h3>Địa Chỉ</h3></header>
                                        <address>
                                           <strong><?= $row_setting['ten'] ?></strong><br>
                                            <?= $row_setting['diachi'] ?>
                                        </address>
                                        <strong>Hotline: <?= $row_setting['hotline'] ?></strong><br><br>
                                        <a href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i> <?= $row_setting['email'] ?></a><br><br>
                                    </section><!-- /#address -->
                                    <section id="social">
                                        <header><h3>Mạng xã hội</h3></header>
                                        <div class="agent-social">
                                            <a href="<?= $row_setting['twitter'] ?>" class="fa fa-twitter btn btn-grey-dark"></a>
                                            <a href="<?= $row_setting['facebook'] ?>" class="fa fa-facebook btn btn-grey-dark"></a>
                                            <a href="<?= $row_setting['youtube'] ?>" class="fa fa-youtube btn btn-grey-dark"></a>
                                        </div>
                                    </section><!-- /#social -->
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-8 col-sm-7">
                                    <header><h3>Đường Đi</h3></header>
                                    <div id="contact-map">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d979.5744607414475!2d106.61784188004631!3d10.864935927353624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752a1a04bf29af%3A0x7766591243fdf190!2zVMOibiBDaMOhbmggSGnhu4dwIDE4LCBUw6JuIENow6FuaCBIaeG7h3AsIFF14bqtbiAxMiwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2sin!4v1502426565931" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                </div><!-- /.col-md-8 -->
                            </div><!-- /.row -->
                        </section><!-- /#agent-info -->
                        <hr class="thick">
                        <section id="form">
                            <header><h3>Liên hệ với chúng tôi</h3></header>
                            <form role="form" name=frm id="form-contact" method="post" action=""  class="clearfix">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="form-contact-name">Họ và tên<em>*</em></label>
                                            <input type="text" class="form-control" id="form-contact-name" name="form-contact-name" required>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="form-contact-email"> Email<em>*</em></label>
                                            <input type="email" class="form-control" id="form-contact-email" name="form-contact-email" required>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="form-contact-phone"> Số điện thoại<em>*</em></label>
                                            <input type="text" class="form-control" id="form-contact-phone" name="form-contact-phone" required>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="form-contact-adress"> Địa Chỉ<em>*</em></label>
                                            <input type="text" class="form-control" id="form-contact-adress" name="form-contact-adress" required>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form-contact-message">Thông điệp<em>*</em></label>
                                            <textarea class="form-control" id="form-contact-message" rows="8" name="form-contact-message" required></textarea>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->
                                <div class="form-group clearfix">
                                    <button  type="submit" class="btn pull-right btn-default" id="form-contact-submit" >Gửi tin nhắn</button>
                                </div><!-- /.form-group -->
                                <div id="form-status"></div>
                            </form><!-- /#form-contact -->
                        </section>
                    </section><!-- /#agent-detail -->
                </div><!-- /.col-md-9 -->
                <!-- end Contact -->

                <!-- sidebar -->
                <div class="col-md-3 col-sm-3">
                    <?php  include ("templates/layout/right.php") ?>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
