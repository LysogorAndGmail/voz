<div class="main">
    <div class="container_24">
        <div class="show_deputat">
            <!-- -->           
                <div class="show_one_dep">
                    <div class="dep_foto">
                    <?if(!empty($dep['dep_foto'])) {?>
                        <img src="<?echo Kohana::$base_url."material_images/".$dep['dep_foto'];?>" width="280" height="333"/>
                    <?}else {?>
                        <img src="<?echo Kohana::$base_url;?>material_images/no-foto.jpg" width="280" height="333"/> 
                    <?}?>
                    </div>
                    <div class="dep_top_text">
                        <h2 style="font-size: 20px; color:black; text-align: center;"><?=$dep['dep_name'];?></h2>
                        <div class="dep_text"><?php echo $dep['dep_text'];?></div>
                    </div>
                    <div class="clear"></div>
                    <hr />
                    
                </div>
            <!-- -->
        </div>
        <div class="clear"></div>
    </div>
    
               
</div>