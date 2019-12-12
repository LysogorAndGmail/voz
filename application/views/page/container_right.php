	<div class="top-bg grgr">
        	<div class="main">
            	<div class="container_24">
                    <div class="border-col-1">
                        <div class="border-col-2">
                            <div class="border-col-3">
                                <div class="border-col-4">
                                    <article class="grid_5 suffix_1">
                                        <h3>Довідкова <br />інформація</h3>
                                        <ul class="list-2">
                                            <? $res = DB::select()->from('footer_menu')->where('blok_id','=',1)->execute()->as_array(); foreach($res as $menu){?>
                                            <li><a href="<?=$menu['menu_link'];?>"><?=$menu['menu_title'];?></a></li>
                                            <?}?>
                                        </ul>
                                    </article>
                                    <article class="grid_5 suffix_1">
                                        <h3>Міста <br /> партнери</h3>
                                        <ul class="list-2">
                                            <? $res = DB::select()->from('footer_menu')->where('blok_id','=',2)->execute()->as_array(); foreach($res as $menu){?>
                                            <li><a href="<?=$menu['menu_link'];?>"><?=$menu['menu_title'];?></a></li>
                                            <?}?>                                        
                                        </ul>
                                    </article>
                                    <article class="grid_5 suffix_1">
                                        <h3>Центральні органи влади</h3>
                                        <ul class="list-2">
                                            <? $res = DB::select()->from('footer_menu')->where('blok_id','=',3)->execute()->as_array(); foreach($res as $menu){?>
                                            <li><a href="<?=$menu['menu_link'];?>"><?=$menu['menu_title'];?></a></li>
                                            <?}?>                                        
                                        </ul>
                                    </article>
                                    <article class="grid_5 suffix_1">
                                        <h3>Регіональні органи влади</h3>
                                        <ul class="list-2">
                                            <? $res = DB::select()->from('footer_menu')->where('blok_id','=',4)->execute()->as_array(); foreach($res as $menu){?>
                                            <li><a href="<?=$menu['menu_link'];?>"><?=$menu['menu_title'];?></a></li>
                                            <?}?>
                                         </ul>
                                    </article>
                                    <article class="grid_5 suffix_1">
                                        <h3>Радимо<br /> відвідати</h3>
                                        <ul class="list-2">
                                            <? $res = DB::select()->from('footer_menu')->where('blok_id','=',5)->execute()->as_array(); foreach($res as $menu){?>
                                            <li><a href="<?=$menu['menu_link'];?>"><?=$menu['menu_title'];?></a></li>
                                            <?}?>
                                         </ul>
                                    </article>
                                </div>
                			</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
