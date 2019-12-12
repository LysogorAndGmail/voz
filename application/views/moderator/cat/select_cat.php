<div >
     <h4 style="font-size: 25px;">Категории</h4>
     <p><a href="/moderator/add_cat">Добавить категорию</a></p>
     <table style="width: 100%;" id="newspaper-c" >
    <thead>
        <tr>
            <th style="width: 25px; ">ID</th>
            <th>Название категории</th>
            <th>Описание категории</th>
            <th>Редактировать категорию</th>
            <th>Удалить категорию</th>
            
        </tr>
    </thead>
    <tbody>
        <? $cat_id = DB::select('moderator_cat_id')->from('moderator_cats')->where('moderator_cat_title','=',$moderator['moderator_category'])->execute()->current();
           $all_cats = DB::select()->from('moderator_cats')->where('parent_cat','=',$cat_id)->execute()->as_array();
         foreach($all_cats as $cat):?>
        <tr>
            <td><?=$cat['moderator_cat_id'];?></td>
            <td><?=$cat['moderator_cat_title'];?></td>
             <td><?=$cat['moderator_cat_desc'];?></td>
            <td><a href="<?='/moderator/update_cat/?cat_id='.$cat['moderator_cat_id'];?>">Редактировать</a></td>
            <td><a href="<?='/moderator/delete_cat/?cat_id='.$cat['moderator_cat_id'];?>">Удалить</a></td>
        </tr>
       <? endforeach;?>     
       
    </tbody>
</table>
</div>
                  