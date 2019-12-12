<style>
#select_mat tr:nth-child(2n) {
    background-color: #303031;
}
</style>
<div>
    <? $cat_id = DB::select('moderator_cat_id')->from('moderator_cats')->where('moderator_cat_title','=',$moderator['moderator_category'])->execute()->current();
        $all_cats = DB::select('moderator_cat_id')->from('moderator_cats')->where('parent_cat','=',$cat_id)->execute()->as_array();
        if(!empty($all_cats)) {
            $materials = Model::factory('material')->get_all_moder_mat($all_cats);  
        } else {
            $materials = array();
        }
        
           ?>
     <h4 style="font-size: 25px;">Материаллы</h4>
     <p><?='Всего материалов в базе - '.count($materials);?></p>
     <p><a href="/moderator/add_material">Добавить материалл</a></p>
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
        <? foreach($materials as $material):?>
        <tr>
            <td style="text-align: center; vertical-align: middle;"><?=$material['material_id'];?></td>
            <td style="text-align: left; vertical-align: middle;"><a href="/material/<?=$material['material_id'];?>"><?=$material['material_title'];?></a></td>
            <td style="text-align: center; vertical-align: middle;"><? $catmat = Model::factory('moderatorcat')->get_cat($material['cat_id']); echo $catmat['moderator_cat_title'];?></td>
            <td style="text-align: center; vertical-align: middle;"><a href="<?='/moderator/update_material/?material_id='.$material['material_id'];?>">Редактировать</a></td>
            <td style="text-align: center; vertical-align: middle;"><a href="<?='/moderator/delete_material/?material_id='.$material['material_id'];?>">Удалить</a></td>
        </tr>
       <? endforeach;?>     
       
    </tbody>
</table>
</div>
                  