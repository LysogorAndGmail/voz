<script type="text/javascript">
function change_value(value){
     $.ajax({
      url: '/admin/change_vote_status',
      type: 'POST',
      data: {id:value},
      error: function(){
        alert('errror');
      },
      success: function(data) {
         alert('Статус изменен!');
         location='/admin/select_votes';
      }  
        });
} 
</script>
<div>
     <h4 style="font-size: 25px;">Опросов всего - <? echo count($all_votes);?></h4>
     <a href="/admin/add_vote">Добавить опрос</a>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>№</th>
            <th>Статус</th>
            <th>Название</th>
            <th>Добавить вопрос</th>
            <th>Количество вопросов</th>
            <th>Удалить опрос</th>
        </tr>
    </thead>
    <tbody>
        <? $i = 1; foreach($all_votes as $vote){?>
        <tr>
            <td><?=$i;?></td>
            <td><span style="text-decoration: underline; cursor: pointer;" onclick="change_value(<?=$vote['vote_id'];?>)"><? if($vote['status'] == 0) { echo 'НЕ активен';}else { echo 'Активен';};?></span></td>
            <td><?=$vote['vote_title'];?></td>
            <td><a href="<?='/admin/add_vote_label?vote_id='.$vote['vote_id'];?>">Добавить вопрос</a></td>
            <td><? $res = DB::select()->from('vote_label')->where('vote_id','=',$vote['vote_id'])->execute()->as_array(); echo count($res);?></td>
            <td><a href="<?='/admin/delete_vote/?vote_id='.$vote['vote_id'];?>">Удалить</a></td>
        </tr>
       <? $i++; } ?>     
       
    </tbody>
</table>
</div>