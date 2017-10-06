<!-- Page Content -->
    <div id="page-content">
        <section id="banner">
            <div class="block has-dark-background background-color-default-darker center text-banner">
                <div class="container">
                    <h1 class="no-bottom-margin no-border"><?= $row_setting['slogan'] ?> <a href="tel:<?=$row_setting['hotline']?>" class="text-underline">HOT LINE: <?= $row_setting['hotline'] ?></a></h1>
                </div>
            </div>
        </section><!-- /#banner -->
        <section id="our-services" class="block">
            <div class="container">
                <header class="section-title"><h2>Tại Sao Chọn Chúng Tôi</h2></header>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="feature-box equal-height">
                            <figure class="icon"><i class="fa fa-folder"></i></figure>
                            <aside class="description">
                                <header><h3>Điểm nổi bật 1</h3></header>
                                <p>Uy tín.....................................</p>
                                <a href="properties-listing.html" class="link-arrow">Xem Thêm</a>
                            </aside>
                        </div><!-- /.feature-box -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="feature-box equal-height">
                            <figure class="icon"><i class="fa fa-users"></i></figure>
                            <aside class="description">
                                <header><h3>Điểm nổi bật 2</h3></header>
                                <p>Chất lượng .........................................</p>
                                <a href="agents-listing.html" class="link-arrow">Xem Thêm</a>
                            </aside>
                        </div><!-- /.feature-box -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="feature-box equal-height">
                            <figure class="icon"><i class="fa fa-money"></i></figure>
                            <aside class="description">
                                <header><h3>Điểm nổi bật 3</h3></header>
                                <p>Tin cậy.................................................</p>
                                <a href="#" class="link-arrow">Xem Thêm</a>
                            </aside>
                        </div><!-- /.feature-box -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#our-services -->
        <section id="price-drop" class="block">
            <div class="container">
                <header class="section-title">
                    <h2>Sản Phẩm Hot Nhất</h2>
                </header>
                <div class="row">   
                <?php
                    if(count($r_product_hot) > 0)
                    {
                        foreach ($r_product_hot as $key => $product_hot) {
                ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="property">
                            <a href="<?= $product_hot['tenkhongdaul'].'/'.$product_hot['tenkhongdaup'] ?>.html">
                                <div class="property-image">
                                    <img alt="" src=" <?= _upload_product_l.$product_hot['thumbp'] ?>" width=200px height=200px>
                                </div>
                                <div class="overlay">
                                    <div class="info">
                                        <div class="tag price"><?= $product_hot['gia'] ?></div>
                                        <h3><?= $product_hot['tenp'] ?></h3>
                                        <figure><?= $product_hot['diachi'] ?></figure>
                                    </div>
                                    <ul class="additional-info">
                                        <li>
                                            <header>Diện tích:</header>
                                            <figure><?= $product_hot['dientich'] ?>m<sup>2</sup></figure>
                                        </li>
                                        <li>
                                            <header>Phòng ngủ:</header>
                                            <figure><?= $product_hot['phongngu'] ?></figure>
                                        </li>
                                        <li>
                                            <header>Phòng tắm</header>
                                            <figure><?= $product_hot['phongtam'] ?></figure>
                                        </li>
                                        <li>
                                            <header>Nhà để xe:</header>
                                            <figure><?= $product_hot['nhadexe'] ?></figure>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div><!-- /.property -->
                    </div><!-- /.col-md-3 -->
                    <?php } ?>
                    <?php } ?>
                    
                    
                </div><!-- /.row-->
            </div><!-- /.container -->
        </section><!-- /#price-drop -->
        <aside id="advertising" class="block">
            <div class="container">
                
                    <div class="banner">
                        <div class="wrapper">
                            <span class="title"><?= $row_setting['slogan2'] ?></span>
                        </div>
                    </div><!-- /.banner-->
            
            </div>
        </aside><!-- /#adveritsing-->
        <section id="new-properties" class="block">
            <div class="container">
                <header class="section-title">
                    <h2>Sản Phẩm Mới Nhất</h2>
                </header>
                <div class="row">
                <?php
                    if(count($r_product_new_one) > 0)
                    {
                        foreach ($r_product_new_one as $key => $pnewone) {
                 ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="property">
                            <a href="<?= $pnewone['tenkhongdaul'].'/'.$pnewone['tenkhongdaup'] ?>.html">
                                <div class="property-image">
                                    <img alt="" src="<?= _upload_product_l.$pnewone['thumbp'] ?>" width=200px height=200px>
                                </div>
                                <div class="overlay">
                                    <div class="info">
                                        <div class="tag price"><?= $pnewone['gia'] ?></div>
                                        <h3><?= $pnewone['tenp'] ?></h3>
                                        <figure><?= $pnewone['diachi'] ?></figure>
                                    </div>
                                    <ul class="additional-info">
                                        <li>
                                            <header>Diện tích:</header>
                                            <figure><?= $pnewone['dientich'] ?>m<sup>2</sup></figure>
                                        </li>
                                        <li>
                                            <header>Phòng ngủ:</header>
                                            <figure><?= $pnewone['phongngu'] ?></figure>
                                        </li>
                                        <li>
                                            <header>Phòng tắm:</header>
                                            <figure><?= $pnewone['phongtam'] ?></figure>
                                        </li>
                                        <li>
                                            <header>Nhà để xe:</header>
                                            <figure><?= $pnewone['nhadexe'] ?></figure>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div><!-- /.property -->
                    </div><!-- /.col-md-3 -->
                    <?php } ?>
                    <?php } ?>                    
                    
                </div><!-- /.row-->
                <div class="row">
                <?php
                    if(count($r_product_new_two) > 0)
                    {
                        foreach ($r_product_new_two as $key => $pnewtwo) {
                 ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="property">
                            <a href="<?= $pnewtwo['tenkhongdaul'].'/'.$pnewtwo['tenkhongdaup'] ?>.html">
                                <div class="property-image">
                                    <img alt="" src="<?= _upload_product_l.$pnewtwo['thumbp'] ?>" width=200px height=200px>
                                </div>
                                <div class="overlay">
                                    <div class="info">
                                        <div class="tag price"><?= $pnewtwo['gia'] ?></div>
                                        <h3><?= $pnewtwo['tenp'] ?></h3>
                                        <figure><?= $pnewtwo['diachi'] ?></figure>
                                    </div>
                                    <ul class="additional-info">
                                        <li>
                                            <header>Diện tích:</header>
                                            <figure><?= $pnewtwo['dientich'] ?>m<sup>2</sup></figure>
                                        </li>
                                        <li>
                                            <header>Phòng ngủ:</header>
                                            <figure><?= $pnewtwo['phongngu'] ?></figure>
                                        </li>
                                        <li>
                                            <header>Phòng tắm:</header>
                                            <figure><?= $pnewtwo['phongtam'] ?></figure>
                                        </li>
                                        <li>
                                            <header>Nhà để xe:</header>
                                            <figure><?= $pnewtwo['nhadexe'] ?></figure>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div><!-- /.property -->
                    </div><!-- /.col-md-3 -->
                    <?php } ?>
                    <?php } ?>
                    
                    
                    
                </div><!-- /.row-->
            </div><!-- /.container-->
        </section><!-- /#new-properties-->
        <section id="partners" class="block">
            <div class="container">
                <header class="section-title"><h2>Đối Tác Của Chúng Tôi</h2></header>
                <div class="logos">
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-01.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-02.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-03.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-04.png" alt=""></a></div>
                    <div class="logo"><a href=""><img src="assets/img/logo-partner-05.png" alt=""></a></div>
                </div>
            </div><!-- /.container -->
        </section><!-- /#partners -->
    </div>
    <!-- end Page Content -->