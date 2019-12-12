<div class="add_cat">
     <h4 style="font-size: 25px;">Редактирование папки</h4>
     
     <? foreach($all as $a){?>
        <p><?=$a['galery_name'];?> <a href="/admin/del_gal_img?folder_id=<?=$folder['id'];?>&img_id=<?=$a['galery_id'];?>"> Удалить</a></p>
     <?}?>
     <form id="add_metki" method="post" >
          <label>Название папки:<br />
            <input name="name" type="text" style="width:500px;" value="<?=$folder['name'];?>" />
          </label>
          <br />
          <br />
            <input id="admin_login_submit" type="submit" value="Редактировать папку"/>
    </form>
</div>
                  