<div>
     <h4 style="font-size: 25px;">Документов - <? echo count($docs);?></h4>
     <table style="width: 100%;" id="newspaper-c">
     <a href="/admin/add_doc">Добавить</a>
    <thead>
        <tr>
            <th>№</th>
            <th>тип</th>
            <th>Название</th>
            <th>Номер</th>
            <th style="width: 85px;">Дата</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
    </thead>
    <tbody>
        <? $i = 1; foreach($docs as $doc):?>
        <tr>
            <td><? echo $i;?></td>
            <td><? if($doc['doc_type'] == 1){ echo 'Рішення МР';} if($doc['doc_type'] == 2){ echo 'Рішення ВК';} if($doc['doc_type'] == 3){ echo 'Розпорядження МГ';} if($doc['doc_type'] == 4){ echo 'Проекти  рішень';} ?></td>
            <td><?=$doc['doc_name'];?></td>
            <td><?=$doc['doc_n'];?></td>
            <td><?=Date('d.m.Y',strtotime($doc['doc_date']));;?></td>
            <td><a href="<?='/admin/update_doc/?doc_id='.$doc['doc_id'];?>">Редактировать</a></td>
            <td><a href="<?='/admin/delete_doc/?doc_id='.$doc['doc_id'];?>">Удалить</a></td>
        </tr>
       <? $i++; endforeach; ?>     
       
    </tbody>
</table>
</div>