<div class="margin-20"></div>
<div class="section-left">
  <div class="section-title"><h2 style="text-transform: uppercase;"><i class="fa fa-car"></i> <?=$title_tcat?></h2></div>
  <div class="section-content">
      <?php 
      if(count($tintuc)>0){
      foreach ($tintuc as $k => $dichvu) {
      ?>
               <div class="big">
                <div class="big-img"><a href="dich-vu/<?=$dichvu['tenkhongdau']?>.html"><img src="<?=_upload_tintuc_l.$dichvu['thumb']?>" alt="<?=$dichvu['ten']?>"/></a></div>
                <div class="big-name"><h3><a href="dich-vu/<?=$dichvu['tenkhongdau']?>.html"><?=$dichvu['ten']?></a></h3></div>
                <div class="bog-des"><p><?=$dichvu['mota']?></p></div>
                  <div class="bog-bottom">
               
                  <div class="bog-detail"><a href="dich-vu/<?=$dichvu['tenkhongdau']?>.html">Xem chi tiết</a></div>
                </div>
            
              </div>
      <?php } ?>
           <div class="phantrang" ><?=$paging['paging']?></div>
  <?php } ?>
  </div>
</div><!--left-->
<?php include _template."layout/right.php"; ?>