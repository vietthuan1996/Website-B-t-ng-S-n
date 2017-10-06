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


                          <?php
                            $d->reset();
                            $sql="select table_product.tenkhongdau AS tenkhongdaup,table_product_list.tenkhongdau AS tenkhongdaul,table_product.photo as photop,gia,table_product.ten as tenp,dientich,phongngu,phongtam,nhadexe,diachi
                                 from table_product,table_product_list where table_product.hienthi =1 and table_product.spbc > 0 and table_product.id_list = table_product_list.id 
                                        order by table_product.stt,table_product.id 
                                             limit 0,3";
                            $d->query($sql);
                            $r_product_new_right=$d->result_array();
                           ?>  

                        <aside id="featured-properties">
                            <header><h3>Bất động sản mới nhất</h3></header>
                            <?php

                            if(count($r_product_new_right) > 0)
                            {
                                foreach ($r_product_new_right as $key => $pright) {
                             ?>
                            <div class="property small">
                                <a href="<?= $pright['tenkhongdaul'].'/'.$pright['tenkhongdaup'] ?>.html">
                                    <div class="property-image">
                                        <img alt="" src="<?= _upload_product_l.$pright['photop'] ?>" width=100px height=75px>
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="<?= $pright['tenkhongdaul'].'/'.$pright['tenkhongdaup'] ?>.html"><h4><?= catchuoi($pright['tenp'],25) ?></h4></a>
                                    <figure><?= $pright['diachi'] ?> </figure>
                                    <div class="tag price"><?= $pright['gia'] ?> </div>
                                </div>
                            </div><!-- /.property -->
                            <?php } ?>
                            <?php } ?>
                            
                        </aside><!-- /#featured-properties -->
                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-3 -->
                <!-- end Sidebar -->