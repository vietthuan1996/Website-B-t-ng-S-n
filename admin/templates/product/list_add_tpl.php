<h3>Thêm danh mục</h3><form name="frm" method="post" action="index.php?com=product&act=save_list" enctype="multipart/form-data" class="nhaplieu">	    	    
    <?php if ($_REQUEST['act']==edit_list)
  {?>
  <b>Hình hiện tại:</b><img src="<?=_upload_product.$item['thumb']?>"  alt="NO PHOTO" /><br />
  <?php }?>
  <b>Hình ảnh:</b> <input type="file" name="file" /> <?=_product_type?><br />
    <br />
    <b>Tên</b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br /><br>
    <b><strong style="color:#F00;">Thông tin SEO</strong></b><br/>
      <b>H1</b> <input type="text" name="h1" value="<?=@$item['h1']?>" class="input" /><br /><br>
        <b>H2</b> <input type="text" name="h2" value="<?=@$item['h2']?>" class="input" /><br /><br>
          <b>H3</b> <input type="text" name="h3" value="<?=@$item['h3']?>" class="input" /><br /><br>
     <b>Title</b> <input type="text" name="title" value="<?=$item['title']?>" class="input" /><br /> 	 
   <b>Keywords</b>	    
    <div>    
    <textarea name="keywords" cols="50" rows="5" id="keywords"><?=@$item['keywords']?></textarea>        
  </div>
  
   <b>Description</b>	    
    <div>    
    <textarea name="description" cols="50" rows="5" id="description"><?=@$item['description']?></textarea>        
  </div>
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_list'" class="btn" />
</form>