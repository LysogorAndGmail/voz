 <p>Головна -> Всі категорії</p>
    <article>
          <div class="indent-left">
                <p class="page_title">Всі категорії</p>    
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
              <a class="show_all" href="/material/show_all">Всі материали</a>
          </div>            
    </article>
                                   