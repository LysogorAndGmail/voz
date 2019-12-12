<div class="upimg">
    <p>Загрузить картинки на сервер</p>
    <form action="/admin/upload_materials_img" method="POST" enctype="multipart/form-data">
        <input type="file" name="mat_img"/>
        <input type="submit" value="ЗАГРУЗИТЬ"/>
    </form>
</div>
<div>
     <h4 style="font-size: 25px;">Материаллы</h4>
     <p><?='Всего материалов в базе - '.count($materials);?></p>
     <p><a href="/admin/add_material">Добавить материалл</a></p>
     <table style="width: 100%;" id="newspaper-c" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Дата публикации</th>
            <th>Редактировать</th>
            <th>Удалить</th>
            
        </tr>
    </thead>
    <tbody>
        <? foreach($materials as $material):?>
        <tr>
            <td><?=$material['material_id'];?></td>
            <td><a href="/material/<?=$material['material_id'];?>"><?=$material['material_title'];?></a></td>
            <td><?=date('d.m.Y',strtotime($material['material_date']));?></td>
            <td><a href="<?='/admin/update_material/?material_id='.$material['material_id'];?>">Редактировать</a></td>
            <td><a href="<?='/admin/delete_material/?material_id='.$material['material_id'];?>">Удалить</a></td>
        </tr>
       <? endforeach;?>     
       
    </tbody>
</table>
</div>
                  