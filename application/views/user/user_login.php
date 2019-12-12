<div class="main">
    <div class="container_24">
        <div id="show_page">
            <div class="show_page_text">
                <h4 style="font-size: 25px;">Войти на сайт</h4>
                <span style="color: red;"><?=$error;?></span>
                <form id="admin_login_form" action="" method="post" >
                    <label>Логин:<br />
                        <input name="user_login" type="text" size="30" maxlength="30"/>
                    </label>
                    <br />
                    <label>Пароль:<br />
                        <input name="user_pass" type="password" size="30" maxlength="30"/>
                    </label>
                    <br />
                    <input id="user_login_submit" type="submit" value="Войти"/>  
                </form>
            </div>
        <div class="clear"></div>
    </div>
</div>
                  