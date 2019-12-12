 <? $i=1; foreach($all as $mat) { //print_r($mat);ho_insert moderator
     if($i==3){$i = 0;}?>
    <div class="padding-1" style="width: 30%; float: left; margin: 10px;">
        <? if(empty($mat['mod_id'])){?>
            <a href="<?echo 'material/'.$mat['material_id'];?>">
        <?if(!empty($mat['material_img'])){?>
            <img src="<?=Kohana::$base_url;?>material_images/<?echo $mat['material_img'];?>" alt="" width="" height="" style="width: 100% !important; height: auto !important;" class="img-indent"/>
        <?}else {?>
            <img src="<?=Kohana::$base_url;?>material_images/no_foto_mat.jpg" alt="" style="width: 100% !important;" class="img-indent"/>
        <?}?>
            </a>
        <?}else{ ?>
            <a href="<?echo 'material/'.$mat['material_id'];?>">
                <img src="<?=Kohana::$base_url;?>moderator_icons/<? echo $mat['mod_id'].'.jpg';?>" alt="" width="" height="" style="width: 100% !important; height: auto !important;" class="img-indent"/>
            </a>
        <?}?>
        <span style="position: relative; top: -20px; color: black; left: 10px;"><?echo date('d.m.Y',strtotime($mat['material_date']));?></span>
        <div class="text-box-1" style="width:100% !important; margin-top: -28px;">
            <p style="text-align: center;"><a href="<?echo 'material/'.$mat['material_id'];?>"><?echo $mat['material_title'];?></a></p>
        </div>
    </div>
    <?if($i==0){?>
    <div class="clearfix">&nbsp;</div>    
    <?}?>
<?  $i++; }?>