<?php  if(!defined('_source')) die("Error");

		$title_bar='Tours du lịch - ';
	
		#Chi tiet tours
		if(isset($_GET['id'])){
			$id =  $_GET['id'];
			settype($id,"int");
			$sql = "select * from #_tours where id='".$id."'";
			$d->query($sql);
			$tours_detail = $d->result_array();
			
			#các tours cu hon
			$sql_khac = "select tieude,id from #_tours where id <'".$id."' order by id desc limit 0,5";
			$d->query($sql_khac);
			$tintuc_khac = $d->result_array();
			
			# Hinh anh theo tours
			$sql_pic="SELECT * FROM #_tours_pic WHERE id_tours='$id' ORDER BY id";
			$d->query($sql_pic);
			$pic = $d->result_array();	
			
			$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
			$url="index.php?com=tours&id=$id";
			$maxR=5;
			$maxP=5;
			$paging=paging($pic, $url, $curPage, $maxR, $maxP);
			$pic=$paging['source'];	
			
			$title_bar=$tours_detail[0]['tieude'].' - ';
		}elseif(isset($_GET['idc'])){
			$idc =  $_GET['idc'];
			settype($idc,"int");
			// chi tiet loai tours
			$sql_loaitours="SELECT tenloai FROM #_tours_item WHERE idloai='$idc'";
			$d->query($sql_loaitours);
			$loaitours=$d->result_array();
			$title_bar=$loaitours[0]['tenloai'].' - ';
			
			//cac tours trong loai
			$sql_tintuc = "select * from #_tours where idloai='$idc'  order by id desc";
			$d->query($sql_tintuc);
			$tintuc = $d->result_array();	
			
			$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
			$url="index.php?com=tours&idc=$idc";
			$maxR=5;
			$maxP=5;
			$paging=paging($tintuc, $url, $curPage, $maxR, $maxP);
			$tintuc=$paging['source'];						
		}elseif(isset($_GET['idl'])){
			$idl =  $_GET['idl'];
			settype($idl,"int");
			// chi tiet loai tours
			if($idl==1)	{ $title_bar='Du lịch nước ngoài - '; $title_tours='Du lịch nước ngoài'; }
			elseif($idl==2) { $title_bar='Du lịch trong nước - ';$title_tours='Du lịch trong nước'; }
			else { $title_bar='Tour lẻ trong tuần - ';$title_tours='Tour lẻ trong tuần';}
			
			//cac tours trong loai
			$sql_tintuc = "select * from #_tours where idloai IN ( SELECT idloai FROM #_tours_item WHERE id_cat='$idl' )  order by id desc";
			$d->query($sql_tintuc);
			$tintuc = $d->result_array();	
			
			$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
			$url="index.php?com=tours&idl=$idl";
			$maxR=5;
			$maxP=5;
			$paging=paging($tintuc, $url, $curPage, $maxR, $maxP);
			$tintuc=$paging['source'];						
		}else{
			// cac tour
			$sql_tintuc = "select * from #_tours order by id desc";
			$d->query($sql_tintuc);
			$tintuc = $d->result_array();	
			
			$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
			$url="index.php?com=tours";
			$maxR=5;
			$maxP=5;
			$paging=paging($tintuc, $url, $curPage, $maxR, $maxP);
			$tintuc=$paging['source'];		
		}
?>