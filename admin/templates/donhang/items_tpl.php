<script language="javascript">
			function displayWin(url,name,width,height) {
				var _left = (screen.width - width)/2;
				var _top = (screen.height - height)/2;
				newWin = window.open(url,name,'width=' + width + ',height=' + height + ',left=' + _left + ',top=' + _top + ',location=no,menubar=no,resizable=1,scrollbars=1,status=no,toolbar=0');
				if (newWin) newWin.focus();
			}								
</script>
<script type="text/javascript">
function doEnter(evt){
	// IE					// Netscape/Firefox/Opera
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch(evt);
	}
}
function onSearch(evt) {	
		var keyword = document.getElementById("keyword").value;	
		var price = document.getElementById("price").value;		
		//var encoded = Base64.encode(keyword);
		location.href = "index.php?com=order&act=man&keyword="+keyword+"&price="+price;
		loadPage(document.location);
			
}

</script>
<h3><a href="#" onclick="javascript:displayWin('baocaobanhang.php','ColorUpdate',700,400);" >Xem báo cáo</a></h3>
Tìm kiếm: <input name="keyword" id="keyword" type="text" onkeypress="doEnter(event)" />
<select name="price" id="price">
                                	<option value="0">Chọn mức tiền</option>
                                    <option value="1">0 - 3.000.000 VNĐ</option>
                                    <option value="2">3.000.000 VNĐ - 7.000.000 VNĐ</option>
                                    <option value="3">7.000.000 VNĐ - 10.000.000 VNĐ</option>
                                    <option value="4">&gt; 10.000.000 VNĐ</option>
                                </select> <input type="button" value=" Tìm "  onclick="onSearch(event)"/>   
<table class="blue_table">

	<tr>
    	<th style="width:5%" align="center">ID</th>
		<th style="width:10%;">Mã đơn hàng</th>	
        <th style="width:20%;">Họ tên</th>
        <th style="width:20%;">Ngày đặt</th>
        <th style="width:10%;">Số tiền</th>
        <th style="width:10%;">HT Thanh toán</th>
       <th style="width:15%;">Tình trạng</th>     
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){ $tongthu=$tongthu+$items[$i]['tonggia']; ?>
	<tr>
		<td style="width:5%;" align="center"><?=$items[$i]['id']?></td>
        <td style="width:10%;" align="center"><?=$items[$i]['madonhang']?></td>       
		<td style="width:20%;" align="center"><a href="index.php?com=order&act=edit&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['hoten']?></a></td>
		  <td style="width:20%;" align="center"><?=date('d/m/Y',$items[$i]['ngaytao'])?></td>          
           <td style="width:10%;" align="center"><?=number_format($items[$i]['tonggia'],0, ',', '.')?>&nbsp;VNĐ</td>
            <td style="width:10%;" align="center"><?=$items[$i]['httt']?></td>
           <td style="width:15%;" align="center">
		   <?php 
		   		$sql="select trangthai from #_tinhtrang where id= '".$items[$i]['trangthai']."' ";
				$d->query($sql);
				$result=$d->fetch_array();
				echo $result['trangthai'];
		   ?>
           
           </td>         
		<td style="width:5%;" align="center"><a href="index.php?com=order&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:5%;"><a href="index.php?com=order&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table><br/>
Tổng giá trị danh sách: <b><?=number_format ($tongthu,0,",",".")." VNĐ";?></b>
<div class="paging"><?=$paging['paging']?></div>