<script type="text/javascript">
tinyMCE.init({
        mode : "textareas",
      theme : "advanced",
      plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
      theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
      theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
      theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
      theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
      theme_advanced_toolbar_location : "top",
      theme_advanced_toolbar_align : "left",
      theme_advanced_statusbar_location : "bottom",
      theme_advanced_resizing : false
});
</script>


<div style="margin-left: 20px;">
     <h4 style="font-size: 25px;">Редактирование материалла - <?echo '<span style="color:red;">'.$edit_material['g_m_title'].'</span>';?></h4>
     
     <form id="add_material" action="/gazetaadmin/update_gazeta_material?material_id=<?=$edit_material['g_m_id'];?>" method="post" >
          
          <label>Название:<br />
            <input name="material_title" type="text" style="width:500px;" value="<?=$edit_material['g_m_title'];?>"/>
          </label>
          <br />
          <label>Ключевые слова:<br />
            <input name="material_meta_key" type="text" style="width:500px;" value="<?=$edit_material['g_m_meta_key'];?>" />
          </label>
          <br />
          <label>Ключевые фразы:<br />
            <input name="material_meta_desc" type="text" style="width:500px;" value="<?=$edit_material['g_m_meta_desc'];?>" />
          </label>
          <br />
          <div style="width:930px; height: 1000px;  padding-bottom: 30px;">
          <label>Текст:<br />
            <textarea name="material_text" style="width:930px; height: 1000px;" ><?=$edit_material['g_m_text'];?></textarea>
          </label>
          </div>
          <br />
          <br />
         <div class="blo">
              Категории:<br />
              <div class="block_cats" style="padding: 20px;">
              <? foreach($cats as $cat){ ?>
                 <p><input type="radio" name="material_cat_id" <?if ($cat['g_c_id'] == $edit_material['g_m_cat_id']){ echo 'checked="checked"';}?> value="<?=$cat['g_c_id'];?>" /><?=$cat['g_c_title'];?></p>
              <?}?>
              </div>
          </div>
          
          <div class="clear"></div>
            <input id="admin_login_submit" type="submit" value="Редактировать"/>  
        
    </form>
</div>
                  
                  
                  
                  
                  
                  
                   