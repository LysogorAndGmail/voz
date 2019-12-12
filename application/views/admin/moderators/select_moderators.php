<?php

/**
 * @author admin
 * @copyright 2012
 */
?>
<div>
    
     <h4 style="font-size: 25px;">Модераторы - <? echo count($moderators);?></h4>
     <p><a href="/admin/add_moderator">Добавить модератора</a></p>
     <table style="width: 100%;" id="newspaper-c">   
    <thead>
        <tr>
            <th>№</th>
            <th>ID</th>
            <th>Логин</th>
			<th>Категория</th>
            <th>Удалить модератора</th>
        </tr>
    </thead>
    <tbody>
        <? $i = 1; foreach($moderators as $user):?>
        <tr>
            <td><? echo $i;?></td>
            <td><?=$user['moderator_id'];?></td>
            <td><?=$user['moderator_login'];?></td>
			<td><?=$user['moderator_category'];?></td>
            <td><a href="<?='/admin/delete_moderator/?moderator_id='.$user['moderator_id'];?>">Удалить</a></td>
        </tr>
       <? $i++; endforeach; ?>     
       
    </tbody>
</table>
</div>