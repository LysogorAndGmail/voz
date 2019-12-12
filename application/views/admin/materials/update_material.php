<script type="text/javascript" src="<?php echo Kohana::$base_url?>js/tinymce/tinymce.js"></script>
<script type="text/javascript">
tinymce.PluginManager.load('moxiecut', '<?php echo Kohana::$base_url?>js/tinymce/plugins/moxiecut/plugin.min.js');
tinymce.init({
    selector: ".moxiecut",
    theme: "modern",
    language: "ru",
    plugins: [
	    "advlist autolink lists link image charmap print preview anchor",
		"searchreplace visualblocks code fullscreen",
		"insertdatetime media table contextmenu paste moxiecut"
	],
	toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link insertfile image media",
	autosave_ask_before_unload: false,
    height: 800,
    relative_urls: false
});
</script>

<div style="margin-left: 20px;">
     <h4 style="font-size: 25px;">Редактирование материалла - <?echo '<span style="color:red;">'.$edit_material['material_title'].'</span>';?></h4>
     
     <form id="add_material" action="/admin/update_material?material_id=<?=$edit_material['material_id'];?>" method="post" >
          
          
          <label>Иконка материала:<br />
                <input type="text" name="material_img" maxlength="255" value="<?=$edit_material['material_img'];?>" style="width:200px;" />
          </label>
          <br />
          <label>Название:<br />
            <input name="material_title" type="text" style="width:500px;" value="<?=$edit_material['material_title'];?>"/>
          </label>
          <br />
          <label>Краткое описание:<br />
                <input type="text" name="material_short" maxlength="255" value="<?=$edit_material['material_short'];?>" style="width:678px; height: 50px;" />
          </label>
          <br />
          <label>Ключевые слова:<br />
            <input name="material_key_words" type="text" style="width:500px;" value="<?=$edit_material['material_key_words'];?>" />
          </label>
          <br />
          <label>Ключевые фразы:<br />
            <input name="material_desc" type="text" style="width:500px;" value="<?=$edit_material['material_desc'];?>" />
          </label>
          <br />
          <div style="width:930px; height: 1000px;">
          <label>Текст:<br />
            <textarea name="material_text" rows="50"  class="moxiecut"><?=$edit_material['material_text'];?></textarea>
          </label>
          <br />
          </div>
          
          <label>Дата создания:<br />
            <input type="text" name="material_date" value="<? if(empty($edit_material['material_date'])) {
                echo Date('Y-m-d');
            }else {
              echo $edit_material['material_date'];
            }?>"/>
          </label>
          <br />
          <br />
         <div class="blo">
          Категории:<br />
          <? ?>
          
          <? foreach($cats_parent as $parent):?>
          <div class="all_parent">
          <p class="all_title"><?=$parent['cat_title'];?></p>
          <div class="clear"></div>
          <div class="block_cats">
          <? foreach($cats as $cat=>$mat){ ?>
                <?if($mat['parent_id'] == $parent['cat_id']):?>
                <p><input type="checkbox" name="cat_mat[]"
                
                
                
                <? foreach($edit_material_cat as $mat_cat){
                        
                        if($mat_cat['cat_id'] == $mat['cat_id'])
                        { 
                            echo 'checked';
                        }
                    
                   } ?> 
                
                
                
                
                 value="<?=$mat['cat_id'];?>"><span><?=$mat['cat_title'];?></span></p>
                <?endif;?>
          <? }?>
          </div>
          </div>
              
          <?endforeach;?>
          </div>
          <br />
          
          <div class="clear"></div>
            <input id="admin_login_submit" type="submit" value="Редактировать"/>  
        
    </form>
</div>
                  
                  
                  
                  
                  
                  
                   