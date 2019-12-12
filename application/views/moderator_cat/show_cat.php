<div class="main">
    <div class="container_24">
        <div id="show_page">            

    <? if(!$materials_all) {?>
        <h2 class="cat_title"><?=$cat['moderator_cat_title'];?></h2>
    <? } else { ?>
     <div class="bread">   
        <p>
            <span>
                <a href="/">Главная </a> -> 
            </span>
            <span>
                <a href='/moderator_cat/<?=$parent_cat['moderator_cat_id'];?>'><?=$parent_cat['moderator_cat_title'];?>  </a> ->
            </span>
            <span>
                <a href='/moderator_cat/<?=$cat['moderator_cat_id'];?>'><?=$cat['moderator_cat_title'];?></a>
            </span>
        </p>
    </div> 
    <?}?>

    
  <div class="cat_desc"><?=$cat['moderator_cat_desc'];?></div>
    
     <? if(isset($materials_all)) { foreach($materials_all as $material){?>
                <div class="padding-1">
                        <a href="<?echo 'material/'.$material['material_id'];?>">
                            <img src="<?=Kohana::$base_url;?>moderator_icons/<? echo $material['mod_id'].'.jpg';?>" alt="" width="400" height="300" class="img-indent"/>
                        </a>
                        
                        <div class="text-box-1" style="width: 66% !important;">
                            <h4 style="margin-top: -10px;"><a href="<?=Kohana::$base_url."material/".$material['material_id'];?>"><?=$material['material_title'];?></a></h4>
                            <div><?=$material['material_desc'];?></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                <p class="border_bot" style="border-bottom: 1px dashed #fe96d1;"></p> 
                <? }?>
                <?=$pagination?>
                <? }?>
              <? if(isset($children_cat)) {?>
              <div class="show_cats_block">
                    <ul class="show_most_cat">
                        <div class="show_page_text">
                        <h4 style="font-size: 18px;">Все категории:</h4>
                        <? foreach($children_cat as $cat){?>
                          <li>                                
                                <a href="<?='/moderator_cat/'.$cat['moderator_cat_id'];?>"><?=$cat['moderator_cat_title'];?></a>
                          </li>
                         <? }?>
                        </div>
                         <div class="clear"></div>
                    </ul>
                    <div class="clear"></div>
              </div>
               
              <? }?>   
            </div>
        </div>
        <div class="clear"></div>
    </div>
    
               



                                   