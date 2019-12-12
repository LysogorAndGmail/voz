<div class="add_cat">
     <h4 style="font-size: 25px;">Добавление новости блога</h4>
     
     <form id="add_metki" action="/admin/add_blog_news?blog_id=<?=$_GET['blog_id'];?>" method="post" >
            
          <label>Название новости:<br />
            <input name="blog_title" type="text" style="width:500px;" />
          </label>
          <br />
          <label>Дата:<br />
            <input name="blog_date" type="text" style="width:500px;" value="<?=Date('Y-m-d');?>"/>
          </label>
          <br />
          <label>Текст:<br />
          <textarea name="blog_text"></textarea>
          </label>
          <br /><br />
            <input id="admin_login_submit" type="submit" value="Добавить новость"/>  
        
    </form>
</div>
                  