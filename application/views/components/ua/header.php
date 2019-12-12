<header id="header">
    
        <div id="flags">
            <img src="/images/eng.png" width="" height="" id="eng_flag" alt="english" title="English"/>
            <img src="/images/ru.png" width="" height="" id="rus_flag" alt="русский" title="Русский"/>
            <img src="/images/ua.png" width="" height="" id="ua_flag" alt="Украинский" title="Украинский"/>
            <?echo Session::instance()->get('leng');?>
        </div>         
        <div class="logo">
            <a href="/" id="logo">
                <img src="/images/logo.png" alt="Game box" title="/">
            </a>
        </div>
        <div class="special-list">
        <?if(isset($new_user)){
            echo '<a href="/user/home">Личный кабинет</a><a href="/user/user_logout">Выход</a>';
        }else {
            echo '<a href="/user/user_regist">Регистрация</a><a href="/user/user_login">Вход</a>';
        }?>										
        </div>
        <div class="clear"></div>
        <div class="row-top">
            <nav class="primary">
                <ul id="topnav" class="sf-menu">
                    <li id="menu-item-205" class="menu-item <? if($_SERVER['REQUEST_URI'] == '/') { echo "current-menu-item";}?>">
                        <a  href='/'>Главная</a>
                    </li> 
                    <li id="menu-item-205" class="menu-item <? if($_SERVER['REQUEST_URI'] == '/page/about') { echo "current-menu-item";}?>">
                        <a  href="/page/about">О сайте</a>
                    </li>
                    <li id="menu-item-205" class="menu-item <? if($_SERVER['REQUEST_URI'] == '/page/contacts') { echo "current-menu-item";}?>">
                        <a  href="/page/contacts">Контакты</a>
                    </li>                   
                </ul>					
            </nav><!--end nav-->
            <div id="top-search">
                <form method="POST" action="/search">
                    <input type="text" id="search_text" name="search_query" value="Найти..."/>
                    <input type="submit" value="GO" id="submit" />
                    <br />
                    <input type="radio" name="in" value="title" checked="checked"/><span>В названии</span>
                    <input type="radio" name="in" value="text" /><span>В тексте</span>
                </form>
            </div> <!--end search--> 
            <div class="clear"></div>
        </div><!-- end row_top-->
    </header><!--end header-->
    
   
   
<? if($_SERVER['REQUEST_URI'] == '/'){ ?>
      
  <script type="text/javascript">
  	// initialise plugins
		jQuery(function(){
			// main navigation init
			jQuery('ul.sf-menu').superfish({
				delay:       1000, 		// one second delay on mouseout 
				animation:   {opacity:'show',height:'show'}, // fade-in and slide-down animation
				speed:       'normal',  // faster animation speed 
				autoArrows:  false,   // generation of arrow mark-up (for submenu) 
				dropShadows: false   // drop shadows (for submenu)
			});
			
			// prettyphoto init
			jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({
				animation_speed:'normal',
				slideshow:5000,
				autoplay_slideshow: false
			});
			
		});
		
		// Init for audiojs
		audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});
  </script>
  
  <script type="text/javascript">
		jQuery(window).load(function() {
			// nivoslider init
			jQuery('#slider').nivoSlider({
				effect: 'fade',
				slices:10,
				boxCols:10,
				boxRows:5,
				animSpeed:500,
				pauseTime:5000,
				directionNav:false,
				directionNavHide:false,
				controlNav:true,
				captionOpacity:1			});
		});
	</script>
  <!-- Custom CSS --> 
    
<section id="slider-wrapper">
<div id="slider" class="nivoSlider" style="position: relative; background-image: url(<?=Kohana::$base_url;?>/images/slide4.jpg); background-position: initial initial; background-repeat: no-repeat no-repeat; ">
	<img src="<?=Kohana::$base_url;?>/images/slide1.jpg" alt="" title="#sliderCaption1" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide2.jpg" alt="" title="#sliderCaption2" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide3.jpg" alt="" title="#sliderCaption3" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide4.jpg" alt="" title="#sliderCaption4" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide5.jpg" alt="" title="#sliderCaption5" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide6.jpg" alt="" title="#sliderCaption6" style="display: none; ">
    <img src="<?=Kohana::$base_url;?>/images/slide7.jpg" alt="" title="#sliderCaption7" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide8.jpg" alt="" title="#sliderCaption8" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide9.jpg" alt="" title="#sliderCaption9" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide10.jpg" alt="" title="#sliderCaption10" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide11.jpg" alt="" title="#sliderCaption11" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide12.jpg" alt="" title="#sliderCaption12" style="display: none; "> 
    <img src="<?=Kohana::$base_url;?>/images/slide13.jpg" alt="" title="#sliderCaption13" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide14.jpg" alt="" title="#sliderCaption14" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide15.jpg" alt="" title="#sliderCaption15" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide16.jpg" alt="" title="#sliderCaption16" style="display: none; ">      
	<img src="<?=Kohana::$base_url;?>/images/slide17.jpg" alt="" title="#sliderCaption17" style="display: none; ">        
	
</div>
  </section><!--#slider--> 
        <?}?>