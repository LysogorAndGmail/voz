<script type="text/javascript">
$(document).ready(function(){
    $('.dep_button').click(function(){
        $.ajax({
            type:'POST',
            url: "/deputat/send_dep_email",
            data: {dep_id: $('.dep_id').val(),dep_user_name:$('.dep_user_name').val(),dep_user_email:$('.dep_user_email').val(),dep_user_text:$('.dep_user_text').val()},
            success: function(data) {
                if(data == 'ok') {
                    alert('Ваше сообщение успешно отправлено!');
                    $('input,textarea').val('');
                    $('.send_dep').hide();
                }else {
                    alert('Не верно заполнена форма');
                }
            },
            error: function(){
                alert('ошибка работы ajax');
            }
        });
    })
})
</script>
<div class="main">
    <div class="container_24">
        <div class="show_deputat">
            <!-- -->           
            <?foreach($search_dep as $dep) {?>
                <div class="show_one_dep">
                    <div class="dep_foto">
                        <?if(!empty($dep['dep_foto'])) {?>
                            <img src="<?echo Kohana::$base_url."material_images/".$dep['dep_foto'];?>" width="280" height="333"/>
                        <?}else {?>
                            <img src="<?echo Kohana::$base_url;?>material_images/no-foto.jpg" width="280" height="333"/> 
                        <?}?>
                        
                    </div>
                    <div class="dep_top_text">
                        <h2 style="font-size: 20px; color:black; text-align: center;"><?=$dep['dep_name'];?></h2>
                        <div class="dep_text"><?php echo $dep['dep_text'];?></div>
                        <div style="text-align: center; padding: 20px 0; position:relative;">
                            <button style="padding: 10px; border-radius: 10px; margin-right: 25px;" onclick="$(this).next('div').show();">Події депутата</button>
                            <div class="event_dep" style="position: absolute; width: 300px; height: 200px; background-color: #dee2e0; border-radius: 10px; overflow: auto;">
                                <span style="font-weight: bold; cursor: pointer; float: right; color: black; margin-right: 10px; margin-top: 10px;">закрыть</span>
                                <p>&nbsp;</p>
                                <ol>
                                <? $res = DB::select()->from('deputats_events')->where('dep_id','=',$dep['dep_id'])->execute()->as_array();
                                
                                    if(count($res)>0) {
                                        foreach($res as $event) { ?>
                                        
                                       <li title="<?=$event['event_text'];?>" style="color: darkblue;"><?=date('d-m-Y',strtotime($event['event_date']))." - ".$event['event_title'];?></li> 
                                         
                                     <?   }
                                    }else {
                                        echo 'Событий нет!';
                                    }
                                ?>
                                </ol>   
                            </div>
                            <button style="padding: 10px; border-radius: 10px;" onclick="$(this).next('div').show();">Написати депутату</button>
                            <div class="send_dep" style="position: absolute; width: 300px; height: 200px; background-color: #dee2e0; left: 334px; border-radius: 10px; overflow: auto;">
                                <input type="hidden" class="dep_id" value="<?=$dep['dep_id']?>" />
                                <span style="font-weight: bold; cursor: pointer; float: right; color: black; margin-right: 10px;top: 2px; left: 224px; position: absolute;">закрыть</span><br />
                                <label>Ваше имя:</label><br />
                                <input type="text" name="user_name" class="dep_user_name" /><br />
                                <label>Ваш email:</label><br />
                                <input type="text" name="user_email" class="dep_user_email" /><br />
                                <label>Текст:</label><br />
                                <textarea name="user_text" class="dep_user_text"></textarea><br />
                                <button class="dep_button">Отправить</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="clear"></div>
                    <hr />
                    
                </div>
            <?}?>
            <!-- -->
        </div>
        <div class="clear"></div>
    </div>
    
               
</div>