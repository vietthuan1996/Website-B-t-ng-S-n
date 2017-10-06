<div style="margin-top:160px "></div>
 <!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.php">Trang Chủ</a></li>
                <li class="active">Tin Tức</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Content -->
                <div class="col-md-9 col-sm-9">
                    <section id="content">
                        <header><h1>Tin Tức</h1></header>
                        <?php 
                        if(count($tintuc_noibat) > 0)
                        {
                            foreach ($tintuc_noibat as $key => $tinnoibat) {
                            
                         ?>
                        
                        <article class="blog-post">
                            <div style="float: left;margin-right:15px"><a href="tin-tuc/<?= $tinnoibat['tenkhongdau'] ?>.html"><img src="<?= _upload_tintuc_l.$tinnoibat['thumb'] ?>" width=150px height=150px></a></div>
                            <header><a href="tin-tuc/<?= $tinnoibat['tenkhongdau'] ?>.html"><h2><?= $tinnoibat['ten'] ?></h2></a></header>
                            <figure class="meta">
                                <i class="fa fa-calendar"></i> Ngày đăng : <?= $tinnoibat['ngaytao'] ?>
                            </figure>
                            <p>
                                <?= $tinnoibat['mota'] ?>
                            </p>
                            <div style="float: right;"><a href="tin-tuc/<?= $tinnoibat['tenkhongdau'] ?>.html" class="link-arrow">Xem Chi Tiết</a></div>
                        </article><!-- /.blog-post -->
                        <?php } ?>
                        <?php } ?>
                        <?php 
                        if(count($tintuc) > 0)
                        {
                            foreach ($tintuc as $key => $tin) {
                            
                         ?>
                        <article class="blog-post">
                        <div style="float: left;margin-right:15px"><a href="tin-tuc/<?= $tin['tenkhongdau'] ?>.html"><img src="<?= _upload_tintuc_l.$tin['thumb'] ?>" width=150px height=150px></a></div>
                            <header><a href="tin-tuc/<?= $tin['tenkhongdau'] ?>.html"><h2><?= $tin['ten'] ?></h2></a></header>
                            <figure class="meta">
                                <i class="fa fa-calendar"></i> Ngày đăng : <?= $tin['ngaytao'] ?>
                            </figure>
                            <p>
                               <?= $tin['mota'] ?>
                            </p>
                            <div style="float: right;"><a href="tin-tuc/<?= $tin['tenkhongdau'] ?>.html" class="link-arrow">Xem Chi Tiết</a></div>
                        </article><!-- /.blog-post -->
                        
                        <?php } ?>
                         <?php } ?>

                        <!-- Pagination -->
                        <div class="center">
                            <ul class="pagination">
                                <li class="active">
                                </li>
                                <li><?= $paging['paging'] ?></li>
                                
                            </ul><!-- /.pagination-->
                        </div><!-- /.center-->
                    </section><!-- /#content -->
                </div><!-- /.col-md-9 -->
                <!-- end Content -->

                <!-- sidebar -->
                <div class="col-md-3 col-sm-3">
                    <?php include ("templates/layout/right.php") ?>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
