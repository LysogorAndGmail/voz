<div id="slideshow-box">
            	<div id="slideshow" style="position: relative; width: 940px; height: 180px; overflow: hidden;">
                    <div class="slider-item" style="position: absolute; top: 0px; left: -940px; display: none; z-index: 3; opacity: 1; width: 940px; height: 170px;">
                        <strong>Вітаємо відвідувачів інформаційного інтернет-порталу</strong>
                        <strong class="extra">міста Вознесенська</strong>
                        <strong class="extra">Сподіваємося, що Ви знайдете для себе корисну інформацію</strong>
                    </div>
                    <div class="slider-item" style="position: absolute; top: 0px; left: -940px; display: none; z-index: 3; opacity: 1; width: 940px; height: 170px;">
                        <strong>Девіз міста Вознесенська</strong>
                        <strong class="extra">"Єднання зусиль громади для процвітання міста"</strong>
                    </div>
                    <div class="slider-item" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 4; opacity: 1; width: 940px; height: 170px;">
                        <strong>Будемо вдячні за Ваші пропозиції Щодо покращення нашого інтернет-порталу</strong>
                        <strong class="extra">Залишайте свої <a href="/user/user_regist" style="color: #b61b1f; border-bottom: 1px solid #b61b1f; text-decoration: none;">коментарі</a></strong>
                    </div>
            	</div>
                <!--<div class="navigation">
                    <ul id="nav">
                        <li class="">
                            <a href="#">1</a>
                        </li>
                        <li class="">
                            <a href="#">2</a>
                        </li>
                            <li class="activeSlide">
                        <a href="#">3</a>
                        </li>
                    </ul>
                </div>-->

            </div>
            
            
            <section id="top-content">
            	<div class="main">
                	<div class="inner">
                    	<div class="col-1">
                        	<div class="top-box">
                            	<div class="box-1">
                                    <a href="/page/vlada">
                                       <img src="/images/meria.jpg" width="136" height="102" />
                                    </a>
                                    <h3>
                                        <strong style="font-size: 20px;"><a href="/page/vlada">Міська влада</a></strong>
                                    </h3>
                                    <ul class="nav_pag">
                                    <? $vlada_menu = DB::select()->from('svazi')->where('svaz_page_id','=',7)->execute()->as_array(); foreach($vlada_menu as $v){ ?>
                                        <li style="margin-left: 18px;"><a href="/cat/<?=$v['svaz_cat_id'];?>"><span><? $cat = Model::factory('cat')->get_cat($v['svaz_cat_id']); echo $cat['cat_title'];?></span></a></li>
                                    <?}?>
                                    </ul>
                                </div>
                            </div>	
                        </div>
                        <div class="col-2">
                        	<div class="top-box">
                            	<div class="box-1">
                                    <a href="/deputat">
                                        <img src="/images/znachk_deputat.jpg" width="136" height="102" />
                                    </a>
                                    <h3>
                                        <strong style="font-size: 20px; margin-top: 40px;"><a href="/deputat">Ваш депутат</a></strong>
                                    </h3>
                                </div>
                            </div>	
                        </div>
                        <div class="col-3">
                        	<div class="top-box">
                            	<div class="box-1">
                                    <a href="/page/poslugi">
                                        <img src="/images/uslugi.jpg" width="136" height="102" />
                                    </a>
                                    <h3>
                                        <strong style="font-size: 20px;"><a href="/page/poslugi">Послуги міста</a></strong>
                                    </h3>
                                    <ul class="nav_pag">
                                    <? $vlada_menu = DB::select()->from('svazi')->where('svaz_page_id','=',8)->execute()->as_array(); foreach($vlada_menu as $v){ ?>
                                        <li style="margin-left: 18px;"><a href="/cat/<?=$v['svaz_cat_id'];?>"><span><? $cat = Model::factory('cat')->get_cat($v['svaz_cat_id']); echo $cat['cat_title'];?></span></a></li>
                                    <?}?>
                                    </ul>
                                </div>
                            </div>	
                        </div>
                        <div class="col-4">
                        	<div class="top-box">
                            	<div class="box-1">
                                    <a href="/resurse/karta_voznesenska">
                                        <img src="/images/icon_index_1.jpg" width="136" height="102" />
                                    </a>
                                    <h3>
                                        <strong style="font-size: 20px;"><a href="/resurse/karta_voznesenska">Карта Вознесенська</a></strong>
                                    </h3>
                                </div>
                            </div>	
                        </div>
                    </div>
                    <!-- -->
                    <div class="inner">
                    	<div class="col-1">
                        	<div class="top-box_new">
                            	<div class="box-1">
                                    <a href="/page/ohoronzdodor">
                                        <img src="/images/ohor.jpg" width="136" height="102" />
                                    </a>
                                    <h3>
                                        <strong style="font-size: 20px;"><a href="/page/ohoronzdodor">Охорона здоров’я</a></strong>
                                    </h3>
                                    <ul class="nav_pag">
                                    <? $vlada_menu = DB::select()->from('svazi')->where('svaz_page_id','=',38)->execute()->as_array(); foreach($vlada_menu as $v){ ?>
                                        <li style="margin-left: 18px;"><a href="/cat/<?=$v['svaz_cat_id'];?>"><span><? $cat = Model::factory('cat')->get_cat($v['svaz_cat_id']); echo $cat['cat_title'];?></span></a></li>
                                    <?}?>
                                    </ul>
                                </div>
                            </div>	
                        </div>
                        <div class="col-2">
                        	<div class="top-box_new">
                            	<div class="box-1">
                                    <a href="/page/soc">
                                        <img src="/images/soc_zah.jpg" width="136" height="102"/>
                                    </a>
                                    <h3>
                                        <strong style="font-size: 20px;"><a href="/page/soc">Соціальний захист</a></strong>
                                    </h3>
                                    <ul class="nav_pag" style="top: 206px;">
                                    <?  $vlada_menu = DB::select()->from('moderator_cats')->where('parent_cat','=',16)->execute()->as_array(); foreach($vlada_menu as $v){ ?>
                                        <li style="margin-left: 18px;"><a href="/moderator_cat/<?=$v['moderator_cat_id'];?>"><span><? echo $v['moderator_cat_title'];?></span></a></li>
                                    <?}?>
                                    </ul>
                                </div>
                            </div>	
                        </div>
                        <div class="col-3">
                        	<div class="top-box_new">
                            	<div class="box-1">
                                    <a href="/page/sport">
                                        <img src="/images/sport.jpg" width="136" height="102" />
                                    </a>
                                    <h3>
                                        <strong style="font-size: 20px;"><a href="/page/sport">Молодь, культура, спорт</a></strong>
                                    </h3>
                                    <ul class="nav_pag" style="top: 230px;">
                                    <? $vlada_menu = DB::select()->from('svazi')->where('svaz_page_id','=',21)->execute()->as_array(); foreach($vlada_menu as $v){ ?>
                                        <li style="margin-left: 18px;"><a href="/cat/<?=$v['svaz_cat_id'];?>"><span><? $cat = Model::factory('cat')->get_cat($v['svaz_cat_id']); echo $cat['cat_title'];?></span></a></li>
                                    <?}?>
                                    </ul>
                                </div>
                            </div>	
                        </div>
                        <div class="col-4">
                        	<div class="top-box_new">
                            	<div class="box-1">
                                    <a href="/cat/251">
                                       <img src="/images/osvita.jpg" width="136" height="102" />
                                    </a>
                                    <h3>
                                        <strong style="font-size: 20px;"><a href="/cat/251">Освіта</a></strong>
                                    </h3>
                                    <ul class="nav_pag" style="top: 200px;">
                                    <? $os_cats = DB::select()->from('cats')->where('parent_id','=',251)->execute()->as_array(); foreach($os_cats as $v){ ?>
                                        <li style="margin-left: 18px;"><a href="/cat/<?=$v['cat_id'];?>"><span><? echo $v['cat_title'];?></span></a></li>
                                    <?}?>
                                    </ul>
                                </div>
                            </div>	
                        </div>
                    </div>
                    <!-- -->
                    <!-- -->
                    <div class="inner">
                    	<div class="col-1">
                        	<div class="top-box_new_black">
                            	<div class="box-1">
                                    <a href="/blogs">
                                        <img src="/images/blog.jpg" width="136" height="102"/>
                                    </a>
                                    <h3>
                                        <strong style="font-size: 20px;"><a href="/blogs">Блоги міського голови та його заступників</a></strong>
                                    </h3>
                                </div>
                            </div>	
                        </div>
                        <div class="col-2">
                        	<div class="top-box_new_black">
                            	<div class="box-1">
                                    <a href="/page/jutlovo_komynal_gospodar">
                                        <img src="/images/jkh.jpg" width="136" height="102" />
                                    </a>
                                    <h3>
                                        <strong style="font-size: 20px;"><a href="/page/jutlovo_komynal_gospodar">Житлово-комунальне господарство</a></strong>
                                    </h3>
                                </div>
                            </div>	
                        </div>
                        <div class="col-3">
                        	<div class="top-box_new_black">
                            	<div class="box-1">
                                    <a href="/page/zmi">
                                        <img src="/images/afisha.jpg" width="136" height="102" />
                                    </a>
                                    <h3>
                                        <strong style="font-size: 20px;"><a href="/page/zmi">Засоби масової інформації міста</a></strong>
                                    </h3>
                                </div>
                            </div>	
                        </div>
                        <div class="col-4">
                        	<div class="top-box_new_black">
                            	<div class="box-1">
                                    <a href="/resurse/galery_folders">
                                       <img src="/images/foto-galerry.jpg" width="136" height="102" />
                                    </a>
                                    <h3>
                                        <strong style="font-size: 20px;"><a href="/resurse/galery_folders">Фото-галерея</a></strong>
                                    </h3>
                                </div>
                            </div>	
                        </div>
                    </div>
                    <!-- -->
                </div>
            </section>
            <a href="http://www.vpo.gov.ua" style="width: 720px; height:90px; display: block; margin:auto; margin-top: -70px; cursor: pointer; z-index:999999; position: relative;"><img src="<?=Kohana::$base_url?>images/Migrants_UA_RU_720x90.gif" width="720" height="90"/></a>
        </div>
    </div>
<script type="text/javascript">
    $('.box-1').hover(function(){
        $(this).find('.nav_pag').show();
    },function(){
        $(this).find('.nav_pag').hide();
    })
</script>