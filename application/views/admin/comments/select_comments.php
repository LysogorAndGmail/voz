<div >
     <h4 style="font-size: 25px;">Комментарии</h4>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>Status</th>
            <th>Имя</th>
            <th>текст</th>
            <th>материал</th>
            <th>дата</th>
            <th>публиковать</th>
            <th>Удалить</th>
            
        </tr>
    </thead>
    <tbody>
        <? foreach($comments as $com){?>
        <tr>
            <td><? if($com['comment_status'] == 0) { echo "<span style='color:red;'>в ожидании</span>";} else { echo "<span style='color:green;'>опубликовано</span>";};?></td>
            <td><?=$com['name'];?></td>
            <td><?=$com['comment_text'];?></td>
            <td><?=$com['mat_id'];?></td>
            <td><?=$com['comment_date'];?></td>
            <td><a href="<?='/admin/com_publish?com_id='.$com['comment_id'];?>">публиковать</a></td>
            <td><a href="<?='/admin/delete_comment/?com_id='.$com['comment_id'];?>">Удалить</a></td>
        </tr>
       <?};?>     
       
    </tbody>
</table>
</div>
                  