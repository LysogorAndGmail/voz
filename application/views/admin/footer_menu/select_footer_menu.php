<div >
     <p><a href="/admin/add_footer_menu">Добавить footer menu</a></p>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Сылка</th>
            <th>Блок</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
    </thead>
    <tbody>
        <? foreach($all_footer_menu as $menu){?>
        <tr>
            <td><?=$menu['menu_id'];?></td>
            <td><?=$menu['menu_title'];?></td>
            <td><?=$menu['menu_link'];?></td>
            <td><? if($menu['blok_id'] == 1){ echo 'Довідкова інформація';} if($menu['blok_id'] == 2){ echo 'Міста партнери';} if($menu['blok_id'] == 3){ echo 'Центральні органи влади';} if($menu['blok_id'] == 4){ echo 'Регіональні органи влади';} if($menu['blok_id'] == 5){ echo 'Міські органи влади та установи';} ?></td>
            <td><a href="<?='/admin/update_footer_menu/?menu_id='.$menu['menu_id'];?>">Редактировать</a></td>
            <td><a href="<?='/admin/delete_footer_menu/?menu_id='.$menu['menu_id'];?>">Удалить</a></td>
        </tr>
       <?};?>     
       
    </tbody>
</table>
</div>
                  