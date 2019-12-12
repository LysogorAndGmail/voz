<div style="padding: 20px;">
     <h4 style="font-size: 25px;">Редактирование категорий</h4>
     <ul>
     <?foreach($cats as $cat):?>
         <li style="margin:20px;"><a style="font-size: 24px; padding-left: 30px;" href="<?='/admin/update_cat/?cat_id='.$cat->cat_id;?>"><?=$cat->cat_title;?></a></li>
     <?endforeach;?> 
     </ul>
</div>
                  