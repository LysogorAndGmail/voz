<div class="add_cat">
     <h4 style="font-size: 25px;">Добавление события</h4>
     
     <form id="add_metki" action="/admin/add_event_dep?dep_id=<?=$_GET['dep_id'];?>" method="post" >
            
          <label>Название события:<br />
            <input name="event_title" type="text" style="width:500px;" />
          </label>
          <br />
          <label>Дата:<br />
            <input name="event_date" type="text" style="width:500px;" value="<?=Date('Y-m-d');?>"/>
          </label>
          <br />
          <label>Текст:<br />
          <textarea name="event_text" style="width:500px;" rows="15"></textarea>
          </label>
          <br /><br />
            <input id="admin_login_submit" type="submit" value="Добавить событие"/>  
        
    </form>
</div>
                  