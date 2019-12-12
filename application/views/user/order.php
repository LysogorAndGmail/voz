<div class="grid_9">
    <div class="indent-left">
        <h3 style="text-align: center;">Уважаемые пользователи сайта, на этой странице Вы сможете заказать интересующий материал.</h3>
        <?if(!$new_user){?><p style="color: red; text-align: center;">Для добавтения вашего предложения вам надо зарегистрироваться.</p><?}?>  
    </div>
    <div class="order_form">
        <form action="" id="ord_form" method="POST">
            <p style="color: red;">Вы: <?echo $new_user['user_login'];?></p>
            <label>Напишите Ваше предложение:</label><br />
            <input type="hidden" id="order_user" name="order_user" value="<?=$new_user['user_id'];?>"/>
            <input type="hidden"  name="order_date" value="<?=date('Y-m-d');?>"/>
            <textarea name="order_text" rows="15" cols="10" style="width: 690px !important; height: 300px !important;"></textarea><br />
            <input style="margin-left: 320px; margin-top:10px;" type="submit" value="добавить" />
        </form>
    </div>
</div>
                  