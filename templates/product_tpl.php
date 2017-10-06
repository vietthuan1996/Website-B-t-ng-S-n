<div class="margin-20"></div>
<div class="section-left">
    <div class="section-title"><h2 style="text-transform: uppercase;"><i class="fa fa-car"></i> <?=$title_tcat?></h2></div>
    <div class="section-content">
    <?php

    if(count($product)>0){
    foreach ($product as $k => $product) {
    ?>
    <div class="big">
        <div class="big-img"><a href="xe/<?=$product['tenkhongdau']?>.html"><img src="<?=_upload_product_l.$product['thumb']?>" alt="<?=$product['ten']?>"/></a></div>
        <div class="big-name"><h3><a href="xe/<?=$product['tenkhongdau']?>.html"><?=$product['ten']?></a></h3></div>
        <div class="big-bottom">
             <div class="big-des"><?=$product['mota']?></div>
              <div class="big-price"><span><?php if($product['gia']==0) echo '0938888978'; else echo number_format ($product['gia'],0,",",".")." đ";?></span></div>
              <div class="big-laithu"><a style="cursor:pointer" data-toggle="modal" data-target="#myModal3">Đăng ký lái thử</a></div>
        </div>
      
       
    </div>
        <?php if(($k+1)%3==0) echo '<div class="clear x3"></div>'; ?>
         <?php if(($k+1)%2==0) echo '<div class="clear x2"></div>'; ?>
    <?php } ?>
    <?php } ?>
    </div>