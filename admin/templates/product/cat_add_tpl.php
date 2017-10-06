<?php
function get_main_category()
	{
		$sql="select * from table_product_list order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange1()" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_list"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	?>
<h3>Thêm danh mục</h3>
<form name="frm" method="post" action="index.php?com=product&act=save_cat" enctype="multipart/form-data" class="nhaplieu">	
    <b>Danh mục:</b><?=get_main_category();?><br /><br />    
    <b>Tên</b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" /><br /><br>
    <b><strong style="color:#F00;">Thông tin SEO</strong></b><br/>
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
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_cat'" class="btn" />
</form>