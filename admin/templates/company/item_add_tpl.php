<h3>Cập nhật thông tin công ty</h3>

<form name="frm" method="post" action="index.php?com=company&act=save" enctype="multipart/form-data" class="nhaplieu">

	<!-- <b>Tiêu đề</b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" /><br /> -->

	<b>Tên Công Ty:</b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" /><br /><br>
	<b>Địa chỉ:</b> <input type="text" name="diachi" value="<?=$item['diachi']?>" class="input" /><br /><br>
    <b>Số điện thoại:</b> <input type="text" name="dienthoai" value="<?=$item['dienthoai']?>" class="input" /><br /><br>
    <b>Email</b> <input type="text" name="email" value="<?=$item['email']?>" class="input" /><br /><br>
      <b>Website</b> <input type="text" name="website" value="<?=$item['website']?>" class="input" /><br /><br>
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=company&act=capnhat'" class="btn" />
</form>