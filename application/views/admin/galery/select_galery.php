<div>
     <h4 style="font-size: 25px;">всего картинок - <? echo count($galery_img);?></h4>
     <a href="/admin/add_galery">Добавить картинку</a>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>№</th>
            <th>Название картинки</th>
            <th>Описание картинки</th>
            <th>Удалить видео</th>
        </tr>
    </thead>
    <tbody>
        <? $i = 1; foreach($galery_img as $img):?>
        <tr>
            <td><?=$i;?></td>
            <td><?=$img['galery_name'];?></td>
            <td><?=$img['galery_desc'];?></td>
            <td><a href="<?='/admin/delete_galery/?id='.$img['galery_id'];?>">Удалить</a></td>
        </tr>
       <? $i++; endforeach; ?>     
       
    </tbody>
</table>
</div>