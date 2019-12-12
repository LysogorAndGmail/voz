<div class="add_cat">
     <h4 style="font-size: 25px;">Добавление модератора</h4>
     
     <form id="add_metki" action="/admin/add_moderator" method="post" >
        
          <label>Login модератора:<br />
            <input name="moderator_login" type="text" style="width:500px;" />
          </label>
          <br />
          <label>Пароль модератора:<br />
            <input name="moderator_pass" type="password" style="width:500px;" />
          </label>
          <br />
          <label>Категория модератора:<br />
          <select name="moderator_category" size="1" style="width:500px;">
          
          <? $moderator_cats = DB::select()->from('moderator_cats')->execute()->as_array(); foreach($moderator_cats as $cat):?>
          <option value="<?=$cat['moderator_cat_title'];?>"><?=$cat['moderator_cat_title'];?></option>
          <? endforeach;?>
          </select>
          </label>
          <br />
          <br /><br />
            <input id="admin_login_submit" type="submit" value="Добавить"/>  
        
    </form>
</div>
                  