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

<div class="add_cat">
     <h4 style="font-size: 25px;">Добавление решения</h4>
     
     <form id="add_metki" action="/admin/update_doc?doc_id=<?=$edit_doc['doc_id'];?>" method="post" >
            Тип:<br /><hr />
            Рішення МР<input name="doc_type" type="radio" value="1" <? if($edit_doc['doc_type'] == 1) { echo 'checked="checked"';}?> /><br />
            Рішення ВК<input name="doc_type" type="radio" value="2" <? if($edit_doc['doc_type'] == 2) { echo 'checked="checked"';}?> /><br /> 
            Розпорядження МГ<input name="doc_type" type="radio" value="3" <? if($edit_doc['doc_type'] == 3) { echo 'checked="checked"';}?> /><br />
            Проекти  рішень<input name="doc_type" type="radio" value="4" <? if($edit_doc['doc_type'] == 4) { echo 'checked="checked"';}?> />  
            <hr />
          <br />
          <label>Номер решения:<br />
            <input name="doc_n" type="text" style="width:500px;" value="<?=$edit_doc['doc_n'];?>" />
          </label>
          <br />
          <label>Название решения:<br />
            <input name="doc_name" type="text" style="width:500px;" value="<?=$edit_doc['doc_name'];?>" />
          </label>
          <br />
          <label>Дата:<br />
            <input name="doc_date" type="text" style="width:500px;" value="<?=$edit_doc['doc_date'];?>"/>
          </label>
          <br />
          <div style="width:930px; height: 1000px;">
          <label>Текст:<br />
          <textarea name="doc_text" rows="50"  class="moxiecut">
          <?=$edit_doc['doc_text'];?>
          </textarea>
          </div>
          </label>
          <br /><br />
            <input id="admin_login_submit" type="submit" value="Редактировать"/>  
        
    </form>
</div>
                  