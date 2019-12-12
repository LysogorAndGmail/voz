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
     <h4 style="font-size: 25px;">Добавление афиша</h4>
     
     <form id="add_material" action="/admin/add_afisha" method="post" >
          
          
          <label>Название:<br />
                <input type="text" name="title" maxlength="255" value="" style="width:200px;" />
          </label>
          <br />
          <label>Текст:<br />
            <textarea name="text" rows="50" style="width:678px; height: 600px;"></textarea>
          </label>
          <br />
         
          
          <div class="clear"></div>
            <input id="admin_login_submit" type="submit" value="Добавить"/>  
        
    </form>
</div>
                  
                  
                  
                  
                  
                  
                   