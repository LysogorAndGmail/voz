<div class="add_cat">
     <h4 style="font-size: 25px;">Редактирование категории</h4>
     
     <form id="add_metki" action="/moderator/update_cat?cat_id=<?php echo $edit_cat['moderator_cat_id'];?>" method="post" >
        
          <label>Название категории:<br />
            <input name="cat_title" type="text" style="width:500px;" value="<?=$edit_cat['moderator_cat_title'];?>" />
          </label>
          <br />
          <label>Описание категории:<br />
            <textarea name="cat_desc" rows="10" cols="100"><?=$edit_cat['moderator_cat_desc'];?></textarea>
          </label>
          <input type="hidden" name="parent_cat" value="<?php echo $edit_cat['moderator_cat_id'];?>"/>          
          <br /><br />
            <input id="admin_login_submit" type="submit" value="Редактировать"/>  
        
    </form>
</div>
                  