<style>
#show_page {
    margin-top:-58px;
} 
.one_bord_mess {
    background-color: #e5e5e5;
    border-radius: 5px;
    padding: 10px;
    padding-top: 0;
    width: 400px;
    margin:10px;
}
.one_bord_mess p{
    padding: 0 !important;
    margin-bottom: 10px;
    font-size: 14px !important;
}
.one_bord_mess .date {
    float: left;
    font-style: italic;
    font-weight: bold;
}
.one_bord_mess .price {
    float: right;
    font-style: italic;
    font-weight: bold;
}
</style>
<? 
$cat_name = '';
switch($cat){
    case'nedvig':
    $cat_name = 'Нерухомість';
    break;
    case'trans':
    $cat_name = 'Транспорт';
    break;
    case'rabota':
    $cat_name = 'Робота';
    break;
    case'elek':
    $cat_name = 'Електроніка';
    break;
    case'biznes':
    $cat_name = 'Бізнес та послуги';
    break;
    case'mir':
    $cat_name = 'Дитячий світ';
    break;
    case'sad':
    $cat_name = 'Дім і сад';
    break;
    case'giv':
    $cat_name = 'Тварини';
    break;
    case'moda':
    $cat_name = 'Мода і стиль';
    break;
    case'sport':
    $cat_name = 'Хобі, відпочинок і спорт';
    break;
    case'obmin':
    $cat_name = 'Обмін';
    break;
    case'viddam':
    $cat_name = 'Віддам безкоштовно';
    break;
}?>
<div class="main">
    <div class="container_24">
        <div id="show_page">            
            <div class="bread">
                <p>
                    <span>
                        Головна -> 
                    </span>
                    <span>
                        <a href='/board'>Дошка оголошень</a> ->
                    </span>
                    <span>
                        <a href='/board/<?=$cat;?>'><?=$cat_name;?></a>
                    </span>
                </p> 
            </div>
            <div class="show_cats_block">
                <ul class="show_most_cat">
                    <div class="show_page_text">
                        <? if(!empty($all)){ $i=1; foreach($all as $a){?>
                            <div class="one_bord_mess" style="<? if($i==1){ echo 'float: left;'; }else{ echo 'float: right;'; }?>">
                                <span class="price" style="margin-top: 10px;"><?=date('d.m.Y',strtotime($a['date']));?></span>                     
                                <p><?=$a['text'];?></p>
                                <span class="date">тел. <?=$a['tel'];?></span>
                                <span class="price"><?=$a['price'];?> грн.</span>
                            </div>
                        <? $i++; if($i == 3){ $i=1; } } } else{ ?>
                            <p>Категорія поки порожня!</p>
                        <?}?>
                        <div style="clear: both;">&nbsp;</div>
                    </div>
                    <div class="clear"></div>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>