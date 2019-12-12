<div class="main">
    <div class="container_24">
        <div class="show_page_text">
    <!-- -->
    <? $res = DB::select()->from('gazeta_cat')->execute()->as_array();?>
    <article class="grid_6 suffix_2">
        <h3 style="text-align: center; margin-left: 90px;">Розділи</h3>
        <ul class="list-1" style="width: 290px;">
        <? foreach($res as $g_cat){?>
            <li style="margin-left: 18px;"><a href="/gazeta_cat/<?=$g_cat['g_c_id'];?>"><span><? echo $g_cat['g_c_title'];?></span></a></li>
        <?}?>
        <? foreach($svazi_mat as $svaz_mat){?>
            <li style="margin-left: 18px;"><a href="/material/<?=$svaz_mat['mat_id'];?>"><span><? $mat = Model::factory('material')->get_material($svaz_mat['mat_id']); echo $mat['material_title'];?></span></a></li>
        <?}?>
        </ul>
    </article>
    <!-- -->
            
            <h2><?php echo $page['page_title'];?></h2>
            <div class=""><?php echo $page['page_text'];?></div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    
               
</div>