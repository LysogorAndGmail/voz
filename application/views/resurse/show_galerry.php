<link rel="stylesheet" type="text/css" href="<?=Kohana::$base_url?>js/fancybox/jquery.fancybox.css" media="screen" />
	<script type="text/javascript" src="<?=Kohana::$base_url?>js/fancybox/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="<?=Kohana::$base_url?>js/fancybox/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?=Kohana::$base_url?>js/fancybox/jquery.fancybox-1.2.1.pack.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("a.gallery, a.iframe").fancybox({
			     "overlayOpacity" : 0.9,	 
			});
		
url = $("a.modalbox").attr('href').replace("for_spider","content2");
$("a.modalbox").attr("href", url);	
$("a.modalbox").fancybox(
{								  
			"frameWidth" : 400,	 
			"frameHeight" : 400 
								  
});

			$("a.gallery2").fancybox(
			{						
"padding" : 20, // отступ контента от краев окна
"imageScale" : false, // Принимает значение true - контент(изображения) масштабируется по размеру окна, или false - окно вытягивается по размеру контента. По умолчанию - TRUE
			"zoomOpacity" : false,	// изменение прозрачности контента во время анимации (по умолчанию false)
			"zoomSpeedIn" : 1000,	// скорость анимации в мс при увеличении фото (по умолчанию 0)
			"zoomSpeedOut" : 1000,	// скорость анимации в мс при уменьшении фото (по умолчанию 0)
			"zoomSpeedChange" : 1000, // скорость анимации в мс при смене фото (по умолчанию 0)
			"frameWidth" : 700,	 // ширина окна, px (425px - по умолчанию)
			"frameHeight" : 600, // высота окна, px(355px - по умолчанию)
			"overlayShow" : true, // если true затеняят страницу под всплывающим окном. (по умолчанию true). Цвет задается в jquery.fancybox.css - div#fancy_overlay 
			"overlayOpacity" : 0.8,	 // Прозрачность затенения 	(0.3 по умолчанию)
			"hideOnContentClick" :false, // Если TRUE  закрывает окно по клику по любой его точке (кроме элементов навигации). Поумолчанию TRUE		
			"centerOnScroll" : false // Если TRUE окно центрируется на экране, когда пользователь прокручивает страницу		
				
			});
		
		$("#menu a, .anim").hover( function() {
      $(this).animate({"paddingLeft" : "10px"}, 300)},
	  function() {$(this).animate({"paddingLeft" : "0"}, 300);
});

$("a.iframe").fancybox(
{								  
			"frameWidth" : 800,	 // ширина окна, px (425px - по умолчанию)
			"frameHeight" : 600 // высота окна, px(355px - по умолчанию)
								  
});

		
		});
	</script>

<div class="main">
    <div class="container_24">
    <h2><?=$gall_name['name'];?></h2>
<div id="wrap">
	<? foreach($all_img as $img){?>
        <a class="gallery" rel="group" title="<?=$img['galery_desc'];?>" href="/material_images/<?=$img['galery_name'];?>"><img width="150" height="100" src="/material_images/<?=$img['galery_name'];?>" /></a>
    <?}?>
    	


<br>
</div>
</div>
</div>