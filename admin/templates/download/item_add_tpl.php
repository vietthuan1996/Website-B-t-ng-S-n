<h3>Thêm file</h3>
<form name="frm" method="post" action="index.php?com=download&act=save" enctype="multipart/form-data" class="nhaplieu">
   <?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>File hiện tại:</b><a href="<?=_upload_download.$item['file']?>" >Download file</a><br />
	<?php }?>
    <br />
	<b>Upload:</b> <input type="file" name="file" /> <strong>pdf|doc|docx|rar|zip</strong><br /><br />
	<b>Tiêu đề</b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br />	
	<b>Mô tả</b>	
        <div>    
    <textarea name="mota" cols="50" rows="5" id="mota"><?=@$item['mota']?></textarea>        
  </div>		
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=download&act=man'" class="btn" />
</form>