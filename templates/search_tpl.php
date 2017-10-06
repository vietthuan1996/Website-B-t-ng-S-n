   <div class="tcat"><?=$title_tcat?></div>
                
                <div class="content">
	 <?php for($i=0,$count_spmoi=count($product);$i<$count_spmoi;$i++) { ?>       
    <div class="item_product" <?php if(($i+1)%4==0) echo 'style="margin-right:0px;"'; ?>>
    	<div class="images"><a href="san-pham/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" ><img src="<?=_upload_product_l.$product[$i]['thumb']?>" border="0" /></a></div>
         <div class="name"><a href="san-pham/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" ><?=$product[$i]['ten']?></a></div>        
         <div class="price">Giá: <span><?php if($product[$i]['gia']==0) echo 'Liên hệ'; else echo number_format ($product[$i]['gia'],0,",",".")." VNĐ";?></span></div>  
          <div class="viewmore"><a href="san-pham/<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html"><img src="images/btn_viewmore.png" /></a></div>
              
    </div>
    <?php } ?>          
    <div class="clear"></div>
     <div class="phantrang" ><?=$paging['paging']?></div>
</div>
