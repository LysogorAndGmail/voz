<div >
     <h4 style="font-size: 25px;">Категории</h4>
     <p><a href="/gazetaadmin/add_gazeta_cat">Добавить категорию</a></p>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название категории</th>
            <th>Удалить категорию</th>
            
        </tr>
    </thead>
    <tbody>
        <? $all_cats = DB::select()->from('gazeta_cat')->execute()->as_array();
         foreach($all_cats as $cat){?>
        <tr>
            <td><?=$cat['g_c_id'];?></td>
            <td><?=$cat['g_c_title'];?></td>
            <td><a href="<?='/gazetaadmin/delete_gazeta_cat/?cat_id='.$cat['g_c_id'];?>">Удалить</a></td>
        </tr>
       <? }?>     
       
    </tbody>
</table>
</div>
                  