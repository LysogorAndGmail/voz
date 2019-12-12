<div class="add_cat">
     <h4 style="font-size: 25px;">Добавление категории</h4>
     
     <form id="add_metki" action="/moderator/add_cat" method="post" >
        
          <label>Название категории:<br />
            <input name="cat_title" type="text" style="width:500px;" />
          </label>
          <br />
          <label>Описание категории:<br />
            <textarea name="cat_desc" rows="10" cols="100"></textarea>
          </label>
          <br />
          <br />
          <? $cat_id = DB::select()->from('moderator_cats')->where('moderator_cat_title','=',$moderator['moderator_category'])->execute()->current();?>
          <input type="hidden" name="parent_cat" value="<?php echo $cat_id['moderator_cat_id'];?>"/>          
          <br /><br />
            <input id="admin_login_submit" type="submit" value="Добавить"/>  
        
    </form>
</div>
                  