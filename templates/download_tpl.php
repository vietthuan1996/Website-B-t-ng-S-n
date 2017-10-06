<div class="box_content">
<div class="tcat"><?=$title_tcat?></div>
<div class="content">
 <?php
			   if(count($tintuc)>0){
				   ?>
<table border="1" cellpadding="5" cellspacing="0" width="100%" bgcolor="#FFF" bordercolor="#CCCCCC">

<tr class="title_table">
	<td width="30" align="center">STT</td><td>Tiêu đề</td><td width="100" align="center">Download</td><td width="100" align="center">Ngày đăng</td>
</tr>


 			<?php
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>
   <tr>
	<td align="center"><?=$i+1?></td><td><b><?=$tintuc[$i]['ten']?></b><br/><?=$tintuc[$i]['mota']?></td><td align="center"><a href="<?=_upload_download_l.$tintuc[$i]['file']?>">Download</a></td><td align="center"><?=date('d-m-Y',$tintuc[$i]['ngaytao'])?></td>
</tr>
        <?php } echo ' </table>'; }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>   
        
                                       
            <div class="phantrang" ><?=$paging['paging']?></div>
    <div class="clear"></div>
</div>
</div>