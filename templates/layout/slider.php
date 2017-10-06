
<?php
    $d->reset();
    $sql_slider = "select ten,photo from #_slider order by stt,id desc";
    $d->query($sql_slider);
    $result_slider=$d->result_array();
  if(count($result_slider)>0){
?>



<!-- Slider -->
    <div id="slider" class="loading has-parallax">
        <div id="loading-icon"><i class="fa fa-cog fa-spin"></i></div>
        <div class="owl-carousel homepage-slider carousel-full-width">
        <?php
            foreach ($result_slider as $key => $slider) {
         ?>
            <div class="slide">
                <img alt="" src="<?= _upload_hinhanh_l.$slider['photo'] ?>">
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- end Slider -->
<?php } ?>