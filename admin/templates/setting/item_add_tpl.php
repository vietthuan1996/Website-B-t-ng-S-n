<h3>Thiết lập hệ thống</h3>

<form name="frm" method="post" action="index.php?com=setting&act=save" enctype="multipart/form-data" class="nhaplieu">
	<b>Title:</b> <input type="text" name="title" value="<?=@$item['title']?>" class="input" /><br /><br>
	<b>Keywords</b> 
	<textarea name="keywords" id="keywords" cols="45" rows="5"><?=@$item['keywords']?></textarea>
  <br><br />

	<b>Description</b> 
	<textarea name="description" id="description" cols="45" rows="5"><?=@$item['description']?></textarea>
  <br><br />
   <b>H1 :</b> <input type="text" name="h1" value="<?=@$item['h1']?>" class="input" /><br /><br>
   
    <b>H2:</b> <input type="text" name="h2" value="<?=@$item['h2']?>" class="input" /><br /><br>
   
    <b>H3:</b> <input type="text" name="h3" value="<?=@$item['h3']?>" class="input" /><br /><br>
   	
    <b>Tên công ty:</b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br /><br>
    <b>Email:</b> <input type="text" name="email" value="<?=@$item['email']?>" class="input" /><br /><br>
    <b>Điện thoại:</b> <input type="text" name="dienthoai" value="<?=@$item['dienthoai']?>" class="input" /><br /><br>
    <b>Địa chỉ:</b> <input type="text" name="diachi" value="<?=@$item['diachi']?>" class="input" /><br /><br>
    <b>Website:</b> <input type="text" name="website" value="<?=@$item['website']?>" class="input" /><br /><br>    
     <b>Hotline:</b> <input type="text" name="hotline" value="<?=@$item['hotline']?>" class="input" /><br /><br> 
       <b>Tên hỗ trợ:</b> <input type="text" name="support" value="<?=@$item['support']?>" class="input" /><br /><br>
       
     <b>Facebook:</b> <input type="text" name="facebook" value="<?=@$item['facebook']?>" class="input" /><br /><br>    
     <b>Twitter:</b> <input type="text" name="twitter" value="<?=@$item['twitter']?>" class="input" /><br /><br>    
     <b>Google:</b> <input type="text" name="google" value="<?=@$item['google']?>" class="input" /><br /><br>    
     <b>Youtube:</b> <input type="text" name="youtube" value="<?=@$item['youtube']?>" class="input" /><br /><br>    
  <b>Slogan:</b> <input type="text" name="slogan" value="<?=@$item['slogan']?>" class="input" /><br /><br>    
  <b>Slogan2:</b> <input type="text" name="slogan2" value="<?=@$item['slogan2']?>" class="input" /><br /><br>
 
    <br/><br/>
    <b>Tọa độ:</b> <input type="text" name="toado" value="<?=@$item['toado']?>" class="input" /><br /><br>
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=setting&act=capnhat'" class="btn" />
</form>