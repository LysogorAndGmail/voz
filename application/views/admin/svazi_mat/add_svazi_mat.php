<div style="margin-left: 20px;">
     <h4 style="font-size: 25px;">Добавление связи</h4>
     
     <form id="add_material" action="/admin/add_svaz_mat" method="post" >
          <div style="width: 30%; float: left;">
              <label>Название страницы:<br />
                    <select name="page_id">
                    <? foreach($pages as $page){?>
                        <option value="<?=$page['page_id'];?>"><?=$page['page_title'];?></option>
                        <?}?>
                    </select>
              </label>
              <br />
          </div>
          <div style="width: 50%; float:left; overflow: auto; height: 700px;">
                <? foreach($mats as $mat){?>
                        <input type="checkbox" name="mat_id[]" value="<?=$mat['material_id'];?>"/><?=$mat['material_title'];?><br />
                <?}?>
          </div>
          <div class="clear"></div>
          <hr />
          <p style="text-align: center;"><input id="admin_login_submit" type="submit" value="Добавить связь"/> </p> 
    </form>
</div>
                  