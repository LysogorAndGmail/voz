<style>
#select_mat tr:nth-child(2n) {
    background-color: #303031;
}
</style>
<div>
    <? $mats = DB::select()->from('materials')->where('ho_insert','=','secretar')->execute()->as_array();?>
     <h4 style="font-size: 25px;">Материаллы</h4>
     <p><?='Всего материалов в базе - '.count($mats);?></p>
     <p><a href="/secretar/add_material">Добавить материалл</a></p>
     <table style="width: 100%;" id="newspaper-c" >
    <thead>
        <tr>
            <th style="width: 25px; ">ID</th>
            <th style="text-align: center; vertical-align: middle;">Название</th>
            <th style="text-align: center; vertical-align: middle;">Категория</th>
            <th style="text-align: center; vertical-align: middle;">Редактировать</th>
            <th style="text-align: center; vertical-align: middle;">Удалить</th>
        </tr>
    </thead>
    <tbody>
        <? foreach($mats as $material){?>
        <tr>
            <td style="text-align: center; vertical-align: middle;"><?=$material['material_id'];?></td>
            <td style="text-align: left; vertical-align: middle;"><a href="/material/<?=$material['material_id'];?>"><?=$material['material_title'];?></a></td>
            <td style="text-align: center; vertical-align: middle;"><? $catmat = Model::factory('material')->get_mat_cat($material['material_id']); echo $catmat['cat_title'];?></td>
            <td style="text-align: center; vertical-align: middle;"><a href="<?='/secretar/update_material/?material_id='.$material['material_id'];?>">Редактировать</a></td>
            <td style="text-align: center; vertical-align: middle;"><a href="<?='/secretar/delete_material/?material_id='.$material['material_id'];?>">Удалить</a></td>
        </tr>
       <? }?>     
    </tbody>
</table>
</div>
                  