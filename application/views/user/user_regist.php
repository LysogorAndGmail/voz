<script type="text/javascript">
$(document).ready(function(){
    $("#draggable").draggable({
        helper: "clone"
    });
    var URL = $('#user_login_regist');
    var URP = $('#user_pass_regist');
    var URE = $('#user_email_regist');
    $("#droppable").droppable({
        drop: function( event, ui ) {
            $('.error_info').text('');
            $.ajax({
                url: '/user/user_regist_function',
                type: 'POST',
                data: {user_login: URL.val(),user_pass: URP.val(),user_email: URE.val()},
                error: function() {
                    //alert('her');
                },
                success: function(data) {
                    //alert(data);
                    if(data == 'ok'){
                        location='/regist_info';
                    }else{
                        $('.error_info').text(data);
                    }
                   
                   
                } 
            }); //end ajax         
        }
    });
})
 
</script>
<div class="main">
    <div class="container_24">
        <div id="show_page">
            <div class="show_page_text">
                
                <div class="user_regist_form" style="width: 36%; float:left;">
                    <h4 style="font-size: 25px; width: 100px;">Реєстрація користувача</h4>
                    
                    <p style="padding: 0;"><span class="error_info" style="color: red;"></span></p>
                    <div id="admin_login_form" >
                        <label>Логін:<br />
                            <input name="user_login" id="user_login_regist" type="text" size="30" maxlength="20" value=""/>
                            <div class="div_login"></div><div id="span_login"></div>
                            <input type="hidden" id="log_val" value=""/>
                        </label>
                        <label>Пароль:<br />
                            <input name="user_pass" type="password" id="user_pass_regist" size="30" maxlength="20" value=""/>
                            <div class="div_pass"></div><div id="span_pass"></div>
                            <input type="hidden" id="pass_val" value=""/>
                        </label>
                        <label>email:<br />
                            <input name="user_email" type="text" id="user_email_regist" size="30" maxlength="30" value=""/>
                            <div class="div_email"></div><div id="span_email"></div>
                            <input type="hidden" id="email_val" value=""/>
                        </label>
             
                    </div>
                </div> 
                <div class="rabbit" style="width: 60%; float:left;">
                    <span>
                    * Для того, щоб зареєструватися необхідно перемістити зображення герба міста Вознесенська на  зображення  прапору міста. Ви отримаєте повідомлення на електрону пошту, в якому будуть вказані ваші подальші дії.
                    </span>
                    <img src="/images/flag_voz_big_empty.jpg" width="278" height="190" style="position: relative; top:30px; left:50px;" id="droppable"/>
                    <img src="/images/gerb_flag.png" width="75" height="91" style="position: relative; top:-20px; left:140px; cursor: pointer;" id="draggable"/>
                    <!--<img src="/images/flagg.jpg"  width="281" height="188" />
                    <img src="/images/gerb.png"   width="94" height="127" />-->
                </div>
                <div class="clear"></div>   
            </div>
        <div class="clear"></div>
    </div>
</div>                 