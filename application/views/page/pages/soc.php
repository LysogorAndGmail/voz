<div class="main">
    <div class="container_24">
        <div class="show_page_text">
            <!-- -->
    <? $res = DB::select()->from('moderator_cats')->where('parent_cat','=',16)->execute()->as_array();?>
    <article class="grid_6 suffix_2" style="width: 40%; float: left;">
        <h3 style="text-align: left; margin-left: 90px;">Розділи</h3>
        <ul class="list-1" style="width: 290px;">
        <? foreach($res as $r){?>
            <li style="margin-left: 18px;"><a href="/moderator_cat/<?=$r['moderator_cat_id'];?>"><span><? echo $r['moderator_cat_title'];?></span></a></li>
        <?}?>
        </ul>
    </article>
    
    <!-- -->
            
            <div  style="width: 45%; float: right;">
                <h2><?php echo $page['page_title'];?></h2>
                <?php echo $page['page_text'];?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    
               
</div>