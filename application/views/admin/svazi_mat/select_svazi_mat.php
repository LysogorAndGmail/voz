<div >
     <h4 style="font-size: 25px;">Связи</h4>
     <p><a href="/admin/add_svaz_mat">Добавить связь c материалом</a></p>
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
        <? foreach($svazi_mat as $svaz){?>
        <tr>
            <td><?=$svaz['s_m_id'];?></td>
            <td><? $page = Model::factory('page')->get_page_id($svaz['page_id']); echo $page['page_title'];?></td>
            <td><? $mat = Model::factory('material')->get_material($svaz['mat_id']); echo $mat['material_title'];?></td>
            <td><a href="<?='/admin/delete_svaz_mat/?svaz_mat_id='.$svaz['s_m_id'];?>">Удалить</a></td>
        </tr>
       <?}?>     
       
    </tbody>
</table>
</div>
                  