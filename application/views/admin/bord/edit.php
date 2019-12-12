<style>
.add_bord_block {
    border-radius: 5px;
    padding: 10px;
    margin:10px;
}

.add_bord_block textarea {
    width: 858px;
    height: 120px;
    border-radius: 5px;
    padding: 10px;
}

.add_bord_block button {
    background: url(../images/top-buttons-2.gif) repeat-x;
    text-shadow: 1px 1px #bd5a02;
    width: 150px;
    font-family: 'Oswald', sans-serif;
    font-size: 11px;
    line-height: 19px;
    color: #fff;
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    text-transform: uppercase;
    margin: 0 2px 0 0;
    padding: 9px 0;
    text-align: center;
    cursor: pointer;
}
#show_page {
    margin-top:-58px;
} 
</style>

<div class="add_bord_block">
    <h4 style="font-size: 25px;">Редактирование</h4>
    <form action="" class="zver_for" method="POST">
        <input type="hidden" name="id" value="<?=$bord['id'];?>" />
        <label>
            Категорія: <br />
            <select name="cat">
                <option value="nedvig" <?if($bord['cat'] == 'nedvig'){ echo 'selected="selected"';}?> >Нерухомість</option>
                <option value="trans" <?if($bord['cat'] == 'trans'){ echo 'selected="selected"';}?>>Транспорт</option>
                <option value="rabota" <?if($bord['cat'] == 'rabota'){ echo 'selected="selected"';}?>>Робота</option>
                <option value="elek" <?if($bord['cat'] == 'elek'){ echo 'selected="selected"';}?>>Електроніка</option>
                <option value="biznes" <?if($bord['cat'] == 'biznes'){ echo 'selected="selected"';}?>>Бізнес та послуги</option>
                <option value="mir" <?if($bord['cat'] == 'mir'){ echo 'selected="selected"';}?>>Дитячий світ</option>
                <option value="sad" <?if($bord['cat'] == 'sad'){ echo 'selected="selected"';}?>>Дім і сад</option>
                <option value="giv" <?if($bord['cat'] == 'giv'){ echo 'selected="selected"';}?>>Тварини</option>
                <option value="moda" <?if($bord['cat'] == 'moda'){ echo 'selected="selected"';}?>>Мода і стиль</option>
                <option value="sport" <?if($bord['cat'] == 'sport'){ echo 'selected="selected"';}?>>Хобі, відпочинок і спорт</option>
                <option value="obmin" <?if($bord['cat'] == 'obmin'){ echo 'selected="selected"';}?>>Обмін</option>
                <option value="viddam" <?if($bord['cat'] == 'viddam'){ echo 'selected="selected"';}?>>Віддам безкоштовно</option>
            </select>
        </label>
        <br />
        <br />
        <label>
            Текст:<br />
            <textarea name="text" maxlength="255" class="valid"><?=$bord['text'];?></textarea>
        </label>
        <br />
        
        <label>
            Ціна:<br />
            <input type="text" name="price" maxlength="10" class="valid" value="<?=$bord['price'];?>"/> <span style="font-weight: bold;">грн.</span>
        </label>
        <br />
        <label>
            Тел:
            <br />
            <input type="text" name="tel" maxlength="10" class="valid" value="<?=$bord['tel'];?>" />
        </label>
        <br />
        <br />
        <label>
            <button class="top-button-2">Редактировать</button>
        </label>
    </form>
</div>    