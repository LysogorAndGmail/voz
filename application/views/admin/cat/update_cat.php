<div class="update_cat">
     <h4 style="font-size: 25px;">Редактирование категории</h4>
     
     <form id="add_metki" action="/admin/update_cat<?='?cat_id='.$cat_id;?>" method="post" >
            <span style="color: red;">Видимость в меню: 
        <select name="visible" size="1">
            <option value="0">Не видима</option>
            <option value="1" <? if($edit_cat['visible'] == 1){ echo 'selected="selected"';}?> >Видима</option>
        </select>
        </span>
        <br />
          <label>Название категории:<br />
            <input name="cat_title" type="text" style="width:500px;" value="<?=$edit_cat['cat_title'];?>" />
          </label>
          <br />
          <input type="hidden" name="insert" value="<?=$edit_cat['insert'];?>" />
          <label>Родительская категория:<br />
          <select name="parent_id" size="1" style="width:500px;">
          <option <? if($edit_cat['parent_id'] == 0){ echo 'selected="selected"';}?>value="0">-Без родителя-</option>
              <? foreach($mostcats as $most):?>
          <option <? 
            if($edit_cat['parent_id'] == $most['cat_id']){ echo 'selected="selected"';}
            if($cat_id == $most['cat_id']){ echo 'style="display:none"';}
             ?>value="<?=$most['cat_id'];?>"><?=$most['cat_title'];?></option>
          <? endforeach;?>
          </select>
          </label>
          <br /><br />
            <input id="admin_login_submit" type="submit" value="Редактировать категорию"/>  
        
    </form>
</div>
                  