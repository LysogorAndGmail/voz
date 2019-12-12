<div class="main">
    <div class="container_24">
        <div id="show_page">
            <!-- -->
    <? if(!empty($svazi) || !empty($svazi_mat)) {?>
    <article class="grid_6 suffix_2">
        <h3 style="text-align: center; margin-left: 90px;">Розділи</h3>
        <ul class="list-1" style="width: 290px;">
        <? foreach($svazi as $svaz){?>
            <li style="margin-left: 18px;"><a href="/cat/<?=$svaz['svaz_cat_id'];?>"><span><? $cat = Model::factory('cat')->get_cat($svaz['svaz_cat_id']); echo $cat['cat_title'];?></span></a></li>
        <?}?>
        <? foreach($svazi_mat as $svaz_mat){?>
            <li style="margin-left: 18px;"><a href="/material/<?=$svaz_mat['mat_id'];?>"><span><? $mat = Model::factory('material')->get_material($svaz_mat['mat_id']); echo $mat['material_title'];?></span></a></li>
        <?}?>
        </ul>
    </article>
    <?}?>
    <!-- -->
            <h2><?php echo $page['page_title'];?></h2>
            <div class="show_page_text"><?php echo $page['page_text'];?></div>
        </div>
        <div class="clear"></div>
    </div>
    
               
</div>