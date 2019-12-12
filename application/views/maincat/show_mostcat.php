 <article>
    <div class="indent-left">
        <p class="page_title"><?=$maincat->most_cat_title;?></p>
        <p class="border-bot"><?=$maincat->most_cat_desc;?></p>    
    </div>  
    <div class="super">
    <? $cat_all = ORM::factory('cat')->where('parent_id','=',$maincat->most_cat_id)->find_all()->as_array();
    if ($cat_all) {?>
        <h4>Дочерние категории</h4>
        <ul class="show_most_cat">
            
            <? foreach($cat_all as $cat):?>
            <li>
                <img src="/images/koleso.png" alt="icon"/>
                <a href="<?='/cat/'.$cat->cat_id;?>"><?=$cat->cat_title;?></a>
            </li>
            <? endforeach;?>
        </ul>
        <? }
        else {
            
          echo "<p class='error'>В данной категории пока нет материаллов!!!</p>";;  
            
        }?>
    <a class="show_all" href="/cat/show_all">Все категории</a>
    </div>
</article>
                                   