<div >
     <h4 style="font-size: 25px;">Звернення блог громадян</h4>
     <table style="width: 100%;  font-size:16px;" cellpadding="5" cellspacing="5" border="5">
    <thead>
        <tr style="color:grey;">
            <td>Публикация</td>
            <td>Ответ</td>
            <td>Блог</td>
            <td>П.І.Б</td>
            <td>Дата</td>
            <td>Текст</td>
            <td>Статус</td>
            <td>Удалить</td>
        </tr>
    </thead>
    <tbody>
        <? foreach($blog_zver as $zver){?>
        <tr style="border:1px solid blue;">
            <td><a href="<?='/admin/chenge_blog_zver/?id='.$zver['blog_z_id'];?>">Опубликовать</a></td>
            <td><a href="<?='/admin/ansfer_blog_zver/?id='.$zver['blog_z_id'];?>">Ответить</a></td>
            <td><? $blog = DB::select()->from('blogs')->where('blog_id','=',$zver['blog_id'])->execute()->current(); echo $blog['blog_name'];?></td>
            <td><?=$zver['user_name'];?></td>
            <td><?=$zver['zver_date'];?></td>
            <td><?=$zver['zver_text'];?></td>
            <td><? if($zver['zver_status'] == 0){ echo 'Не опубликовано';}else{ echo 'Опубликовано';}?></td>
            <td><a href="<?='/admin/edit_blog_zver/?id='.$zver['blog_z_id'];?>">Редактировать</a>&nbsp;&nbsp;<a href="<?='/admin/delete_blog_zver/?id='.$zver['blog_z_id'];?>">Удалить</a></td>
        </tr>
       <? }?>     
    </tbody>
</table>
</div>
                  