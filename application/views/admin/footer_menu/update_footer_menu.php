<div class="add_cat">
     <h4 style="font-size: 25px;">Редактирование ссылки в футер</h4>
     
     <form id="add_metki" method="post" >
            
          <label>Название:<br />
            <input name="menu_title" type="text" style="width:500px;" value="<?=$link['menu_title'];?>" />
          </label>
          <br />
          <label>Сылка:<br />
            <input name="menu_link" type="text" style="width:500px;" value="<?=$link['menu_link'];?>" />
          </label>
          <br />
          <label>Блок:<br />
              <select name="blok_id">
                <option value="1" <? if($link['blok_id'] == 1){ echo 'selected="selected"';}?> >Довідкова інформація</option>
                <option value="2" <? if($link['blok_id'] == 2){ echo 'selected="selected"';}?> >Міста партнери</option>
                <option value="3" <? if($link['blok_id'] == 3){ echo 'selected="selected"';}?> >Центральні органи влади</option>
                <option value="4" <? if($link['blok_id'] == 4){ echo 'selected="selected"';}?> >Регіональні органи влади</option>
                <option value="5" <? if($link['blok_id'] == 5){ echo 'selected="selected"';}?> >Міські органи влади та установи</option>
              </select>
          </label>
          <br /><br />
            <input id="admin_login_submit" type="submit" value="Редактировать"/>  
        
    </form>
</div>
                  