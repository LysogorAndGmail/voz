<div >
     <h4 style="font-size: 25px;">Страницы</h4>
     <p><a href="/admin/add_page">Добавить страницу</a></p>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название страницы</th>
            <th>Алиас страницы</th>
            <th>Мета слова</th>
            <th>Мета описание</th>
            <th>Редактировать страницу</th>
            <th>Удалить страницу</th>
            
        </tr>
    </thead>
    <tbody>
        <? foreach($pages as $page):?>
        <tr>
            <td><?=$page['page_id'];?></td>
            <td><?=$page['page_title'];?></td>
            <td><?=$page['page_alias'];?></td>
            <td><?=$page['page_meta_key'];?></td>
            <td><?=$page['page_meta_desc'];?></td>
            <td><a href="<?='/admin/update_page/?page_alias='.$page['page_alias'];?>">Редактировать</a></td>
            <td><a href="<?='/admin/delete_page/?page_id='.$page['page_id'];?>">Удалить</a></td>
        </tr>
       <? endforeach;?>     
       
    </tbody>
</table>
</div>
                  