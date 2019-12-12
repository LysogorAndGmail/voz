<div class="add_cat">
     <h4 style="font-size: 25px;">Добавление картинки</h4>
     
     <form id="add_metki" action="/admin/add_galery" method="post" >

          <label>Папка:<br />
            <select name="folder">
                <?foreach($folders as $folder){?>
                    <option value="<?=$folder['id'];?>"><?=$folder['name'];?></option>
                <?}?>   
            </select>
            <br />
          </label>
          <label>Название картинки:<br />
            <input name="galery_name" type="text" style="width:500px;" />
          </label>
          <br />
          <label>Описание картинки:<br />
            <input name="galery_desc" type="text" style="width:500px;" />
          </label>
          <br />
          <label>Тип анимации:<br />
            <select name="galery_type">
                <option value="rotateInDownLeft, rotateOutDownRight">1</option>
                <option value="rotateIn, rotateOut">2</option>
                <option value="flipInX, flipOutX">3</option>
                <option value="rotateInUpLeft, rotateOutUpRight">4</option>
            </select>
          </label>
          <br />
          <br />
            <input id="admin_login_submit" type="submit" value="Добавить картинку"/>  
        
    </form>
</div>
                  