 <div style="margin-top: 150px;"></div>
 
    <!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.html">Trang Chủ</a></li>
                <li class="active">Nhà Phố</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Results -->
                <div class="col-md-9 col-sm-9">
                    <section id="results">
                        <header><h1>Nhà Phố</h1></header>
                        <section id="search-filter">
                            <figure><h3><i class="fa fa-search"></i>Kết quả tìm kiếm:</h3>
                                <span class="search-count"><?php
                                    $d->reset();
                                    $sql_dem = " SELECT id,COUNT(id) as dem FROM table_product WHERE id_list = 10";
                                    $d->query($sql_dem);
                                   $dem =  $d->fetch_array();
                                    echo $dem['dem'];
                                 ?></span>
                            </figure>
                        </section>
                        <section id="properties" class="display-lines">
                        <?php
                            if(count($product_nhapho) > 0) 
                            {
                                foreach ($product_nhapho as $key => $nhapho) {
                         ?>
                            <div class="property" style="margin-bottom:10px">
                                <figure class="tag status"><?= $nhapho['tinhtrang'] ?></figure>
                                <div class="property-image">
                                    <a href="nha-pho/<?= $nhapho['tenkhongdau'] ?>.html">
                                        <img alt="" src="<?= _upload_product_l.$nhapho['thumb'] ?>">
                                    </a>
                                </div>
                                <div class="info">
                                    <header>
                                        <a href="nha-pho/<?= $nhapho['tenkhongdau'] ?>.html"><h3><?= $nhapho['ten'] ?></h3></a>
                                        <figure><?= $nhapho['diachi'] ?></figure>
                                        <dl style="width: 40%;
                                        float: right;
                                        ">
                                            <dt>Kiểu:</dt>
                                                <dd> <?= $nhapho['kieu'] ?></dd>
                                            <dt>Diện tích:</dt>
                                                <dd><?= $nhapho['dientich'] ?> m<sup>2</sup></dd>
                                            <dt>Phòng Ngủ:</dt>
                                                <dd><?= $nhapho['phongngu'] ?></dd>
                                            <dt>Phòng tắm:</dt>
                                                <dd><?= $nhapho['phongtam'] ?></dd>
                                        </dl>
                                    </header>
                                    <div class="tag price"><?= $nhapho['gia'] ?></div>
                                    <aside>
                                        <p>
                                                <?=catchuoi(strip_tags($nhapho['mota']),255)?>  
                                                
                                        </p>
                                        
                                    </aside>
                                    <a href="nha-pho/<?= $nhapho['tenkhongdau'] ?>.html" class="link-arrow">Xem Chi Tiết</a>
                                </div>
                            </div><!-- /.property -->
                            <?php }  ?>
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



                        <aside id="featured-properties">
                            <header><h3>Nhà Phố Mới Nhất</h3></header>
                            <?php

                            if(count($r_product_newnhapho) > 0)
                            {
                                foreach ($r_product_newnhapho as $key => $pnhapho) {
                             ?>
                            <div class="property small">
                                <a href="<?= $pnhapho['tenkhongdaul'].'/'.$pnhapho['tenkhongdaup'] ?>.html">
                                    <div class="property-image">
                                        <img alt="" src="<?= _upload_product_l.$pnhapho['thumbp'] ?>" width=100px height=75px>
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="<?= $pnhapho['tenkhongdaul'].'/'.$pnhapho['tenkhongdaup'] ?>.html"><h4><?= catchuoi($pnhapho['tenp'],25) ?></h4></a>
                                    <figure><?= $pnhapho['diachi'] ?> </figure>
                                    <div class="tag price"><?=$pnhapho['gia'] ?></div>
                                </div>
                            </div><!-- /.property -->
                            <?php } ?>
                            <?php } ?>
                            
                        </aside><!-- /#featured-properties -->
                    </section><!-- /#sidebar -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
