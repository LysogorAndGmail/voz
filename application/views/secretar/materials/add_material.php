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
     
     <form id="add_material" action="/secretar/add_material" method="post" >
          <label>Название:<br />
                <input name="material_title" type="text" style="width:500px;" />
          </label>
          <br />
          <label>Краткое описание:<br />
                <input type="text" name="material_desc" maxlength="255" style="width:678px; height: 50px;" />
          </label>
          <br />
          <label>Ключевые слова:<br />
                <input name="material_key_words" type="text" style="width:500px;" />
          </label>
          <br />
          <label>Ключевые фразы:<br />
                <input name="material_short" type="text" style="width:500px;" />
          </label>
          <br />
          <div style="width:930px; height: 1000px;">
          <label>Текст:<br />
                <textarea name="material_text" rows="20" class="moxiecut" ></textarea>
          </label>
          </div>
          <input type="hidden" name="material_date" value="<?=Date('Y-m-d');?>"/>
          <br />
          <br />
          <div class="blo">
          Категории:<br />
          
          <div class="all_parent">
          <div class="clear"></div>
          <div class="block_cats">
          <? $cats = DB::select()->from('secretar_cat')->execute()->as_array();
           //print_r($cats);
           //die;
           foreach($cats as $mat){ 
            $cat = DB::select()->from('cats')->where('cat_id','=',$mat['cat_id'])->execute()->current();
            ?>
                
                <p><input type="radio" name="cat_mat" checked="checked" value="<?=$cat['cat_id'];?>"><span><?=$cat['cat_title'];?></span></p>
               
          <? }?>
          </div>
          </div>

          </div>
          <div class="clear"></div>
                <input id="admin_login_submit" type="submit" value="Добавить"/>  
    </form>
</div>
                  