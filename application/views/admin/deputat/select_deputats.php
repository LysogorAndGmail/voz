<div>
     <h4 style="font-size: 25px;">Депутатов всего - <? echo count($deputats);?><br /> <a href="/admin/select_dep_simple">деп. меж</a></h4>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>№</th>
            <th>Инициалы</th>
            <th>Округ</th>
            <th>Email</th>
            <th>События</th>
            <th>Редактировать депутата</th>
        </tr>
    </thead>
    <tbody>
        <? $i = 1; foreach($deputats as $user):?>
        <tr>
            <td><?=$i;?></td>
            <td><?=$user['dep_name'];?></td>
            <td><?=$user['dep_okrug'];?></td>
            <td><?=$user['dep_email'];?></td>
            <td><a href="/admin/event_dep?dep_id=<?=$user['dep_id'];?>">Cобытия</a></td>
            <td><a href="<?='/admin/update_deputats/?dep_id='.$user['dep_id'];?>">Редактировать</a></td>
        </tr>
       <? $i++; endforeach; ?>     
       
    </tbody>
</table>
</div>