<!-- Page Footer -->
    <footer id="page-footer">
        <div class="inner">
            <aside id="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <article>
                                <h3>Giới Thiệu</h3>
                                <p>
                                    <?= $row_setting['description'] ?>
                                </p>
                                <hr>
                                <a href="gioi-thieu.html" class="link-arrow">Xem Thêm</a>
                            </article>
                        </div><!-- /.col-sm-3 -->

                            <?php
                            $d->reset();
                            $sql="select table_product.tenkhongdau AS tenkhongdaup,table_product_list.tenkhongdau AS tenkhongdaul,table_product.photo as photop,gia,table_product.ten as tenp,dientich,phongngu,phongtam,nhadexe,diachi
                                 from table_product,table_product_list where table_product.hienthi =1 and table_product.spbc > 0 and table_product.id_list = table_product_list.id 
                                        order by table_product.stt,table_product.id 
                                             limit 0,2";
                            $d->query($sql);
                            $r_product_new_footer=$d->result_array();
                           ?>  

                        <div class="col-md-4 col-sm-4">
                            <article>
                                <h3>Bất Động Sản Mới Nhất</h3>
                                <?php
                                if(count($r_product_new_footer) > 0)
                                {
                                    foreach ($r_product_new_footer as $key => $pfooter) {
                                 ?>
                                <div class="property small">
                                    <a href="<?= $pfooter['tenkhongdaul'].'/'.$pfooter['tenkhongdaup'] ?>.html">
                                        <div class="property-image">
                                            <img alt="" src=" <?=_upload_product_l.$pfooter['photop'] ?>" width="100px" height="75px">
                                        </div>
                                    </a>
                                    <div class="info">
                                        <a href="<?= $pfooter['tenkhongdaul'].'/'.$pfooter['tenkhongdaup'] ?>.html"><h4><?= catchuoi($pfooter['tenp'],25) ?></h4></a>
                                        <figure><?= $pfooter['diachi'] ?></figure>
                                        <div class="tag price"><?= $pfooter['gia'] ?></div>
                                    </div>
                                </div><!-- /.property -->
                                <?php } ?>
                                <?php } ?>
                            </article>
                        </div><!-- /.col-sm-3 -->
                        <div class="col-md-4 col-sm-4">
                            <article>
                                <h3>Liên Hệ</h3>
                                <address>
                                    <strong><?= $row_setting['ten'] ?></strong><br>
                                    <?= $row_setting['diachi'] ?>
                                </address>
                                <strong>Hotline:</strong><a href="tel:<?=$row_setting['hotline']?>"> <?= $row_setting['hotline'] ?></a><br><br>
                                <a href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i> <strong><?= $row_setting['email'] ?></strong></a><br>
                            </article>
                        </div><!-- /.col-sm-3 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </aside><!-- /#footer-main -->
            <aside id="footer-thumbnails" class="footer-thumbnails"></aside><!-- /#footer-thumbnails -->
            <aside id="footer-copyright">
                <div class="container">
                    <span class="pull-left">Copyright © 2013. All Rights Reserved.</span>
                    <span class="pull-right"><a href="#page-top" class="roll">Đầu trang</a></span>
                </div>
            </aside>
        </div><!-- /.inner -->
    </footer>
    <!-- end Page Footer -->