   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title><?=$page['page_title'];?></title>
    <meta charset="utf-8"/>
    <meta name="keywords" content="<?=$page['page_meta_key'];?>"/>
    <meta name="description" content="<?=$page['page_meta_desc'];?>"/>
    <!--<link rel="stylesheet" type="text/css" media="screen" href="<?echo Kohana::$base_url;?>css/resets.css"/>-->
    <link rel="stylesheet" type="text/css" media="screen" href="<?echo Kohana::$base_url;?>css/style.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="<?echo Kohana::$base_url;?>css/grid.css"/>
   <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:700' rel='stylesheet' type='text/css'/>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js" type="text/javascript"></script>

    <meta name="google-translate-customization" content="4187627fbb1c8ed0-0dd54dc463f7ba9c-gf74dd88a0ff46ae5-f"></meta>
    
	<script type="text/javascript" src="<?echo Kohana::$base_url;?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?echo Kohana::$base_url;?>js/myjs.js"></script>
    <script type="text/javascript" src="<?echo Kohana::$base_url;?>js/ga.js"></script>
    <script type="text/javascript" src="<?echo Kohana::$base_url;?>js/superfish.js"></script>
    <script type="text/javascript" src="<?echo Kohana::$base_url;?>js/FF-cash.js"></script>
    <script type="text/javascript" src="<?echo Kohana::$base_url;?>js/cufon-yui.js"></script>
    <script type="text/javascript" src="<?echo Kohana::$base_url;?>js/cufon-replace.js"></script>
    <script type="text/javascript" src="<?echo Kohana::$base_url;?>js/Fineliner_Script_400.font.js"></script>
    <script type="text/javascript" src="<?echo Kohana::$base_url;?>js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?echo Kohana::$base_url;?>js/jquery.cycle.all.js"></script>
    <script type="text/javascript" src="<?echo Kohana::$base_url;?>js/easyTooltip.js"></script>
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


