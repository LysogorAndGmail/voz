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
            <div  style="width: 100%; float: left; text-align: center;"><a href="/resurse/karta_voznesenska"><span style="border-bottom: 1px solid red;">Маленька карта</span></a></div>
        </div>
        <div class="center_resurse" style="outline: 1px solid #00ff00; width:900px; margin: 0 auto;">
            <div id="karta_big" style="width: 900px; height: 737px;">
                <div id="outer_container">
                    <div id="imagePan">
                        <div class="container">
                            <div>
                                <img src="/images/karta_1859_4000.jpg" class="panning" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    
               
</div>