<script>
$(window).load(function() {
    
	$outer_container=$("#outer_container");
	$imagePan_panning=$("#imagePan .panning");
	$imagePan=$("#imagePan");
	$imagePan_container=$("#imagePan .container");
    
	containerWidth=$imagePan.width();
	containerHeight=$imagePan.height();
	totalContentW=$imagePan_panning.width();
	totalContentH=$imagePan_panning.height();
	$imagePan_container.css("width",totalContentW).css("height",totalContentH);

	function MouseMove(e){
		var mouseCoordsX=(e.pageX - $imagePan.offset().left);
		var mouseCoordsY=(e.pageY - $imagePan.offset().top);
	  	var mousePercentX=mouseCoordsX/containerWidth;
	  	var mousePercentY=mouseCoordsY/containerHeight;
	  	var destX=-(((totalContentW-(containerWidth))-containerWidth)*(mousePercentX));
	  	var destY=-(((totalContentH-(containerHeight))-containerHeight)*(mousePercentY));
	  	var thePosA=mouseCoordsX-destX;
	  	var thePosB=destX-mouseCoordsX;
	  	var thePosC=mouseCoordsY-destY;
	  	var thePosD=destY-mouseCoordsY;
	  	var marginL=$imagePan_panning.css("marginLeft").replace("px", "");
	  	var marginT=$imagePan_panning.css("marginTop").replace("px", "");
	  	var animSpeed=500; //ease amount
	  	var easeType="easeOutCirc";
	  	if(mouseCoordsX>destX || mouseCoordsY>destY){
			//$imagePan_container.css("left",-thePosA-marginL); $imagePan_container.css("top",-thePosC-marginT); //without easing
		  	$imagePan_container.stop().animate({left: -thePosA-marginL, top: -thePosC-marginT}, animSpeed,easeType); //with easing
	  	} else if(mouseCoordsX<destX || mouseCoordsY<destY){
			//$imagePan_container.css("left",thePosB-marginL); $imagePan_container.css("top",thePosD-marginT); //without easing
		  	$imagePan_container.stop().animate({left: thePosB-marginL, top: thePosD-marginT}, animSpeed,easeType); //with easing
	  	} else {
			$imagePan_container.stop();
	  	}
	}


	$imagePan.bind("mousemove", function(event){
		MouseMove(event);									  
	});
});

$(window).resize(function() {
	$imagePan.unbind("mousemove");
	$imagePan_container.css("top",0).css("left",0);
	$(window).load();
});
</script>
<style type="text/css">
#outer_container{position:relative; margin:auto; height:737px; width:900px; padding: 0;}
#imagePan{position:relative; overflow:hidden; cursor:crosshair; height:100%; width:100%;}
#imagePan .container{position:relative; left:0;}

#outer_container1{position:relative; margin:auto; height:737px; width:900px; padding: 0;}
#imagePan1{position:relative; overflow:hidden; cursor:crosshair; height:100%; width:100%;}
#imagePan1 .container1{position:relative; left:0;}
</style>
<div class="main">
    <div class="container_24">
        <div style="width: 100%; height: 50px; margin: -50px 0 10px;">
            <div id="s_k"  style="width: 25%; float: left; text-align: center;"><span style="border-bottom: 1px solid red;">Маленька карта</span></div>
            <div id="1815_k"  style="width: 25%; float: left; text-align: center;"><a href="/resurse/karta_voznesenska_1859"><span style="border-bottom: 1px solid red;">Карта 1859р.</span></a></div>
            <div id="b_k" style="width: 25%; float: left; text-align: center;"><span style="border-bottom: 1px solid red;">Велика карта</span></div>
            <div id="g_k" style="width: 25%; float: left; text-align: center;"><span style="border-bottom: 1px solid red;">Google карта</span></div>
        </div>
        <div class="center_resurse" style="outline: 1px solid #00ff00; width:900px; margin: 0 auto;">
            <div id="karta_big" style="width: 900px; height: 737px;">
                <div id="outer_container">
                    <div id="imagePan">
                        <div class="container">
                            <div>
                                <img src="/images/Citten_1920x1200.jpg" class="panning" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="karta_1815" style="width:737px; text-align: center;">
                <img src="/images/Karta_1859.jpg" width="900" height="" style="margin: auto;" />
            </div>
            <div id="karta_jpg" style="width:737px; height: 900px; text-align: center;">
                <img src="/images/karta_900px.jpg" width="737" height="900" style="margin: auto;" />
            </div>
            <div id="google_karta" style="width:900px; height: 737px;">
                <iframe width="900" height="737" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.ru/maps?f=q&amp;source=embed&amp;hl=ru&amp;geocode=&amp;q=%D0%92%D0%BE%D0%B7%D0%BD%D0%B5%D1%81%D0%B5%D0%BD%D1%81%D0%BA,+%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B5%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+%D0%A3%D0%BA%D1%80%D0%B0%D0%B8%D0%BD%D0%B0&amp;aq=0&amp;oq=djpytctycr&amp;sll=55.354135,40.297852&amp;sspn=21.737349,67.631836&amp;ie=UTF8&amp;hq=&amp;hnear=%D0%92%D0%BE%D0%B7%D0%BD%D0%B5%D1%81%D0%B5%D0%BD%D1%81%D0%BA,+%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B5%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+%D0%A3%D0%BA%D1%80%D0%B0%D0%B8%D0%BD%D0%B0&amp;t=m&amp;ll=47.560542,31.336098&amp;spn=0.085373,0.154324&amp;z=13&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.ru/maps?f=q&amp;source=embed&amp;hl=ru&amp;geocode=&amp;q=%D0%92%D0%BE%D0%B7%D0%BD%D0%B5%D1%81%D0%B5%D0%BD%D1%81%D0%BA,+%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B5%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+%D0%A3%D0%BA%D1%80%D0%B0%D0%B8%D0%BD%D0%B0&amp;aq=0&amp;oq=djpytctycr&amp;sll=55.354135,40.297852&amp;sspn=21.737349,67.631836&amp;ie=UTF8&amp;hq=&amp;hnear=%D0%92%D0%BE%D0%B7%D0%BD%D0%B5%D1%81%D0%B5%D0%BD%D1%81%D0%BA,+%D0%9D%D0%B8%D0%BA%D0%BE%D0%BB%D0%B0%D0%B5%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+%D0%A3%D0%BA%D1%80%D0%B0%D0%B8%D0%BD%D0%B0&amp;t=m&amp;ll=47.560542,31.336098&amp;spn=0.085373,0.154324&amp;z=13&amp;iwloc=A" style="color:#0000FF;text-align:left">Просмотреть увеличенную карту</a></small>
            </div> 
        </div>
        <div class="clear"></div>
    </div>
    
               
</div>