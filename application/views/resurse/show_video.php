<div class="main">
    <div class="show_page_text">
        <h3>Video</h3>
        <table>
        <?foreach($videos as $video){?>
            <tr>
                <td style="text-align: center; vertical-align: middle;"><img src="<?=Kohana::$base_url;?>material_images/<?=$video['video_icon'];?>" width="269" height="174" /></td>
                <td style="text-align: center; vertical-align: middle;"><h2 style="text-align: center; font-size: 14px; padding-left: 20px;"><a href="<?=$video['video_href'];?>" style="font-size: 22px;"><?=$video['video_title'];?></a></h2></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
        <? }?>
        </table>
        
    </div>              
</div>