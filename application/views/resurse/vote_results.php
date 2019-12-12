<div style="width: 165px;">
    <? foreach($array as $vot){?>
        <span><?=$vot[0];?> (<?=$vot[1];?>%) </span><div style="background-color: red; width: <?=round($vot[1]);?>% !important; height: 20px;">&nbsp;</div>
    <?}?>
</div>