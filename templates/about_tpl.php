<div style="margin-top: 145px;"></div>
<!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.php">Trang Chủ</a></li>
                <li class="active">Giới Thiệu</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- About Us -->
                <div class="col-md-12 col-sm-12">
                    <section id="about-us">
                        <header><h1>Giới Thiệu</h1></header>
                        <section id="ceo-section" class="center">
                            <header class="center"><div class="cite-title"><?= $noidung_ten= $row['ten']; ?></div></header>
                            <div class="cite no-bottom-margin">
                            <?= $noidung_gioithieu= $row['mota'];?>
                            </div>
                        </section><!-- /#ceo-section -->
                        <div class="divider-image center"><img alt="" src="assets/img/sine-wave.png"></div>
                        <section id="our-team">
                            <p>
                               <?= $noidung_about= $row['noidung']; ?>
                            </p>
                        </section><!-- /#our-tem -->
                    </section><!-- /#about-us -->
                </div><!-- /.col-md-12 -->
                <!-- end About Us -->
                <!-- Sidebar goes here -->
                <!-- end Sidebar -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
