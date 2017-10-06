<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "mota,noidung,thongso,noithat,ngoaithat,thuvien,chitiet1,chitiet2,chitiet3",
		theme : "advanced",
		convert_urls : false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
height:"500px",
    width:"85%",
	remove_script_host : false,

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
	function select_onchange()
	{				
		var a=document.getElementById("id_list");
		window.location ="index.php?com=product&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_list="+a.value;	
		return true;
	}
	
	function select_onchange1()
	{				
		var a=document.getElementById("id_list");
		var b=document.getElementById("id_cat");
		window.location ="index.php?com=product&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_list="+a.value+"&id_cat="+b.value;	
		return true;
	}
</script>
<h3>Quản lý sản phẩm</h3>
<?php
function get_main_list()
	{
		$sql="select * from table_product_list order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" class="main_font">
			<option>Danh mục cấp 1</option>			
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
function get_main_cat()
	{
		$sql="select ten,id from table_product_cat where id_list='".$_REQUEST['id_list']."'  order by stt asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat" class="main_font">
			<option value="">Danh mục cấp 2</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$_REQUEST['id_cat'])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
function get_main_dmsp()
	{
		$sql="select ten,id from table_product_loai where id_cat='".$_REQUEST['id_cat']."'  order by stt asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_loai" name="id_loai" class="main_font">
			<option value="">Danh mục cấp 3</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$_REQUEST['id_loai'])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>
<form name="frm" method="post" action="index.php?com=product&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">	 
     <b>Danh mục 1:</b><?=get_main_list();?><br /><br />        
      
	<?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_product.$item['thumb']?>"  alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_product_type?><br />
    <br />
	<b>Tên</b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" /><br />
	<b>Địa Chỉ</b> <input type="text" name="diachi" value="<?=$item['diachi']?>" class="input" /><br />
	<b>Kiểu</b> <select name="kieu" id="kieu">
						<option >Căn Hộ</option>
						<option >Biệt Thự</option>
						<option >Đất Nền</option>
						<option >Nhà Phố</option>
	</select><br /> 	     
	<b>Tình Trạng</b><select name="tinhtrang" id="tinhtrang">
						<option >Bán</option>
						<option >Cho Thuê</option>
	</select><br /> 	     
	<b>Diện Tích</b> <input type="text" name="dientich" value="<?=$item['dientich']?>" class="input" /><br />  	     
     <b>Giá bán</b> <input type="text" name="gia" value="<?=$item['gia']?>" class="input" /><br />            <br/>     
     <b>Phòng Ngủ</b> <input type="number" name="phongngu" value="<?= $item['phongngu'] ?>" class="input" /><br />            <br/>     
     <b>Phòng Tắm</b> <input type="number" name="phongtam" value="<?=$item['phongtam']?>" class="input" /><br />            <br/>     
     <b>Nhà để xe</b> <input type="number" name="nhadexe" value="<?=$item['nhadexe']?>" class="input" /><br />            <br/>     

    <b>Mô tả</b>
	
    
    <div>
    
    <textarea name="mota" cols="50" rows="5" id="mota"><?=@$item['mota']?></textarea>
    
    
  </div>
     <br/><br/>
     <b>Tiêu đề bài viết 1</b> <input  type="text" name="tieude1" value="<?=$item['tieude1']?>" class="input" /><br />
     <b>Bài Viết 1</b>
	<div>
	 <textarea  name="chitiet1" id="chitiet1"><?=$item['chitiet1']?></textarea></div>
    <br/> 
    <br/>
    <b>Tiêu đề bài viết 2</b> <input type="text" name="tieude2" value="<?=$item['tieude2']?>" class="input" /><br />
     <b>Bài Viết 2</b>
	<div>
	 <textarea  name="chitiet2" id="chitiet2"><?=$item['chitiet2']?></textarea></div>
    <br/> 
    <br/>
    <b>Tiêu đề bài viết 3</b> <input type="text" name="tieude3" value="<?=$item['tieude3']?>" class="input" /><br />
     <b>Bài Viết 2</b>
	<div>
	 <textarea  name="chitiet3" id="chitiet3"><?=$item['chitiet3']?></textarea></div>
    <br/> 
    <br/>
    <b><strong style="color:#F00;">Thông tin SEO</strong></b><br/>
     <b>Title</b> <input type="text" name="title" value="<?=$item['title']?>" class="input" /><br /> 	
       <b>h1</b> <input type="text" name="h1" value="<?=$item['h1']?>" class="input" /><br /> 
         <b>h2</b> <input type="text" name="h2" value="<?=$item['h2']?>" class="input" /><br /> 
           <b>h3</b> <input type="text" name="h3" value="<?=$item['h3']?>" class="input" /><br />  
   <b>Keywords</b>	    
    <div>    
    <textarea name="keywords" cols="50" rows="5" id="keywords"><?=@$item['keywords']?></textarea>        
  </div>
  
   <b>Description</b>	    
    <div>    
    <textarea name="description" cols="50" rows="5" id="description"><?=@$item['description']?></textarea>        
  </div>
     <br/>
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	<b>Hiển thị tin</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /><br />
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man'" class="btn" />
</form>