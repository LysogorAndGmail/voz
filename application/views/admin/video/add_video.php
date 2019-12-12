<div class="add_cat">
     <h4 style="font-size: 25px;">Добавление Видео</h4>
     
     <form id="add_metki" action="/admin/add_video" method="post" >
        
          <label>Название видео:<br />
            <input name="video_title" type="text" style="width:500px;" />
          </label>
          <br />
          <label>Название картинки:<br />
            <input name="video_icon" type="text" style="width:500px;" />
          </label>
          <br />
          <label>Сылка:<br />
            <input name="video_href" type="text" style="width:500px;" />
          </label>
          <br />
          <br />
            <input id="admin_login_submit" type="submit" value="Добавить видео"/>  
        
    </form>
</div>
                  