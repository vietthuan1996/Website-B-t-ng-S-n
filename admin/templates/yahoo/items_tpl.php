<h3><a href="index.php?com=yahoo&act=add">Thêm thành viên mới</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>
        <th style="width:5%;">ID</th>
		<th style="width:35%;">Tên </th>
		<th style="width:40%;">Yahoo</th>       
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
        <td style="width:5%;"><?=$items[$i]['id']?></td>
		<td style="width:35%;"><?=$items[$i]['ten']?></td>
		<td style="width:40%;"><?=$items[$i]['yahoo']?></td>
		<td style="width:5%;"><?php 
		if(@$items[$i]['hienthi'])
		{
		?>
        <img src="media/images/active_1.png" />
		<? 
		}
		else
		{
		?>
        <img src="media/images/active_0.png" />
        <?
		}?>        </td>
		<td style="width:5%;"><a href="index.php?com=yahoo&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:5%;"><a href="index.php?com=yahoo&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<div class="paging"><?=$paging['paging']?></div>