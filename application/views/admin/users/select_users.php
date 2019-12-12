<?php

/**
 * @author admin
 * @copyright 2012
 */
?>
<div>
     <h4 style="font-size: 25px;">Пользователи - <? echo count($users);?></h4>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>№</th>
            <th>ID</th>
            <th>Логин</th>
            <th>Email</th>
            <th>Редактировать пользователя</th>
            <th>Удалить пользователя</th>
        </tr>
    </thead>
    <tbody>
        <? $i = 1; foreach($users as $user):?>
        <tr>
            <td><? echo $i;?></td>
            <td><?=$user['user_id'];?></td>
            <td><?=$user['user_login'];?></td>
            <td><?=$user['user_email'];?></td>
            <td><a href="<?='/admin/update_user/?user_id='.$user['user_id'];?>">Редактировать</a></td>
            <td><a href="<?='/admin/delete_user/?user_id='.$user['user_id'];?>">Удалить</a></td>
        </tr>
       <? $i++; endforeach; ?>     
       
    </tbody>
</table>
</div>