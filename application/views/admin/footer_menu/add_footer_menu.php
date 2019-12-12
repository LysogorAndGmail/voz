<div class="add_cat">
     <h4 style="font-size: 25px;">Добавление ссылки в футер</h4>
     
     <form id="add_metki" action="/admin/add_footer_menu" method="post" >
            
          <label>Название:<br />
            <input name="menu_title" type="text" style="width:500px;" />
          </label>
          <br />
          <label>Сылка:<br />
            <input name="menu_link" type="text" style="width:500px;" />
          </label>
          <br />
          <label>Блок:<br />
              <select name="blok_id">
                <option value="1">Довідкова інформація</option>
                <option value="2">Міста партнери</option>
                <option value="3">Центральні органи влади</option>
                <option value="4">Регіональні органи влади</option>
                <option value="5">Міські органи влади та установи</option>
              </select>
          </label>
          <br /><br />
            <input id="admin_login_submit" type="submit" value="Добавить"/>  
        
    </form>
</div>
                  