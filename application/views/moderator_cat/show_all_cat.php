 <p>Главная -> Все категории</p>
    <article>
          <div class="indent-left">
                <p class="page_title">Все категории</p>    
          </div>  
          <div class="super">
                <ul class="show_most_cat">
                    <? foreach($cat_all as $all):?>
                      <li>
                            <img src="/images/zap.png" alt="icon" style="margin-right: 6px;"/>
                            <a href="<?='/cat/'.$all->cat_id;?>"><?=$all->cat_title;?></a>
                      </li>
                     <? endforeach;?>
                </ul>
              <a class="show_all" href="/material/show_all">Все материаллы</a>
          </div>            
    </article>
                                   