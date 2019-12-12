<div >
     <h4 style="font-size: 25px;">Блоги</h4>
     <p><a href="/admin/add_blog">Добавить блог</a></p>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>Имя</th>
            <th>Email</th>
            <th>Фото</th>
            <th>Login для входа</th>
            <th>Пароль для входа</th>
            <th>Редактировать блог</th>
            <th>Удалить блог</th>
            
        </tr>
    </thead>
    <tbody>
        <? foreach($blogs as $blog){?>
        <tr>
            <td><?=$blog['blog_name'];?></td>
            <td><?=$blog['blog_email'];?></td>
            <td><?=$blog['blog_foto'];?></td>
            <td><?=$blog['blog_login'];?></td>
            <td><?=$blog['blog_pass'];?></td>
            <td><a href="<?='/admin/update_blog/?blog_id='.$blog['blog_id'];?>">Редактировать</a></td>
            <td><a href="<?='/admin/delete_blog/?blog_id='.$blog['blog_id'];?>">Удалить</a></td>
        </tr>
       <?};?>     
       
    </tbody>
</table>
</div>
                  