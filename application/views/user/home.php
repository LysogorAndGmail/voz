<style>
.add_bord_block {
    background-color: #d5f4fb;
    border-radius: 5px;
    padding: 10px;
    margin:10px;
}

.add_bord_block textarea {
    width: 858px;
    height: 120px;
    border-radius: 5px;
    padding: 10px;
}

.add_bord_block button {
    background: url(../images/top-buttons-2.gif) repeat-x;
    text-shadow: 1px 1px #bd5a02;
    width: 150px;
    font-family: 'Oswald', sans-serif;
    font-size: 11px;
    line-height: 19px;
    color: #fff;
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    text-transform: uppercase;
    margin: 0 2px 0 0;
    padding: 9px 0;
    text-align: center;
    cursor: pointer;
}
#show_page {
    margin-top:-58px;
} 
.one_bord_mess {
    background-color: #e5e5e5;
    border-radius: 5px;
    padding: 10px;
    padding-top: 0;
    width: 400px;
    margin:10px;
}
.one_bord_mess p{
    padding: 0 !important;
    margin-bottom: 10px;
    font-size: 14px !important;
}
.one_bord_mess .date {
    float: left;
    font-style: italic;
    font-weight: bold;
}
.one_bord_mess .price {
    float: right;
    font-style: italic;
    font-weight: bold;
}
.error_input {
    border: 1px solid red !important;
}
.error_input_chek {
    color: red;
}
.valid {
    outline: none;
    border: 1px solid green;
}
</style>

<div class="main">
    <div class="container_24">
        <div id="show_page">
            <div class="show_page_text">
                <h4 style="font-size: 25px;">Ви - <? $user = Session::instance()->get('new_user'); echo $user['user_login'];?></h4>
                <? $all = DB::select()->from('bord')->where('user','=',$user['user_id'])->order_by('date','DESC')->execute()->as_array(); ?>
                <p>Всього оголошень: <?=count($all);?></p>
                <div>
                    <p style="font-style: italic; text-align: center; color:red;">Оголошення активується пiсля перевірки адмінстратором сайту!</p>
                    <div class="add_bord_block">
                        <form action="/user/add_new_bord" class="zver_for" method="POST">
                            <label>
                                Категорія: <br />
                                <select name="cat">
                                    <option value="nedvig">Нерухомість</option>
                                    <option value="trans">Транспорт</option>
                                    <option value="rabota">Робота</option>
                                    <option value="elek">Електроніка</option>
                                    <option value="biznes">Бізнес та послуги</option>
                                    <option value="mir">Дитячий світ</option>
                                    <option value="sad">Дім і сад</option>
                                    <option value="giv">Тварини</option>
                                    <option value="moda">Мода і стиль</option>
                                    <option value="sport">Хобі, відпочинок і спорт</option>
                                    <option value="obmin">Обмін</option>
                                    <option value="viddam">Віддам безкоштовно</option>
                                </select>
                            </label>
                            <br />
                            <br />
                            <label>
                                Текст: <span style="font-style:italic; font-weight: bold;">(максимально 250 символів)</span>
                                <textarea name="text" maxlength="255" class="valid"></textarea>
                            </label>
                            <br />
                            
                            <label>
                                Ціна:<br />
                                <input type="text" name="price" maxlength="10" class="valid" /> <span style="font-weight: bold;">грн.</span>
                            </label>
                            <br />
                            <label>
                                Тел:
                                <br />
                                <input type="text" name="tel" maxlength="10" class="valid" />
                            </label>
                            <br />
                            <br />
                            <label>
                                <button class="top-button-2">Додати оголошення</button>
                            </label>
                        </form>
                        <div class="all_user_bord">
                            <br />
                            <? foreach($all as $a){
                                $activ = 'активно!';
                                if($a['activ'] == 0){
                                    $activ = 'не активно!';
                                }
                                
                                ?>
                                <div class="one_bord_mess">
                                    <? if($a['activ'] == 1){?>
                                        <p style="text-align: center; color: blue;"><?=$activ;?></p>
                                    <?}else{?>
                                        <p style="text-align: center; color: red;"><?=$activ;?></p>
                                    <?}?>
                                    <span class="price" style="margin-top: 10px;"><?=date('d.m.Y',strtotime($a['date']));?></span>
                                    <span style="clear: both;">&nbsp;</span>                         
                                    <p><?=$a['text'];?></p>
                                    <span class="date">тел. <?=$a['tel'];?></span>
                                    <span class="price"><?=$a['price'];?> грн.</span>
                                    <span style="clear: both;">&nbsp;</span>
                                    <br />
                                    <a style="float: right; position: relative; left: 9px; top:10px;" href="/user/del_bord?id=<?=$a['id'];?>">Удалить</a>
                                </div>
                                <span style="clear: both;">&nbsp;</span>  
                            <?}?>
                            <span style="clear: both;">&nbsp;</span>  
                        </div>
                        <span style="clear: both;">&nbsp;</span>  
                    </div>
                </div>
            </div>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
setInterval(Validation, 1000);

$('.zver_for').submit(function(){
    
    var Puhh = [];
    $('.error_input').each(function(){
        Puhh.push(1);
    })
    if(Puhh.length > 0){
        return false;
    }
    
})
function Validation(){
    $('.valid').each(function(){
        $(this).removeClass('error_input');
        if($(this).val().length < 1){
            $(this).addClass('error_input');
        }
    })
    //alert($('.check:checked').val());
    var Ch = $('.check_input:checked').val();
    var Ch_par = $('.check');
    if(Ch === undefined){
        //$(this).
        Ch_par.addClass('error_input_chek');
    }else{
        Ch_par.removeClass('error_input_chek');
        //.addClass('error_input');
    }
}
</script>                  