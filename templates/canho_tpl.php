 <div style="margin-top: 150px;"></div>
 
    <!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Trang Chủ</a></li>
                <li class="active">Căn Hộ</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Results -->
                <div class="col-md-9 col-sm-9">
                    <section id="results">
                        <header><h1>Căn Hộ</h1></header>
                        <section id="search-filter">
                            <figure><h3><i class="fa fa-search"></i>Kết quả tìm kiếm:</h3>
                                <span class="search-count"><?php
                                    $d->reset();
                                    $sql_dem = " SELECT id,COUNT(id) as dem FROM table_product WHERE id_list = 8";
                                    $d->query($sql_dem);
                                   $dem =  $d->fetch_array();
                                    echo $dem['dem'];
                                 ?></span>
                            </figure>
                        </section>
                        <section id="properties" class="display-lines">
                        <?php
                            if(count($product_canho) > 0) 
                            {
                                foreach ($product_canho as $key => $canho) {
                         ?>
                            <div class="property" style="margin-bottom:10px">
                                <figure class="tag status"><?= $canho['tinhtrang'] ?></figure>
                                <div class="property-image">
                                    <a href="can-ho/<?= $canho['tenkhongdau'] ?>.html">
                                        <img alt="" src="<?= _upload_product_l.$canho['thumb'] ?>">
                                    </a>
                                </div>
                                <div class="info">
                                    <header>
                                        <a href="can-ho/<?= $canho['tenkhongdau'] ?>.html"><h3><?= $canho['ten'] ?></h3></a>
                                        <figure><?= $canho['diachi'] ?></figure>
                                        <dl style="width: 40%;
                                        float: right;
                                        ">
                                            <dt>Kiểu:</dt>
                                                <dd> <?= $canho['kieu'] ?></dd>
                                            <dt>Diện tích:</dt>
                                                <dd><?= $canho['dientich'] ?> m<sup>2</sup></dd>
                                            <dt>Phòng Ngủ:</dt>
                                                <dd><?= $canho['phongngu'] ?></dd>
                                            <dt>Phòng tắm:</dt>
                                                <dd><?= $canho['phongtam'] ?></dd>
                                        </dl>
                                    </header>
                                    <div class="tag price"><?= $canho['gia'] ?></div>

                                    <aside>
                                        <p>
                                         <?=catchuoi(strip_tags($canho['mota']),255)?>  
                                        </p>
                                    </aside>

                                    <a href="can-ho/<?= $canho['tenkhongdau'] ?>.html" class="link-arrow">Xem Chi Tiết</a>
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
                            <header><h3>Căn Hộ Mới Nhất</h3></header>
                            <?php

                            if(count($r_product_newcanho) > 0)
                            {
                                foreach ($r_product_newcanho as $key => $pcanho) {
                             ?>
                            <div class="property small">
                                <a href="<?= $pcanho['tenkhongdaul'].'/'.$pcanho['tenkhongdaup'] ?>.html">
                                    <div class="property-image">
                                        <img alt="" src="<?= _upload_product_l.$pcanho['thumbp'] ?>" width=100px height=75px>
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="<?= $pcanho['tenkhongdaul'].'/'.$pcanho['tenkhongdaup'] ?>.html"><h4><?= catchuoi($pcanho['tenp'],25) ?></h4></a>
                                    <figure><?= $pcanho['diachi'] ?> </figure>
                                    <div class="tag price"><?=$pcanho['gia'] ?></div>
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
