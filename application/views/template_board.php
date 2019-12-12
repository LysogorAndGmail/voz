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