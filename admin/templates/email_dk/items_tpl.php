<script language="javascript" src="media/scripts/my_script.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung_email,noidung_footer",
		theme : "advanced",
		convert_urls : false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
height:"400px",
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
</script>





<script type="text/javascript" language="javascript"> 
function setCheckboxes() {
  var act = document.getElementById('checkall').checked;
  var e = document.getElementsByTagName('input');
  var elts_cnt  = (typeof(e.length) != 'undefined') ? e.length : 0;
  if (!elts_cnt) {
    return;
  }
  for (var i = 0; i < elts_cnt; i++) {
    if((e[i].type) == 'checkbox') {
      e[i].checked = (act == 1 || act == 0) ? act : (e[i].checked ? 0 : 1);
    }
  }
}
</script> 


<h3>Email đăng ký nhận thông tin khuyến mãi</h3>


<form name="frm_email" method="post" action="index.php?com=email_dk&act=man" enctype="multipart/form-data" class="nhaplieu">	
<table class="blue_table">
	<tr>
    	<th style="width:5%;"><input type='checkbox' name='checkall' id="checkall" onclick='setCheckboxes();'></th>
		<th>ID</th>
		<th>Email đăng ký nhận tin</th>
		
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
     
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
    	<td style="width:5%;"><input name="cb_item[]" id="cb_item" type="checkbox" value="<?=$items[$i]['id']?>" /></td>
		<td style="width:6%;"><?=$items[$i]['id']?></td>
		<td align="center" style="width:70%;"><?=$items[$i]['email']?></td>
	  
		<td style="width:6%;"><a href="index.php?com=email_dk&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:6%;"><a href="index.php?com=email_dk&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>

</table>
	<div class="paging"><?=$paging['paging']?></div>
    
	
    
    <div id="soan_email">
    <b>Soạn Email</b><br/><br/>
    	<b>Tiêu đề</b><textarea name="tieude" cols="60" rows="2" id="tieude"></textarea><br /> 
        
        <b>Đính kèm file</b><input type="file" name="file"><br />
        
        <b>Nội dung Email</b>
        <div> 
        <textarea name="noidung_email" id="noidung_email"></textarea>
        </div>  <br />
        
      
     
	<input style="width:199" type="submit" name="show_email" id="show_email" value="Send Email" >
    </div>
    
 </form>
    
    
    


