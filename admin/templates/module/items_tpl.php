

<table class="blue_table">

	<tr>
		<th style="width:5%;">Stt</th>	      
        <th style="width:50%;">Tên</th>
 
	  <th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>

	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;" align="center"><?=$items[$i]['stt']?></td>
            
		<td style="width:80%;" align="center"><a href="index.php?com=module&act=edit&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten']?></a></td>

		<td style="width:5%;">
        
        
		
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=module&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=module&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>        </td>


		<td style="width:5%;" align="center"><a href="index.php?com=module&act=edit&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>

	</tr>
	<?php	}?>
</table>


<div class="paging"><?=$paging['paging']?></div>