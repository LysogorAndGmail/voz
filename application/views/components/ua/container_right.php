<div class="grid_3">
            <div id="categories">
                <h2>Категории</h2>
                <ul class="ul_parent">
                <?$all_cat = Model::factory('cat')->all_parent_cat(); foreach($all_cat as $parent):?>
                    <li>
                        <a href="<?='/cat/'.$parent['cat_id'];?>"><?=$parent['cat_title'];?></a>
                    </li>
                <?endforeach;?>
                </ul>
            </div>              
            <div id="my_popularpostswidget-3">
                <h2>Соц. сети</h2>						
                <div class="soc">
                    <div class="fs">
                        <div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=435378246504501";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like-box" data-href="http://www.facebook.com/pages/&#x421;&#x430;&#x43c;&#x440;&#x435;&#x43c;&#x430;&#x432;&#x442;&#x43e;/255305437924399" data-width="200" data-height="290" data-show-faces="true" data-stream="true" data-header="true"></div>


                    
                    </div>
                    <div class="vk">
                    
                     <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?52"></script>

<!-- VK Widget -->
<div id="vk_groups"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {mode: 0, width: "200", height: "290"}, 42496294);
</script>
                    
                    </div>
                </div>
                
            </div>         	
        </div>