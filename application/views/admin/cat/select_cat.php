<div >
     <h4 style="font-size: 25px;">Категории</h4>
     <p><a href="/admin/add_cat">Добавить категорию</a></p>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th style="width: 25px; ">ID</th>
            <th>Название категории</th>
            <th>Важности</th>
            <th>Видимость</th>
            <th>Редактировать категорию</th>
            <th>Удалить категорию</th>
            
        </tr>
    </thead>
    <tbody>
        <? foreach($cats as $cat):?>
        <tr>
            <td><?=$cat['cat_id'];?></td>
            <td><?=$cat['cat_title'];?></td>
            <td><?if($cat['parent_id'] == 0){echo 'Родитель';}?></td>
            <td><?if($cat['visible'] == 0){echo 'Не видимо';}else{echo 'Видимо';}?></td>
            <td><a href="<?='/admin/update_cat/?cat_id='.$cat['cat_id'];?>">Редактировать</a></td>
            <td><a href="<?='/admin/delete_cat/?cat_id='.$cat['cat_id'];?>">Удалить</a></td>
        </tr>
       <? endforeach;?>     
       
    </tbody>
</table>
</div>
                  