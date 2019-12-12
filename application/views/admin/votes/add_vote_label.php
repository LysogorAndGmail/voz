<div class="add_cat">
     <h4 style="font-size: 25px;">Все вопросы</h4>
     
     <? $res = DB::select()->from('vote_label')->where('vote_id','=',$_GET['vote_id'])->execute()->as_array(); foreach($res as $r) { ?>
        <p style="font-size: 16px;"> <?=$r['text'];?> <a  href="/admin/del_vote_label?id=<?=$r['id'];?>&vote_id=<?=$_GET['vote_id'];?>">Удалить</a></p>
     <? }?>
     
     <form id="add_metki" action="" method="post" >
        
          <label>Название вопроса:<br />
            <input name="text" type="text" style="width:500px;" />
          </label>
            <input type="hidden" name="vote_id" value="<?=$_GET['vote_id'];?>" />
          <br />
          <br />
            <input id="admin_login_submit" type="submit" value="Добавить вопрос"/>  
        
    </form>
</div>
                  