<script type="text/javascript">
function change_value(value){
     $.ajax({
      url: '/moderatorcat/change_moder_status',
      type: 'POST',
      data: {id:value},
      error: function(){
        alert('errror');
      },
      success: function(data) {
         alert('Статус изменен!');
         location='/admin/select_cat_moderators';
        // alert(data);
      }  
        });
} 
</script>

<div>
    
     <h4 style="font-size: 25px;">Категорий - <? echo count($moderators_cat);?></h4>
     <p><a href="/admin/add_moderator_cat">Добавить категорю модераторов</a></p>
     <table style="width: 100%;" id="newspaper-c">   
    <thead>
        <tr>
            <th>ID</th>
            <th>Название категории модератора</th>
            <th>Видимость</th>
            <th>Удалить катеорию</th>
        </tr>
    </thead>
    <tbody>
        <?foreach($moderators_cat as $user):?>
        <tr>
            <td><?=$user['moderator_cat_id'];?></td>
            <td><?=$user['moderator_cat_title'];?></td>
            <td><span style="text-decoration: underline; cursor: pointer;" onclick="change_value(<?=$user['moderator_cat_id'];?>)"><? if($user['visible'] == 0) { echo 'НЕ виден';}else { echo 'Виден';};?></span></td>
            <td><a href="<?='/admin/delete_moderator_cat/?mod_cat_id='.$user['moderator_cat_id'];?>">Удалить</a></td>
        </tr>
       <? endforeach; ?>     
       
    </tbody>
</table>
</div>