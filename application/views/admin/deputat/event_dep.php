<div>
     <h4 style="font-size: 25px;"><a href="/admin/add_event_dep?dep_id=<?=$_GET['dep_id'];?>">Добавить</a></h4>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>Название</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
    </thead>
    <tbody>
        <?foreach($all as $a){?>
        <tr>
            <td><?=$a['event_title'];?></td>
            <td><a href="<?='/admin/update_event/?event_id='.$a['event_id'];?>">Редактировать</a></td>
            <td><a href="/admin/del_event?event_id=<?=$a['event_id'];?>">Удалить</a></td>
        </tr>
       <?}; ?>     
       
    </tbody>
</table>
</div>