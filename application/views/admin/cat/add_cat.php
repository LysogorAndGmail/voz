<div class="add_cat">
    <h4 style="font-size: 25px;">Добавление категории</h4>
    <form id="add_metki" action="/admin/add_cat" method="post" >
        <span style="color: red;">Видимость в меню: 
        <select name="visible" size="1">
            <option value="0">Не видима</option>
            <option value="1">Видима</option>
        </select>
        </span>
        <br />
        <label>Название категории:<br />
            <input name="cat_title" type="text" style="width:500px;" />
        </label>
        <br />
        <input type="hidden" name="insert" value="admin" />
        <br />
        <label>Родительская категория:<br />
            <select name="parent_id" size="1" style="width:500px;">
                <option value="0">Без  родителя</option>
                <? foreach($cats as $cat):?>
                <option value="<?=$cat['cat_id'];?>"><?=$cat['cat_title'];?></option>
                <? endforeach;?>
            </select>
        </label>
        <br /><br />
        <input id="admin_login_submit" type="submit" value="Добавить"/>  
    </form>
</div>
                  