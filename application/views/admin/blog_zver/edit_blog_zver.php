<div class="add_cat">
     <h4 style="font-size: 25px;">текст Обращение</h4>
     
     <form id="add_metki" action="/admin/edit_blog_zver?id=<?=$_GET['id'];?>" method="post" >
          <label>Текст:<br />
          <textarea name="text" style="width:500px; height: 500px;"><?=$zver['zver_text'];?></textarea>
          </label>
          <br /><br />
            <input id="admin_login_submit" type="submit" value="Редактировать"/>  
        
    </form>
</div>
                  