<? $new_user = Session::instance()->get('new_user');
if($new_user) {?>
    <div class="user_cab" onclick="location='/user/home';" >
        <div class="user_cab_top">
            <p><?=$new_user['user_login'];?></p>
        </div>
    </div>
<? } ?>
<script type="text/javascript" src="/js/jscroller2.js"></script>
<style>
/* Scroller Box */
#scroller_container {
 width: 100%;
 height: 24px;
 overflow: hidden;
}

#scroller_container a{
    color: black;
    margin-left:30px;
    font-size: 14px;
}
/* Scoller Box */

/* CSS Hack Safari */
#dummy {;# }

#scroller_container {
 overflow: auto;
}
   
</style>
<div id="scroller_container">
    <div class="jscroller2_left jscroller2_speed-40 jscroller2_mousemove" style="font-size:14px; line-height:24px; white-space:nowrap; margin: 0; overflow: hidden;">
    <? $all = DB::select()->from('stroka')->execute()->as_array(); foreach($all as $a){?>
        <a style="font-size: 19px !important;" href="/"><?=$a['title'];?></a>
        <?}?>
    </div>
</div>
<div class="main">
                    <div class="inner">
                    	<!--<h1>
                            <a href="#">
                           LOGO
                            </a>
                            <strong>Internet Technology Consultants</strong>
                        </h1>-->
                        
                        <span style="position: relative;"><a href="/"><img src="/images/gerb_voznesensk_130.png" width="130" height="166" style="position: absolute; left: -62px; top:67px;" /></a></span>
                        <div class="wrapper">
                            <div class="top-service-buttons">
                                <? if($new_user) {?>
                                    <a href="/user/user_logout" class="top-button-1">Вихід</a>
                                <?}else{ ?>
                                    <a href="/user/user_regist" class="top-button-1">Реєстрація</a>
                                    <a href="/user/user_login" class="top-button-2">Вхід</a>
                                <?}?>
                                <a href="/page/portal" class="top-button-3">Наш портал</a>
                                <a href="http://77.88.251.191:10090/" class="top-button-3" style="background: black !important; margin-left: 95px;">Web-камери міста</a>
                                <a href="https://igov.org.ua/" class="top-button-3" style="background: black !important; margin-left: 10px;">Електронні послуги</a>
                                <a href="https://www.youtube.com/channel/UCcWXWHeggebcgizCK9vkCkw/live" class="top-button-3" style="background: black !important; margin-left: 10px; padding: 18px 0;">ON-LINE</a>
                                
                            </div>
                            <form id="search-form">
                                <input type="text" name="search" id="main_search_input"/>
                                <a onclick="loc()" class="search-submit"></a>
                            </form>
                        </div>
                        <div class="wrapper">
                            <div class="" style="width: 50px !important; float: right; margin-right: 100px;">
                                <div id="google_translate_element">&nbsp;</div>
        
                            </div>
                        </div>
                        <nav>
                            <ul class="sf-menu sf-js-enabled sf-shadow">
                                <li>
                                    <a href="/" class="active">Головна</a>
                                </li>
                                <li>
                                    <a href="/page/pro_misto">Про місто</a>
                                </li>
                                <li class="">
                                    <a href="/page/zvernennya" class="sf-with-ul">Звернення громадян<span class="sf-sub-indicator"> »</span></a>
                                    <!--<ul style="display: none; visibility: hidden;">
                                        <li><a href="#">Services List</a></li>
                                        <li class="">
                                            <a href="#" class="sf-with-ul">Special Services<span class="sf-sub-indicator"> »</span>
                                            </a>
                                            <ul style="display: none; visibility: hidden;">
                                                <li><a href="#">Networking</a></li>
                                                <li><a href="#">Technical Support</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">New Services</a></li>
                                        <li><a href="#">Integration</a></li>
                                    </ul>-->
                                </li>
                                <li>
                                    <a href="/page/pyblichna_inform">Доступ до публічної інформації</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="clear"></div>
                    </div>
                </div>