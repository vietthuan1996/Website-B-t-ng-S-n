<h3>Quản lý Email</h3>
<h3>
	<form name="frm" method="post" action="index.php?com=email_dk&act=save" enctype="multipart/form-data" class="nhaplieu">
     <b>Email đăng ký nhận thông tin</b><input type="text" name="email" value="<?=@$item['email']?>" /></br></br>
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

  <b>Hiển thị</b> 
  <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>>
  <br />
  <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=email_dk&act=man'" class="btn" />
    </form>
</h3>
