<div >
     <h4 style="font-size: 25px;">Связи</h4>
     <p><a href="/admin/add_svaz">Добавить связь</a></p>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название страницы</th>
            <th>Название категории</th>
            <th>Удалить</th>
            
        </tr>
    </thead>
    <tbody>
        <? foreach($svazi as $svaz):?>
        <tr>
            <td><?=$svaz['svaz_id'];?></td>
            <td><? $page = Model::factory('page')->get_page_id($svaz['svaz_page_id']); echo $page['page_title'];?></td>
            <td><? $cat = Model::factory('cat')->get_cat($svaz['svaz_cat_id']); echo $cat['cat_title'];?></td>
            <td><a href="<?='/admin/delete_svaz/?svaz_id='.$svaz['svaz_id'];?>">Удалить</a></td>
        </tr>
       <? endforeach;?>     
       
    </tbody>
</table>
</div>
                  