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
     <h4 style="font-size: 25px;">Добавление материалла</h4>
     
     <form id="add_material" action="" method="post" >
          <div class="blo">
          Категории:<br />
          <? foreach($cats_parent as $parent){?>
          <div class="all_parent">
          <p class="all_title"><?=$parent['cat_title'];?></p>
          <div class="clear"></div>
          <div class="block_cats">
          <? foreach($cats as $cat=>$mat){ ?>
                <?if($mat['parent_id'] == $parent['cat_id']):?>
                <p><input type="checkbox"  class="sss" name="cats[]" value="<?=$mat['cat_id'];?>" <? foreach($secretar_cats as $sec){ if($sec['cat_id'] == $mat['cat_id']){ echo 'checked="checked"'; }  }?>><span><?=$mat['cat_title'];?></span></p>
                <?endif;?>
          <? }?>
          </div>
          </div>
              
          <?}?>
          </div>
          <div class="clear"></div>
                <input id="admin_login_submit" class="check_luda" type="submit" value="Добавить"/>  
    </form>
</div>

<script type="text/javascript">
$('.check_luda').click(function(){
    if($('.block_cats input:checked').length < 1) {
        alert('Люда выбери категорию!');
        return false;
    }
    
})

</script>
                  