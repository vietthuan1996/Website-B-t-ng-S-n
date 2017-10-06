<div style="margin-top:150px "></div>
<!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.php">Trang Chủ</a></li>
                <li  class="active"><a href="tin-tuc.html">Tin Tức</a></li>
                <li class="active"><?= $tintuc_detail[0]['ten'] ?></li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Content -->
                <div class="col-md-8 col-sm-8">
                    <section id="content">
                    <?php if(count($tintuc_detail) > 0)
                        {
                            foreach ($tintuc_detail as $key => $tinchitiet) {
                            
                         ?>
                        <article class="blog-post">
                            <header><h2><?= $tinchitiet['ten'] ?></h2></header>
                            <figure class="meta">
                                <i class="fa fa-calendar"> Ngày đăng : </i> <?= $tinchitiet['ngaytao'] ?>
                            </figure>
                            <p>
                                <div class="chitiet">
                                    <?= $tinchitiet['noidung'] ?>
                                </div>
                            </p>
                        </article><!-- /.blog-post-listing -->
                        <?php } ?>
                        <?php } ?>
                    </section><!-- /#content -->
                    <section id="comments">
                        <header><h2 class="no-border">Bài viết khác</h2></header>
                        <ul class="comments">
                        <?php if(count($tintuc_khac) > 0)
                        {
                            foreach ($tintuc_khac as $key => $tinkhac) {
                            
                         ?>
                            <li class="comment">
                                <figure>
                                    <div class="image">
                                        <img alt="" src="<?= _upload_tintuc_l.$tinkhac['thumb'] ?>" width=50px height=100px>
                                    </div>
                                </figure>
                                <div class="comment-wrapper">
                                    <div class="name pull-left"><?= $tinkhac['ten'] ?></div>
                                    <div style="float: left;">
                                    <span class="fa fa-calendar"></span> <?= $tinkhac['ngaytao'] ?>
                                    </div><br><br>
                                    <div style="float: left;">
                                    <p>
                                        
                                       <?=catchuoi(strip_tags($tinkhac['mota']),255)?> 
                                    </p>
                                    </div>
                                    <div style="float: left;">
                                    <a href="tin-tuc/<?= $tinkhac['tenkhongdau'] ?>.html" class="reply"><span class="fa fa-reply"></span>Xem Chi Tiết</a>
                                    </div><br><br>
                                </div>
                            </li>
                            <?php } ?>
                            <?php } ?>
                        </ul>
                    </section><!-- /#comments -->
                    
                </div><!-- /.col-md-9 -->
                <!-- end Content -->
                <div class="col-md-3 col-sm-3">
                    <?php include ("templates/layout/right.php") ?>
            </div><!-- /.row -->
                <!-- sidebar -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
