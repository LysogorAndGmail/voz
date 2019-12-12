    <link rel="stylesheet" href="<?=Kohana::$base_url?>css/animate.css">
	<link rel="stylesheet" href="<?=Kohana::$base_url?>css/anythingslider.css">
	<script src="<?=Kohana::$base_url?>js/jquery.anythingslider.js"></script>
	<script src="<?=Kohana::$base_url?>js/jquery.anythingslider.fx.js"></script>
 
<div class="main">
    <div class="container_24">
        <? foreach($folders as $folder){
            $fiarst_img = DB::select()->from('galery')->where('folder_id','=',$folder['id'])->execute()->current();
            ?>
        <div class="one_folder">
            <a href="<?=Kohana::$base_url;?>resurse/galery?folder=<?=$folder['id'];?>"><img width="150" height="100" style="border-radius: 10px;" src="<?=Kohana::$base_url;?>material_images/<?=$fiarst_img['galery_name'];?>" /></a>
            
            <p><a href="<?=Kohana::$base_url;?>resurse/galery?folder=<?=$folder['id'];?>"><?=$folder['name'];?></a></p>
        </div>
        <?}?>
        <div class="clear"></div>
    </div>             
</div>