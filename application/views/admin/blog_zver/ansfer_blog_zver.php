<div class="add_cat">
     <h4 style="font-size: 25px;">Ответ на Обращение</h4>
     
     <form id="add_metki" action="/admin/ansfer_blog_zver?id=<?=$_GET['id'];?>" method="post" >
            
          <label>Ф.И.О:<br />
            <input name="name" type="text" style="width:500px;" />
          </label>
          <br />
          <label>Дата:<br />
            <input name="date" type="text" style="width:500px;" value="<?=Date('Y-m-d');?>"/>
          </label>
          <br />
          <label>Текст:<br />
          <textarea name="text" style="width:500px; height: 500px;"></textarea>
          </label>
          <br /><br />
            <input id="admin_login_submit" type="submit" value="Ответить"/>  
        
    </form>
</div>
                  