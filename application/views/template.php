<?php //define('ST_T', microtime());?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<?=$top_head;?>
<style>
.grgr {
    background: none !important;
    background-color: #a1a1a1 !important;
}
.grgr li a {
    color:black;
}
.new_bord {
    width: 50px;
    height: 200px;
    position: fixed;
    top:400px;
    background-color: red;
    border-radius:0 50px 50px 0;
    z-index:9999999999;
    cursor: pointer;
    left: -10px;
}
.new_bord:hover {
    left: 0 !important;
}
.new_soc {
    width: 60px;
    height: 50px;
    position: fixed;
    z-index:9999999999;
    cursor: pointer;
    right: -10px;
}
.new_soc2 {
    width: 60px;
    height: 50px;
    position: fixed;
    z-index:9999999999;
    cursor: pointer;
    right: -10px;
    top: 50px;
}

#verticalText {
    -moz-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    
    height: 20px;
    font-size: 24px;
    position: relative;
    left:-10px;
    top:12px;
    color:#fff;
}

</style>
<?/*
readfile(jquery.js');
readfile(general.js');
readfile(jquery-ui.js');
readfile(page.js');

header('Content-type: text/javascript');
*/?>
</head>
<body>
    <a href="/board" style="text-decoration: none;">
        <div class="new_bord">
            <p id="verticalText">Оголошення</p>
        </div>
    </a>
    <a href="https://vk.com/public91472535" style="text-decoration: none;">
        <div class="new_soc">
            <img src="<?=Kohana::$base_url;?>images/vk.png" width="50" height="50" />
        </div>
    </a>
    <a href="https://www.facebook.com/pages/%D0%9C%D1%96%D1%81%D1%8C%D0%BA%D0%B0-%D0%B2%D0%BB%D0%B0%D0%B4%D0%B0-%D0%92%D0%BE%D0%B7%D0%BD%D0%B5%D1%81%D0%B5%D0%BD%D1%81%D1%8C%D0%BA%D0%B0/467692026740159" style="text-decoration: none;">
        <div class="new_soc2">
            <img src="<?=Kohana::$base_url;?>images/f.png" width="50" height="50" />
        </div>
    </a>
    
    
    
	<div class="top-bg">
    	<div class="main-bg">
   		<!--=====HEADER=====-->
            <header>    	
              <?=$header;?>  
            </header>
            <!--=====SLIDER=====-->
            <?=$container_top;?>
            <!--=====TOP CONTENT=====-->
            
    <!--=====CONTENT=====-->
    <section id="content">
    	<?=$content;?>
    </section>
    <!--=====ASIDE=====-->
    <aside class="grayy">
    <?=$container_right;?>
    </aside>
    <!--=====FOOTER=====-->
    <?=$footer;?>
</body>
</html>
<?//printf('%.5f сек.', microtime()-ST_T);//конец?>