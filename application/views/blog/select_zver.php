<div >
     <h4 style="font-size: 25px;">Звернення громадян</h4>
     <table style="width: 100%;  font-size:16px;" id="newspaper-c">
    <thead>
        <tr>
            <th>Публикация</th>
            <th>Ответ</th>
            <th>П.І.Б</th>
            <th>Дата</th>
            <th>Текст</th>
            <th>Статус</th>
            <th>Удалить</th>
        </tr>
    </thead>
    <tbody>
        <? foreach($blog_zver as $zver){?>
        <tr>
            <td><a href="<?='/blogadmin/chenge_blog_zver/?id='.$zver['blog_z_id'];?>">Опубликовать</a></td>
            <td><a href="<?='/blogadmin/ansfer_blog_zver/?id='.$zver['blog_z_id'];?>">Ответить</a></td>
            <td><?=$zver['user_name'];?></td>
            <td><?=$zver['zver_date'];?></td>
            <td><?=$zver['zver_text'];?></td>
            <td><? if($zver['zver_status'] == 0){ echo 'Не опубликовано';}else{ echo 'Опубликовано';}?></td>
            <td><a href="<?='/blogadmin/delete_blog_zver/?id='.$zver['blog_z_id'];?>">Удалить</a></td>
        </tr>
       <? }?>     
    </tbody>
</table>
</div>
                  