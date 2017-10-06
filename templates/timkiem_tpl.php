<div style="margin-top: 150px;"></div>
 
    <!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.html">Trang Chủ</a></li>
                <li class="active">Tìm Kiếm</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Results -->
                <div class="col-md-9 col-sm-9">
                    <section id="results">
                        <header><h1>Trang Tìm Kiếm</h1></header>
                        <section id="search-filter">
                            <figure><h3><i class="fa fa-search"></i>Kết quả tìm kiếm:</h3>
                                <span class="search-count"><?=
                                    $product_dem[0]['dem'];
                                 ?></span>
                            </figure>
                        </section>
                        <section id="properties" class="display-lines">
                        <?php
                            if(count($product_ketqua) > 0){
                                foreach ($product_ketqua as $key => $ketqua) {
                         ?>
                            <div class="property" style="margin-bottom:10px">
                                <figure class="tag status"><?= $ketqua['tinhtrang'] ?></figure>
                                <div class="property-image">
                                    <a href="<?= $ketqua['tenkhongdaul'].'/'.$ketqua['tenkhongdaup'] ?>.html">
                                        <img alt="" src="<?= _upload_product_l.$ketqua['thumbp'] ?>">
                                    </a>
                                </div>
                                <div class="info">
                                    <header>
                                        <a href="<?= $ketqua['tenkhongdaul'].'/'.$ketqua['tenkhongdaup'] ?>.html"><h3><?= $ketqua['tenp'] ?></h3></a>
                                        <figure><?= $ketqua['diachi'] ?></figure>
                                        <dl style="width: 40%;
                                        float: right;
                                        ">
                                            <dt>Kiểu:</dt>
                                                <dd> <?= $ketqua['kieu'] ?></dd>
                                            <dt>Diện tích:</dt>
                                                <dd><?= $ketqua['dientich'] ?> m<sup>2</sup></dd>
                                            <dt>Phòng Ngủ:</dt>
                                                <dd><?= $ketqua['phongngu'] ?></dd>
                                            <dt>Phòng tắm:</dt>
                                                <dd><?= $ketqua['phongtam'] ?></dd>
                                        </dl>
                                    </header>
                                    <div class="tag price"><?= $ketqua['gia'] ?></div>

                                    <aside>
                                        <p>
                                         <?=catchuoi(strip_tags($ketqua['mota']),255)?>  
                                        </p>
                                    </aside><br><br><br><br>

                                    <a href="<?= $ketqua['tenkhongdaul'].'/'.$ketqua['tenkhongdaup'] ?>.html" class="link-arrow">Xem Chi Tiết</a>
                                </div>
                            </div><!-- /.property -->
                            <?php } ?>
                                



                                    <div class="center">
                        
                            <ul class="pagination">
                                <li class="active">
                                </li>
                                <li><?= $paging['paging'] ?></li>
                                
                            </ul><!-- /.pagination-->
                        </div><!-- /.center-->
                            <?php }  ?>

                            <section id="advertising" style="margin-top:10px ">
                                <a href="submit.html">
                                    <div class="banner">
                                        <div class="wrapper">
                                            <span class="title"><?= $row_setting['slogan'] ?></span>
                                        </div>
                                    </div><!-- /.banner-->
                                </a>
                            </section><!-- /#adveritsing-->

                            



                        <!-- Pagination -->
                        

                        </section><!-- /#properties-->
                    </section><!-- /#results -->
                </div><!-- /.col-md-9 -->
                <!-- end Results -->

                <!-- sidebar -->
                <div class="col-md-3 col-sm-3">
                    <section id="sidebar">
                        <aside id="edit-search">
                            <header><h3>Danh mục bất động sản</h3></header>
                            <form role="form" id="form-sidebar" class="form-search" action="properties-listing.html">
                                <div class="form-group">
                                    <div class="price-range" >
                                        <a href="can-ho.html" "><i class="fa fa-home" aria-hidden="true"></i> <strong> Căn Hộ</strong></a>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="price-range">
                                        <a href="biet-thu.html"><i class="fa fa-home" aria-hidden="true"> </i> <strong>Biệt Thự</strong></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="price-range">
                                        <a href="nha-pho.html"><i class="fa fa-home" aria-hidden="true"> </i> <strong>Nhà Phố</strong></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="price-range">
                                        <a href="dat-nen.html"> <i class="fa fa-road" aria-hidden="true"></i> <strong>Đất Nền</strong></a>
                                    </div>
                                </div>
                            </form><!-- /#form-map -->
                        </aside><!-- /#edit-search -->


                    </section><!-- /#sidebar -->
                    <section id="comments">
                        <header><h2 class="no-border">Bài viết khác</h2></header>
                        <ul class="comments">
                        <?php if(count($tintuc_khac) > 0)
                        {
                            foreach ($tintuc_khac as $key => $tinkhac) {
                            
                         ?>
                            <li class="comment" style="border-bottom: 1px solid rgba(0, 0, 0, 0.1)">
                                <figure>
                                    <div class="image">
                                        <img alt="" src="<?= _upload_tintuc_l.$tinkhac['thumb'] ?>" width=50px height=100px>
                                    </div>
                                </figure>
                                <div class="comment-wrapper">
                                    <div class="name pull-left"><a href="tin-tuc/<?= $tinkhac['tenkhongdau'] ?>.html"><?= catchuoi(strip_tags($tinkhac['ten']),100) ?></a></div>
                                    <div style="float: left;">
                                    
                                    </div><br><br>
                                    <div style="float: left;">
                                    
                                    </div>
                                    <div style="float: left;">
                                    </div><br><br>
                                </div>
                            </li>

                            <?php } ?>
                            <?php } ?>
                        </ul>
                    </section><!-- /#comments -->

                

                        

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
