<!DOCTYPE html>
<html lang="en" class="cufon-active cufon-ready">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Voz</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/grid.css">
   <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/ga.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
    <script type="text/javascript" src="js/FF-cash.js"></script>
    <script type="text/javascript" src="js/cufon-yui.js"></script>
    <script type="text/javascript" src="js/cufon-replace.js"></script>
    <script type="text/javascript" src="js/Fineliner_Script_400.font.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script>
    <script type="text/javascript" src="js/easyTooltip.js"></script>
	<script type="text/javascript" src="js/myjs.js"></script>
    <script type="text/javascript">
	
		$(function(){
			$('ul.sf-menu').superfish();
			$('#slideshow').cycle({
				fx: 'scrollHorz',
				timeout: 6000,
				pager: '#nav',
				easing: 'easeInOutBack',
				pagerAnchorBuilder: pagerFactory
			});
			function pagerFactory(idx, slide) {
				var s = idx > 2 ? ' style="display:none"' : '';
				return '<li'+s+'><a href="#">'+(idx+1)+'</a></li>';
			}; 
		}); 
	</script>
	<!--[if lt IE 7]>
  		<div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/../images/banners/warning_bar_0000_us.jpg"border="0"alt=""/></a></div>  
 	<![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
</head>
<body id="page1">
	<div class="top-bg">
    	<div class="main-bg">
   		<!--=====HEADER=====-->
            <header>    	
                <div class="main">
                    <div class="inner">
                    	<h1>
                            <a href="#"><cufon class="cufon cufon-canvas" alt="Inetto" style="width: 221px; height: 130px;"><canvas width="319" height="145" style="width: 319px; height: 145px; top: -11px; left: -7px;"></canvas><cufontext>Inetto</cufontext></cufon></a>
                            <strong>Internet Technology Consultants</strong>
                        </h1>
                        <div class="wrapper">
                            <div class="top-service-buttons">
                                <a href="#" class="top-button-1">Регистрация</a>
                                <a href="#" class="top-button-2">Вход</a>
                                <a href="#" class="top-button-3">Помощь</a>
                            </div>
                            <form id="search-form">
                                <input type="text" name="search">
                                <a onclick="document.getElementById(&#39;search-form&#39;).submit()" class="search-submit"></a>
                            </form>
                        </div>
                        <div class="wrapper">
                            <div class="follow-link">
                                <strong>follow us on:</strong>
                                <a href="#" class="tooltip" title="Twitter"></a>
                            </div>
                        </div>
                        <nav>
                            <ul class="sf-menu sf-js-enabled sf-shadow">
                                <li><a href="#" class="active">Home</a></li>
                                <li><a href="#">Company</a></li>
                                <li class=""><a href="#" class="sf-with-ul">Services<span class="sf-sub-indicator"> »</span></a>
                                    <ul style="display: none; visibility: hidden;">
                                        <li><a href="#">Services List</a></li>
                                        <li class=""><a href="#" class="sf-with-ul">Special Services<span class="sf-sub-indicator"> »</span></a>
                                            <ul style="display: none; visibility: hidden;">
                                                <li><a href="#">Networking</a></li>
                                                <li><a href="#">Technical Support</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">New Services</a></li>
                                        <li><a href="#">Integration</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Projects</a></li>
                                <li class="last"><a href="#">Contacts</a></li>
                            </ul>
                        </nav>
                        <div class="clear"></div>
                    </div>
                </div>
            </header>
            <!--=====SLIDER=====-->
            <div id="slideshow-box">
            	<div id="slideshow" style="position: relative; width: 940px; height: 170px; overflow: hidden;">
                    <div class="slider-item" style="position: absolute; top: 0px; left: -940px; display: none; z-index: 3; opacity: 1; width: 940px; height: 170px;">
                        <strong>Networking. Database Management.</strong>
                        <strong class="extra">Applications Development.</strong>
                        <strong class="extra">Project Management.</strong>
                    </div>
                    <div class="slider-item" style="position: absolute; top: 0px; left: -940px; display: none; z-index: 3; opacity: 1; width: 940px; height: 170px;">
                        <strong>Use information technology</strong>
                        <strong class="extra">to meet your business objectives</strong>
                    </div>
                    <div class="slider-item" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 4; opacity: 1; width: 940px; height: 170px;">
                        <strong>What Can We Do For You Through Information</strong>
                        <strong class="extra">Technology Consulting?</strong>
                    </div>
            	</div>
                <!--<div class="navigation">
                    <ul id="nav">
                        <li class="">
                            <a href="#">1</a>
                        </li>
                        <li class="">
                            <a href="#">2</a>
                        </li>
                            <li class="activeSlide">
                        <a href="#">3</a>
                        </li>
                    </ul>
                </div>-->
            </div>
            <!--=====TOP CONTENT=====-->
            <section id="top-content">
            	<div class="main">
                	<div class="inner">
                    	<div class="col-1">
                        	<div class="top-box">
                            	<div class="box-1">
                                    <h3>
                                        Web<strong>development</strong>
                                    </h3>
                                    <p>
                                        Eibudamet aut rerum odes necessitatibus saepe evenievoluptates estu repudiandae sint et mole.
                                    </p>
                                    <div class="aligncenter">
                                    	<a href="#" class="button-1_my">read more</a>
                                    </div>
                                </div>
                            </div>	
                        </div>
                        <div class="col-2">
                        	<div class="top-box">
                            	<div class="box-2">
                                    <h3>
                                        Technical<strong>support</strong>
                                    </h3>
                                    <p>
                                        Eibudamet aut rerum odes necessitatibus saepe evenievoluptates estu repudiandae sint et mole.
                                    </p>
                                    <div class="aligncenter">
                                    	<a href="#" class="button-1_my">read more</a>
                                    </div>
                                </div>
                            </div>	
                        </div>
                        <div class="col-3">
                        	<div class="top-box">
                            	<div class="box-3">
                                    <h3>
                                        Network<strong>solutions</strong>
                                    </h3>
                                    <p>
                                        Eibudamet aut rerum odes necessitatibus saepe evenievoluptates estu repudiandae sint et mole.
                                    </p>
                                    <div class="aligncenter">
                                    	<a href="#" class="button-1_my">read more</a>
                                    </div>
                                </div>
                            </div>	
                        </div>
                        <div class="col-4">
                        	<div class="top-box">
                            	<div class="box-4">
                                    <h3>
                                        Internet<strong>access</strong>
                                    </h3>
                                    <p>
                                        Eibudamet aut rerum odes necessitatibus saepe evenievoluptates estu repudiandae sint et mole.
                                    </p>
                                    <div class="aligncenter">
                                    	<a href="#" class="button-1_my">read more</a>
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                    <!-- -->
                    <div class="inner">
                    	<div class="col-1">
                        	<div class="top-box">
                            	<div class="box-1">
                                    <h3>
                                        Web<strong>development</strong>
                                    </h3>
                                    <p>
                                        Eibudamet aut rerum odes necessitatibus saepe evenievoluptates estu repudiandae sint et mole.
                                    </p>
                                    <div class="aligncenter">
                                    	<a href="#" class="button-1_my">read more</a>
                                    </div>
                                </div>
                            </div>	
                        </div>
                        <div class="col-2">
                        	<div class="top-box">
                            	<div class="box-2">
                                    <h3>
                                        Technical<strong>support</strong>
                                    </h3>
                                    <p>
                                        Eibudamet aut rerum odes necessitatibus saepe evenievoluptates estu repudiandae sint et mole.
                                    </p>
                                    <div class="aligncenter">
                                    	<a href="#" class="button-1_my">read more</a>
                                    </div>
                                </div>
                            </div>	
                        </div>
                        <div class="col-3">
                        	<div class="top-box">
                            	<div class="box-3">
                                    <h3>
                                        Network<strong>solutions</strong>
                                    </h3>
                                    <p>
                                        Eibudamet aut rerum odes necessitatibus saepe evenievoluptates estu repudiandae sint et mole.
                                    </p>
                                    <div class="aligncenter">
                                    	<a href="#" class="button-1_my">read more</a>
                                    </div>
                                </div>
                            </div>	
                        </div>
                        <div class="col-4">
                        	<div class="top-box">
                            	<div class="box-4">
                                    <h3>
                                        Internet<strong>access</strong>
                                    </h3>
                                    <p>
                                        Eibudamet aut rerum odes necessitatibus saepe evenievoluptates estu repudiandae sint et mole.
                                    </p>
                                    <div class="aligncenter">
                                    	<a href="#" class="button-1_my">read more</a>
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                    <!-- -->
                </div>
            </section>
        </div>
    </div>
    <!--=====CONTENT=====-->
    <section id="content">
    	<div class="main">
        	<div class="container_24">
                <article class="grid_6 suffix_2">
                    <h3>Our Services</h3>
                    <ul class="list-1">
                        <li><a href="#"><span>Applications Integration</span></a></li> 
                        <li><a href="#"><span>Internet Marketing</span></a></li>
                        <li><a href="#"><span>IT Advisory Services</span></a></li>
                        <li><a href="#"><span>IT Staff Augmentation</span></a></li>
                    </ul>
                    <a href="#" class="link-1">View all</a>
                </article>
                <article class="grid_16">
                    <h3 class="hp-1">Need IT Solutions?</h3>
                    <div class="padding-1">
                        <img src="../images/page1-img1.jpg" alt="" class="img-indent">
                        <div class="text-box-1">
                            <h4>Small Business Solutions</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididuntut labore eto dolore magna aliqua. Ut enim adrede minim veniam, quis nostrud exercitatiullamco laboris niuip.
                            </p>
                            <div class="buttons">
                            	<a href="#" class="link-1">Read more</a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div>
                        <img src="../images/page1-img2.jpg" alt="" class="img-indent">
                        <div class="text-box-1">
                            <h4>IT/Network Solutions</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididuntut labore et dolore magna aliqua. Ut enim adrede minim veniam, quis nostrud exercitatiullamco laboris nisi ut aliquip.
                            </p>
                            <div class="buttons">
                            	<a href="#" class="link-1">Read more</a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </article>
                <div class="clear"></div>
            </div>
		</div>
    </section>
    <!--=====ASIDE=====-->
    <aside>
    	<div class="top-bg">
        	<div class="main">
            	<div class="container_24">
                    <div class="border-col-1">
                        <div class="border-col-2">
                            <div class="border-col-3">
                                <article class="grid_5 suffix_1">
                                    <h3>Our Company</h3>
                                    <ul class="list-2">
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Work team</a></li>
                                    </ul>
                                </article>
                                <article class="grid_5 suffix_1">
                                    <h3>Main Services</h3>
                                    <ul class="list-2">
                                       <li><a href="#">About us</a></li>
                                       <li><a href="#">Work team</a></li>
                                    </ul>
                                </article>
                                <article class="grid_5 suffix_1">
                                    <h3>Related Links</h3>
                                    <ul class="list-2">
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Work team</a></li>
                                    </ul>
                                </article>
                                <article class="grid_5 suffix_1">
                                    <h3>Address</h3>
                                    <dl class="adress">
                                    	<dt>
                                        	9870 St Vincent Place, Glasgow, DC 45 Fr 45.
                                        </dt>
                                        <dd class="first"><span>+1 800 559 6580</span>Freephone:</dd>
                                        <dd><span>+1 800 603 6035</span>Telephone:</dd>
                                        <dd><span>+1 800 889 9898</span>FAX:</dd>
                                    </dl>
                                </article>
                			</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!--=====FOOTER=====-->
    <footer>
        <div class="inner">
            <div class="fleft">
                <strong>Inetto</strong>
                <span>© 2011&nbsp;|</span>
                <a href="#">Privacy policy</a>
                <div><!--{%FOOTER_LINK} --></div>
            </div>
            <ul class="social-links">
                <li><a href="#" class="item-1 tooltip" title="Flickr"></a></li>
                <li><a href="#" class="item-2 tooltip" title="Facebook"></a></li>
                <li><a href="#" class="item-3 tooltip" title="Technorati"></a></li>
                <li><a href="#" class="item-4 tooltip" title="Twitter"></a></li>
            </ul>
        </div>
    </footer>
<script>
	Cufon.now();
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7078796-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body></html>