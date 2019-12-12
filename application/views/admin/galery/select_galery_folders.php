<div>
     <h4 style="font-size: 25px;">всего папок - <? echo count($folders);?></h4>
     <a href="/admin/add_galery_folder">Добавить папку</a>
     <br />
     <a href="/admin/add_galery">Добавить картинку</a>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>№</th>
            <th>Название папки</th>
            <th>Картинок в папке</th>
            <th>Редактировать папку</th>
            <th>Удалить папку</th>
        </tr>
    </thead>
    <tbody>
        <? foreach($folders as $folder){?>
        <tr>
            <td><?=$folder['id'];?></td>
            <td><?=$folder['name'];?></td>
            <td><? $rs = DB::select()->from('galery')->where('folder_id','=',$folder['id'])->execute()->as_array(); echo count($rs);?></td>
            <td><a href="<?='/admin/update_folder/?id='.$folder['id'];?>">Редактировать</a></td>
            <td><a href="<?='/admin/delete_galery/?id='.$folder['id'];?>">Удалить</a></td>
        </tr>
       <? } ?>     
       
    </tbody>
</table>
</div>