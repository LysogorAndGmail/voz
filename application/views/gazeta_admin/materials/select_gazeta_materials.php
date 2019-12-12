<style>
#select_mat tr:nth-child(2n) {
    background-color: #303031;
}
</style>
<div>
     <h4 style="font-size: 25px;">Материаллы</h4>
     <p><?='Всего материалов в базе - '.count($gazeta_materials);?></p>
     <p><a href="/gazetaadmin/add_gazeta_material">Добавить материалл</a></p>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Редактировать</th>
            <th>Удалить</th>
            
        </tr>
    </thead>
    <tbody>
        <? foreach($gazeta_materials as $material){?>
        <tr>
            <td><?=$material['g_m_id'];?></td>
            <td><a href="/gazeta_mat/<?=$material['g_m_id'];?>"><?=$material['g_m_title'];?></a></td>
            <td><? $catmat = DB::select()->from('gazeta_cat')->where('g_c_id','=',$material['g_m_cat_id'])->execute()->current(); echo $catmat['g_c_title'];?></td>
            <td><a href="<?='/gazetaadmin/update_gazeta_material/?material_id='.$material['g_m_id'];?>">Редактировать</a></td>
            <td><a href="<?='/gazetaadmin/delete_gazeta_material/?material_id='.$material['g_m_id'];?>">Удалить</a></td>
        </tr>
       <? }?>     
       
    </tbody>
</table>
</div>
                  