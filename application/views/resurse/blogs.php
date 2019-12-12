<div class="main">
    <div class="show_page_text">
        <h3 style="margin-bottom: -30px;">Блоги</h3>
        <div class="show_all_blogs">
        <? foreach($blogs as $blog) { ?>
            <div class="one_b">
                <div class="one_blog">
                &nbsp;
                </div>
                <div class="one_blog_foto">
                    <img src="<?=Kohana::$base_url?>material_images/<? echo $blog['blog_foto'];?>" width="200" height="200" />
                </div>
                <p><a href="/blog/<?=$blog['blog_id'];?>"><? echo $blog['blog_name'];?></a></p>
            </div>
            <?}?>
        </div>
        <div class="clear"></div>
    </div>      
</div>