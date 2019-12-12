<footer id="footer">
        <div class="footer-bg">
            <div class="container_12 clearfix">
                <div id="widget-footer" class="clearfix">
                    <div class="grid_3">  
                        <h4>Последние пополнения</h4>
                        <div id="post_footer">
                        <? $all_pop = Model::factory('material')->all_last_add(10);
                            foreach($all_pop as $pop):
                        ?>
                            <div class="one_post_footer">
                                <a href="/material/<?=$pop['material_id'];?>"><img src="/images/balka.png" /></a>
                                <div class="post_footer_info">
                                    <p class="info_title"><a href="/material/<?=$pop['material_id'];?>"><?=$pop['material_title'];?></a></p>
                                    <p class="info_info">Добавлено: <?=$pop['material_date'];?></p>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                            <? endforeach;?>
                        </div>						  
                    </div> 
                    <div class="grid_3">  
                        <h4>Самые обсуждаемые</h4>
                        <div id="post_footer">
                        <? $all_pop = Model::factory('material')->all_comm(10);
                            foreach($all_pop as $pop):
                        ?>
                            <div class="one_post_footer">
                                <a href="/material/<?=$pop['material_id'];?>"><img src="/images/podsh.png" /></a>
                                <div class="post_footer_info">
                                    <p class="info_title"><a href="/material/<?=$pop['material_id'];?>"><?=$pop['material_title'];?></a></p>
                                    <p class="info_info">Комментов: <? if(empty($pop['comment_count'])){ echo 0;} else {echo $pop['comment_count'];};?></p>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                            <? endforeach;?>
                        </div>							  
                    </div>
                    <div class="grid_3">  
                        <h4>Самый высокий рейтинг</h4>
                        <div id="post_footer">
                        <? $obs = Model::factory('material')->most_obs(10);
                            foreach($obs as $pop):
                        ?>
                            <div class="one_post_footer">
                                <a href="/material/<?=$pop['material_id'];?>"><img src="/images/tools.png" /></a>
                                <div class="post_footer_info">
                                    <p class="info_title"><a href="/material/<?=$pop['material_id'];?>"><?=$pop['material_title'];?></a></p>
                                    <p class="info_info">Рейтинг: <?=$pop['srednee'];?></p>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                            <? endforeach;?>
                        </div>						  
                    </div> 
                    <div class="grid_3">  
                        <h4>Самые популярные</h4>
                        <div id="post_footer">
                        <? $all_pop = Model::factory('material')->all_populary(10);
                            foreach($all_pop as $pop):
                        ?>
                            <div class="one_post_footer">
                                <a href="/material/<?=$pop['material_id'];?>"><img src="/images/tormoz.png" /></a>
                                <div class="post_footer_info">
                                    <p class="info_title"><a href="/material/<?=$pop['material_id'];?>"><?=$pop['material_title'];?></a></p>
                                    <p class="info_info">Просмотров: <?=$pop['material_views'];?></p>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                            <? endforeach;?>
                        </div>						  
                    </div>   
                </div>
            </div><!--.container-->
        </div>
        <div id="copy">
            <span><span class="abs">Copyright 2012 <a href="/" class="site-name"><?=$title;?></a> All rights reserved. Design by <a href="http://www.pozovnizayavi.org.ua/pages/contact">LysogorAnd</a>
            </span></span>
            <div class="clear"></div>
        </div>
        <div style="text-align: right;">        
                <!-- MyCounter v.2.0 -->
        <script type="text/javascript"><!--
        my_id = 121530;
        my_width = 88;
        my_height = 51;
        my_alt = "MyCounter - счётчик и статистика";
        //--></script>
        <script type="text/javascript"
          src="http://scripts.mycounter.ua/counter2.0.js">
        </script><noscript>
        <a target="_blank" href="http://mycounter.ua/"><img
        src="http://get.mycounter.ua/counter.php?id=121530"
        title="MyCounter - счётчик и статистика"
        alt="MyCounter - счётчик и статистика"
        width="88" height="51" border="0" /></a></noscript>
        <!--/ MyCounter -->
        <!-- I.UA counter --><a href="http://www.i.ua/" target="_blank" onclick="this.href='http://i.ua/r.php?147154';" title="Rated by I.UA">
<script type="text/javascript" language="javascript"><!--
iS='<img src="http://r.i.ua/s?u147154&p261&n'+Math.random();
iD=document;if(!iD.cookie)iD.cookie="b=b; path=/";if(iD.cookie)iS+='&c1';
iS+='&d'+(screen.colorDepth?screen.colorDepth:screen.pixelDepth)
+"&w"+screen.width+'&h'+screen.height;
iT=iD.referrer.slice(7);iH=window.location.href.slice(7);
((iI=iT.indexOf('/'))!=-1)?(iT=iT.substring(0,iI)):(iI=iT.length);
if(iT!=iH.substring(0,iI))iS+='&f'+escape(iD.referrer.slice(7));
iS+='&r'+escape(iH);
iD.write(iS+'" border="0" width="88" height="19" />');
//--></script></a><!-- End of I.UA counter -->

<!-- analitik -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36200356-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

        </div>

    </footer>
    <br />