<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=doitac&act=save_photo&id=<?=$_REQUEST['id'];?>&idc=<?=$_REQUEST['idc']?>" enctype="multipart/form-data" class="nhaplieu">
	
	<b>&nbsp;</b> 
    
        <img src="<?=_upload_hinhanh.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <strong>Width:185px&nbsp;-&nbsp;.jpg&nbsp;|&nbsp;.gif&nbsp;|&nbsp;png</strong><br />
	
    <br />
	<b>Tên: </b> <input name="ten" value="<?=$item['ten']?>" type="text" class="input"   />	
	<br />
    <b>Link: </b> <input name="mota" value="<?=$item['mota']?>" type="text" class="input"  />	
	<br />
    
    
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=doitac&act=man_photo'" class="btn" />
</form>