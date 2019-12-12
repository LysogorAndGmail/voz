<div class="add_cat">
     <h4 style="font-size: 25px;">Редактирование события</h4>
     
     <form id="add_metki" method="post" >
            <input type="hidden" name="event_id" value="<?=$event['event_id'];?>" />
          <label>Название события:<br />
            <input name="event_title" type="text" style="width:500px;" value="<?=$event['event_title'];?>" />
          </label>
          <br />
          <label>Дата:<br />
            <input name="event_date" type="text" style="width:500px;" value="<?=$event['event_date'];?>"/>
          </label>
          <br />
          <label>Текст:<br />
          <textarea name="event_text" style="width:500px;" rows="15"><?=$event['event_text'];?></textarea>
          </label>
          <br /><br />
            <input id="admin_login_submit" type="submit" value="редактировать"/>  
    </form>
</div>
                  