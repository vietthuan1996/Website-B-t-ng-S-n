<div class="tcat"><?=$tintuc_detail[0]['ten'.$lang]?></div>
   <div class="content">             
           <?=$tintuc_detail[0]['noidung'.$lang]?>
           
          <div class="othernews">
           <h1>Các bài khác</h1>
           <ul>
           
<?php foreach($tintuc_khac as $tinkhac){?>
<li><a href="gioi-thieu/<?=$tinkhac['id']?>/<?=$tinkhac['tenkhongdau']?>.html" style="text-decoration:none;"><?=$tinkhac['ten']?></a> (<?=make_date($tinkhac['ngaytao'])?>)</li>
<?php }?>
     </ul>
</div>
         </div>