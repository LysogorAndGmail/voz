<div class="main">
    <div class="container_24">
        <div id="show_page">            

    <? if(!$materials_all) {?>
        <h2 class="cat_title"><?=$cat['cat_title'];?></h2>
    <? } else { ?>
      <div class="bread">
        <p>
            <span>
                Головна -> 
            </span>
            <span>
                <a href='/cat/<?=$parent_cat['cat_id'];?>'><?=$parent_cat['cat_title'];?>  </a> ->
            </span>
            <span>
                <a href='/cat/<?=$cat['cat_id'];?>'><?=$cat['cat_title'];?></a>
            </span>
        </p> 
      </div>
    <?}?>

    
     <? if(isset($materials_all)) { foreach($materials_all as $material){?>
                <div class="padding-1">
                        <?if(!empty($material['material_img'])){?>
                        <a href="<?=Kohana::$base_url."material/".$material['material_id'];?>"><img src="<?=Kohana::$base_url;?>material_images/<?echo $material['material_img'];?>" alt="" width="269" height="174" class="img-indent"/></a>
                        <?}else {?>
                        <a href="<?=Kohana::$base_url."material/".$material['material_id'];?>"><img src="<?=Kohana::$base_url;?>material_images/no_foto_mat.jpg" alt="" class="img-indent"/></a>
                        <?}?>
                        
                        <div class="text-box-1" style="width: 66% !important;">
                            <h4 style="margin-top: -10px;"><a href="<?=Kohana::$base_url."material/".$material['material_id'];?>"><?=$material['material_title'];?></a></h4>
                            <div><?=$material['material_short'];?></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                <p class="border_bot" style="border-bottom: 1px dashed #fe96d1;"></p> 
                <? }?>
                
                <?=$pagination?>
              <?}?>
              <? if(isset($children_cat)){?>
              <div class="show_cats_block">
                    <ul class="show_most_cat">
                        <div class="show_page_text">
                        <h4 style="font-size: 18px;">Всі категорії:</h4>
                        <? foreach($children_cat as $cat){?>
                          <li>                                
                                <a href="<?='/cat/'.$cat['cat_id'];?>"><?=$cat['cat_title'];?></a>
                          </li>
                         <? }?>
                        </div>
                         <div class="clear"></div>
                    </ul>
                    <div class="clear"></div>
              </div>
               
              <? } ?>   
            </div>
        </div>
        <div class="clear"></div>
    </div>
    
               



                                   