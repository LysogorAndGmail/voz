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
     <h4 style="font-size: 25px;">Редактирование депутата - <?echo '<span style="color:red;">'.$edit_dep['dep_name'].'</span>';?></h4>
     
     <form id="add_material" action="/admin/update_deputats_simple?dep_id=<?=$edit_dep['dep_id'];?>" method="post" >
          
          <label>Ф.И.О<br />
            <input name="dep_name" type="text" style="width:500px;" value="<?=$edit_dep['dep_name'];?>"/>
          </label>
          <br />
          <label>Фото:<br />
                <input type="text" name="dep_foto" maxlength="255" value="<?=$edit_dep['dep_foto'];?>" style="width:200px;" />
          </label>
          <br />
          <div style="width:678px;">
              <label>Текст:<br />
                <textarea name="dep_text" class="moxiecut" rows="50"><?=$edit_dep['dep_text'];?></textarea>
              </label>
          </div>
          <br />
         
          
          <div class="clear"></div>
            <input id="admin_login_submit" type="submit" value="Редактировать"/>  
        
    </form>
</div>
                  
                  
                  
                  
                  
                  
                   