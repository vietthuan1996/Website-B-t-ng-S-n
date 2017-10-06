<div class="margin-20"></div>
<div class="section-left">
  <div class="section-title"><h2><i class="fa fa-car"></i> <?=$tintuc_detail[0]['ten']?></h2></div>
  <div class="section-content">
    <?=$tintuc_detail[0]['noidung']?>
  </div>

  <div class="section-title"><span><i class="fa fa-car"></i> Tin tức khác</span></div>
  <div class="section-content">
  <?php 
      if(count($tintuc_khac)>0){
      foreach ($tintuc_khac as $k => $dichvu) {
      ?>
               <div class="big">
                <div class="big-img"><a href="tin-tuc/<?=$dichvu['tenkhongdau']?>.html"><img src="<?=_upload_tintuc_l.$dichvu['thumb']?>" alt="<?=$dichvu['ten']?>"/></a></div>
                <div class="big-name"><h3><a href="tin-tuc/<?=$dichvu['tenkhongdau']?>.html"><?=$dichvu['ten']?></a></h3></div>
                <div class="bog-des"><p><?=$dichvu['mota']?></p></div>
                  <div class="bog-bottom">
               
                  <div class="bog-detail"><a href="tin-tuc/<?=$dichvu['tenkhongdau']?>.html">Xem chi tiết</a></div>
                </div>
            
              </div>
      <?php } ?>
  <?php } ?>
  </div>

</div><!--left-->
<?php include _template."layout/right.php"; ?>