
<div class="margin-20"></div>
<div class="section-center">
    <div class="section-title"><h2 style="text-transform: uppercase;"><i class="fa fa-car"></i> <?=$row_detail['ten']?></h2></div>
    <div class="section-content">
      <div class="col-md-8 detai_pic">
        <div class="row">
           <div id="carousel" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                <div class="item active" style="margin-bottom: 0px;">
                    <img src="<?=_upload_product_l.$row_detail['photo']?>" alt="<?=$row_detail['ten']?>">
                </div>
                <?php
                if(count($row_hinhanhsp11)>0){
                foreach ($row_hinhanhsp11 as $k => $hinhanh) {
                ?>
                <div class="item" style="margin-bottom: 0px;">
                    <img src="<?=_upload_product_l.$hinhanh['photo']?>" alt="<?=$hinhanh['ten']?>">
                </div>
                <?php } ?>
                <?php } ?>


            </div>
			  <!-- Left and right controls -->
  <a class="left carousel-control" style="background: none;" href="#carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" style="background: none;"  href="#carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
              </div>
        </div>
         </div>
         <div class="col-md-4 detai_info">
		 <div class="mol1">
             <h3 class="nameh3"><?=$row_detail['ten']?></h3>
              <hr/>
        <div class="gia">Giá : <?php if($row_detail['gia']==0) echo 'Liên hệ'; else echo number_format ($row_detail['gia'],0,",",".")." đ";?></div>
        <div class="clearfix"></div>
        <p><?=$row_detail['mota']?></p>
          <div class="clearfix"></div>
		      <hr/>
       </div>
	 <div class="mol2">

           <div class=""><a href="tel:<?=$row_setting['hotline']?>"><img src="images/hotline.gif" alt="hotline"/></a></div>
  <hr/>
    <div class="gia"><a href="#" data-toggle="modal" data-target="#myModal3" >Đăng ký lái thử</a></div>
        <div class="clearfix"></div>
         </div>
    </div>

         <div class="clear" style="height:35px"></div>

          <ul class="nav nav-tabs del1">
  <li class="active"><a data-toggle="tab" href="#home">Giới thiệu xe <?=$row_detail['ten']?></a></li>
<li ><a data-toggle="tab" href="#thongso">Thông số kỹ thuật</a></li>

</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <div class="clearfix" style="height:25px"></div>
   <div class="sec-noidung"><?=$row_detail['noidung']?></div>
  </div>
   <div id="thongso" class="tab-pane fade">
    <div class="clearfix" style="height:25px"></div>
    <div class="sec-noidung"><?=$row_detail['thongso']?></div>
  </div>
</div>


    </div>

</div>
