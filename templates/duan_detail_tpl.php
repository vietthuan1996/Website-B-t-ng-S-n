<div class="tcat">Chi tiết dự án</div>
   <div class="content">     
		<div class="title_news"><?=$tintuc_detail[0]['ten'.$lang]?>        </div>
           <?=$tintuc_detail[0]['noidung'.$lang]?>
           
          <div class="othernews">
           <h1>Các dự án khác</h1>
           <ul>
           
<?php foreach($tintuc_khac as $tinkhac){?>
<li><a href="du-an/<?=$tinkhac['tenkhongdau']?>-<?=$tinkhac['id']?>.html" style="text-decoration:none;"><?=$tinkhac['ten']?></a> (<?=make_date($tinkhac['ngaytao'])?>)</li>
<?php }?>
     </ul>
</div>
         </div>