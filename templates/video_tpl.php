<div class="tcat">Video clip</div>
    <div class="content"> 
               	         
             <?php
			   if(count($tintuc)>0){
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>
            <div class="box_video">
            	

 <div class="box_player" style="width:400px; margin:0px auto;">
  <div id="mediaplayer<?=$i?>">JW Player goes here</div>
	
	<script type="text/javascript" src="js/jwplayer.js"></script>
	<script type="text/javascript">
		jwplayer("mediaplayer<?=$i?>").setup({
			flashplayer: "images/player.swf",
			file: "<?=$tintuc[$i]['link']?>",
			image: "<?=_upload_hinhanh_l.$tintuc[$i]['photo']?>",
			height:350,
			width:400,
			skin: "images/stylish_slim.swf"
		});
	</script>
	<!-- END OF THE PLAYER EMBEDDING -->           </div>
<div class="title txtcenter"> <?=$tintuc[$i]['ten']?></div>
              <div class="clear"></div>
            </div>
            <?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>                                     
            <div class="phantrang" ><?=$paging['paging']?></div>
            </div>
            </div> 