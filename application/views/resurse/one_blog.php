<style>
.ansfer {
    margin-left: 40px;
    padding: 15px;
    background-color: #e5e5e5;
    border-radius: 10px;
    padding-top: 5px;
    font-style: italic;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
    $('.blog_button').click(function(){
        $.ajax({
            type:'POST',
            url: "/resurse/send_blog_zver",
            data: {blog_id: $('.blog_id').val(),zver_date:$('.zver_date').val(),user_name:$('.blog_user_name').val(),zver_text:$('.blog_user_text').val()},
            success: function(data) {
                if(data == 'ok') {
                    alert('Ваше сообщение успешно принето в обработку!');
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
    <div class="show_page_text">
        <h3 style="text-align: center;"><? echo $blog['blog_name'];?></h3>
        <div class="left_side_blog">
            <img src="<?=Kohana::$base_url?>material_images/<? echo $blog['blog_foto'];?>" width="200" height="200" />
            <button id="write_mess">Написати звернення</button>
            <div class="send_dep" style="position: absolute; width: 300px; height: 200px; background-color: #dee2e0; left: 473px; border-radius: 10px; overflow: auto;">
                <input type="hidden" class="blog_id" value="<?=$blog['blog_id'];?>" />
                <input type="hidden" class="zver_date" value="<?=Date('Y-m-d');?>" />
                <span style="font-weight: bold; cursor: pointer; float: right; color: black; margin-right: 10px;top: 2px; left: 224px; position: absolute;">Закрити</span><br />
                <label>Ваше ім’я:</label><br />
                <input type="text" name="user_name" class="blog_user_name" /><br />
                <label>Текст:</label><br />
                <textarea name="user_text" class="blog_user_text"></textarea><br />
                <button class="blog_button">Відправити</button>
            </div>
            <p><i>Шановні відвідувачі сайту! 
Звертаємо Вашу увагу, що спілкування в блогах міського голови та його заступників передбачає відповіді лише на запитання оперативного характеру. Відповіді в блогах не мають статусу офіційних документів, а є консультативними.
Нагадуємо, що запитання і коментарі, які містять некоректні або образливі вислови, не публікуються і не підлягають розгляду.
Якщо Ваш запит вимагає надання великого обсягу інформації або додаткового вивчення проблеми, рекомендуємо оформити його у вигляді електронного звернення на відповідній сторінці сайту: http://voznesensk.org/page/zvernennya
</i></p>
        </div>
        <div class="right_side_blog">
            <div class="right_smole">
                <div><? echo $blog['blog_text'];?></div>
                <p style="width: 80%; border-bottom: 1px dashed red; margin: auto;  margin-bottom: 25px;">&nbsp;</p>
            </div>
            <div class="right_smole">
                <h3 style="padding: 0 0 12px 0;">Останні новини:</h3>
                <? foreach($blog_news as $news){?>
                <div>
                    <h4 style="color: grey; padding-top: 20px;"><?=$news['b_n_title']?></h4>
                    <div><?=$news['b_n_text']?></div>
                    <p style="color: gray; text-align: right; margin-bottom: -10px; padding: 0;"><?=$news['b_n_date']?></p>
                </div>
                <?}?>
                <p style="width: 80%; border-bottom: 1px dashed red; margin: auto; margin-bottom: 25px;">&nbsp;</p>
               
            </div>
            <div class="right_smole" style="overflow: auto; max-height: 2000px;">
                <h3 style="padding: 0 0 12px 0;">Переглянути звернення:</h3>
                <? $all_zver = DB::select()->from('blog_zver')->where('blog_id','=',$blog['blog_id'])->and_where('zver_status','=',1)->order_by('blog_z_id','DESC')->execute()->as_array();
                    foreach($all_zver as $z){
                ?>
                <div>
                    <h4 style="color: grey; margin: 5px;"><?=$z['user_name'];?></h4>
                    <div><?=$z['zver_text'];?></div>
                    <p style="color: gray; text-align: right; padding-bottom: 0;"><?=date('d.m.Y',strtotime($z['zver_date']));?></p>
                </div>
                <? $an = DB::select()->from('ansfer_blog_zver')->where('blog_zver_id','=',$z['blog_z_id'])->execute()->current(); if(!empty($an)){?>
                    <div class="ansfer">
                        <h4 style="color: grey; margin: 5px;"><?=$an['name'];?></h4>
                        <div><?=$an['text'];?></div>
                        <p style="color: gray; text-align: right; padding-bottom: 0;"><?= date('d.m.Y',strtotime($an['date']));?></p>
                        <hr />
                    </div>
                <?}?>
                <?}?>
            </div>
        </div>
        
           
        
        <div class="clear"></div>
    </div>      
</div>