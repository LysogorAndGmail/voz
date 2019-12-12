<div>
     <h4 style="font-size: 25px;">Депутатов всего - <? echo count($deputats);?></h4>
     <a href="/admin/add_dep">Добавить</a>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th style="width: 25px; ">№</th>
            <th>Инициалы</th>
            <th>Редактировать депутата</th>
            <th>Удалить депутата</th>
        </tr>
    </thead>
    <tbody>
        <? $i = 1; foreach($deputats as $user):?>
        <tr>
            <td><?=$i;?></td>
            <td><?=$user['dep_name'];?></td>
            <td><a href="<?='/admin/update_deputats_simple/?dep_id='.$user['dep_id'];?>">Редактировать</a></td>
            <td><a href="/admin/del_dep?dep_id=<?=$user['dep_id'];?>">Удалить</a></td>
        </tr>
       <? $i++; endforeach; ?>     
       
    </tbody>
</table>
</div>