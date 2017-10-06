<div style="margin-top:150px "></div>
<!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.php">Trang Chủ</a></li>
                <li> <a href="<?= $row_detail['tenkhongdaul'] ?>.html" ><?= $row_detail['tenl']  ?></a></li>
                <li class="active">Chi Tiết</li>
                <li class="active"><?= $row_detail['tenp']  ?></li>

            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Property Detail Content -->
                <div class="col-md-9 col-sm-9">
                    <section id="property-detail">
                        <header class="property-title">
                            <h1><?= $row_detail['tenp']  ?></h1>
                            <figure> <strong> Địa Chỉ :</strong> <?= $row_detail['diachi']  ?></figure>
                        </header>
                        <div>
                            <img src="<?= _upload_product_l.$row_detail['photop'] ?>" width=848px height=428px >
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <section id="quick-summary" class="clearfix">
                                    <header><h2>Tóm Tắt Nhanh</h2></header>
                                    <dl>
                                        <dt>Địa Chỉ: </dt>
                                            <dd> <?=$row_detail['diachi']?> </dd>
                                        <dt>Giá:</dt>
                                            <dd><span class="tag price"><?= $row_detail['gia']  ?></span></dd>
                                        <dt>Kiểu:</dt>
                                            <dd><?= $row_detail['kieu']  ?></dd>
                                        <dt>Tình Trạng:</dt>
                                            <dd><?= $row_detail['tinhtrang']  ?></dd>
                                        <dt>Diện tích:</dt>
                                            <dd><?= $row_detail['dientich']  ?> m<sup>2</sup></dd>
                                        <dt>Phòng ngủ:</dt>
                                            <dd><?= $row_detail['phongngu']  ?></dd>
                                        <dt>Phòng tắm:</dt>
                                            <dd><?= $row_detail['phongtam']  ?></dd>
                                        <dt>Nhà để xe:</dt>
                                            <dd><?= $row_detail['nhadexe']  ?></dd>
                                    </dl>
                                </section><!-- /#quick-summary -->
                            </div><!-- /.col-md-4 -->
                            <div class="col-md-8 col-sm-12">
                                <section id="description">
                                    <header><h2>Mô Tả</h2></header>
                                    <p>
                                        <div class="chitiet">
                                        <?= $row_detail['mota']  ?>
                                        </div>
                                    </p>
                                </section><!-- /#description -->
                                <section id="property-features">
                                    <header><h2><?= $row_detail['tieude1']  ?></h2></header>
                                        <p>
                                        <div class="chitiet">
                                             <?= $row_detail['chitiet1']  ?>
                                        <div>
                                        </p>
                                </section><!-- /#property-features -->
                                <section id="floor-plans">
                                    <div class="floor-plans">
                                        <header><h2><?= $row_detail['tieude2']  ?></h2></header>
                                        <p>
                                           <?= $row_detail['chitiet2']  ?> 
                                        </p>
                                    </div>
                                </section><!-- /#floor-plans -->
                                <section id="property-map">
                                    <header><h2><?= $row_detail['tieude3']  ?></h2></header>
                                    <p>
                                      <?= $row_detail['chitiet3']  ?>  
                                    </p>
                                </section><!-- /#property-map -->
                                
                            <div class="col-md-12 col-sm-12">
                                <section id="contact-agent">
                                    <header><h2>Liên Hệ Với Chúng Tôi</h2></header>
                                    <div class="row">
                                        <section class="agent-form">
                                            <div class="col-md-12 col-sm-12">
                                                <aside class="agent-info clearfix">
                                                    <div class="agent-contact-info">
                                                        <h3><?= $row_setting['ten']  ?></h3>
                                                        <dl>
                                                            <dt>Hotline:</dt>
                                                            <dd><?= $row_setting['hotline']  ?></dd>
                                                            <dt>Email:</dt>
                                                            <dd><a href="mailto:#"><?= $row_setting['email']  ?></a></dd>
                                                            <dt>Facebook:</dt>
                                                            <dd><a href="#"><?= $row_setting['facebook']  ?></a></dd>
                                                        </dl>
                                                    </div>
                                                </aside><!-- /.agent-info -->
                                            </div><!-- /.col-md-7 -->
                                        </section><!-- /.agent-form -->
                                    </div><!-- /.row -->
                                </section><!-- /#contact-agent -->
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </section><!-- /#property-detail -->
                </div><!-- /.col-md-9 -->
                <!-- end Property Detail Content -->

                <!-- sidebar -->
                <div class="col-md-3 col-sm-3">
                    <?php include ("templates/layout/right.php") ?>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
