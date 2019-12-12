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
     <h4 style="font-size: 25px;">Редактировать Блог</h4>
     
     <form id="add_material" action="/admin/update_blog?blog_id=<?=$edit_blog['blog_id'];?>" method="post" >
          <label>login<br />
            <input name="blog_login" type="text" style="width:500px;" value="<?=$edit_blog['blog_login'];?>"/>
          </label>
          <br />
          <label>Пароль<br />
            <input name="blog_pass" type="text" style="width:500px;" value="<?=$edit_blog['blog_pass'];?>"/>
          </label>
          <br />
          <label>Ф.И.О<br />
            <input name="blog_name" type="text" style="width:500px;" value="<?=$edit_blog['blog_name'];?>"/>
          </label>
          <br />
          <label>Фото:<br />
                <input type="text" name="blog_foto" maxlength="255" value="<?=$edit_blog['blog_foto'];?>" style="width:200px;" />
          </label>
          <br />
          <label>Email:<br />
                <input type="text" name="blog_email" maxlength="255" value="<?=$edit_blog['blog_email'];?>" style="width:200px;" />
          </label>
          <br />
          <label>Порядок отображения:<br />
                <input type="text" name="weight" maxlength="255" value="<?=$edit_blog['weight'];?>" style="width:200px;" />
          </label>
          <br />
          <div style="width:678px;">
          <label>Текст:<br />
            <textarea name="blog_text" rows="50" class="moxiecut"><?=$edit_blog['blog_text'];?></textarea>
          </label>
          <br />
         </div>
          
          <div class="clear"></div>
            <input id="admin_login_submit" type="submit" value="Редактировать"/>  
        
    </form>
</div>
                  
                  
                  
                  
                  
                  
                   