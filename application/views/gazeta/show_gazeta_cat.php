<div class="main">
    <div class="container_24">
        <div id="show_page">
            <div class="show_page_text">
                <h2 class="cat_title" style="padding-bottom: 40px;"><?=$cat['g_c_title'];?></h2>
                <div class="show_cats_block">
                    <ul class="show_most_cat">
                        <?foreach($materials_all as $mat){?>
                            <li>
                                <a href="/gazeta_mat/<?=$mat['g_m_id'];?>"><?=$mat['g_m_title'];?></a>
                            </li>
                        <?}?>
                    </ul>
                </div>
                <div style="text-align: center; font-size: 12px; padding-top: 15px;"><?=$pagination;?></div>
            </div>
        <div class="clear"></div>
    </div>
</div>
                  
                                   