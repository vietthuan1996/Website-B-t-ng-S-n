<h3><a href="index.php?com=quangcao&act=add_photo">Thêm hình ảnh</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:5%;">Stt</th>		       
        <th style="width:30%;">Vị trí</th>
        <th style="width:50%;">Hình ảnh</th>
      	<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
        <td style="width:30%;">
			<?php
            	if($items[$i]['vitri']==1) echo 'Chạy bên trái';
				if($items[$i]['vitri']==2) echo 'Chạy bên phải';
			?>
        </td>
		<td style="width:50%;">
       
       <img src="<?=_upload_hinhanh.$items[$i]['photo']?>" width="100" height="100" />
        
        </td>
       
        
		<td style="width:5%;"><?php if(@$items[$i]['hienthi']){?><img src="media/images/active_1.png" /><? }else {?><img src="media/images/active_0.png" /><? }?></td>
		<td style="width:5%;"><a href="index.php?com=quangcao&act=edit_photo&id=<?=$items[$i]['id']?>&idc=<?=$items[$i]['id_photo']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=quangcao&act=delete_photo&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=quangcao&act=add_photo&idc=<?=$_REQUEST['idc'];?>"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>