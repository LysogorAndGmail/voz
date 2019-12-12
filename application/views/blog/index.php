<? $sesblog = Session::instance()->get('blogadmin');?>
<? if($sesblog['blog_id'] == 5){?>
        <h2 style="text-decoration: underline; text-align: center; color: black;">Електронний довідник</h2>
            <link rel="stylesheet" type="text/css" media="screen" href="<?echo Kohana::$base_url;?>css/testiframe.css">
            <div style="width: 1150px; margin:auto;">
            <ul id="css3menu5" class="topmenu" style="">
                <li class="toproot"><a><span><img src="/css/res/005.png"/>Фінансове управління</span></a>
                    <div class="submenu" style="width:444px;">
                        <div class="column" style="width:60%">
                            <ul>
                                <li><a><span><img src="/css/res/076.png"/>Бюджет</span></a>
                                    <div class="submenu">
                                        <div class="column">
                                            <ul>
                                                <li><a href="/dovidnik/fin_doh">Доходи</a></li>
                                                <li><a href="/dovidnik/fin_vit">Витрати</a></li>
                                                <li><a href="/dovidnik/fin_zal">Залишок на рахунку</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="/dovidnik/fin_kontrol"><span><img src="/css/res/076.png"/>Контроль платіжних доручень</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="toproot"><a><span><img src="/css/res/005.png"/>Управління соц. захисту</span></a>
                    <div class="submenu" style="width:313px;">
                        <div class="column" style="width:90%">
                            <ul>
                                <li><a href="/dovidnik/soc_zarplata"><span><img src="/css/res/076.png"/>Контроль за виплотою заробю плати</span></a></li>
                                <li><a href="/dovidnik/soc_peresel"><span><img src="/css/res/076.png"/>Робота з переселенцями</span></a></li>
                                <li><a href="/dovidnik/soc_likar"><span><img src="/css/res/076.png"/>Моніторінг роботи сім. лікарів</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="toproot"><a><span><img src="/css/res/005.png" />Асоціація "Центр"</span></a>
                    <div class="submenu" style="width:260px;">
                        <div class="column" style="width:100%">
                            <ul>
                                <li><a href="/dovidnik/senter"><span><img src="/css/res/076.png"/>Контроль за сплатою ком. послуг</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="toproot"><a><span><img src="/css/res/005.png"/>Управління ЖКХ та КБ</span></a>
                    <div class="submenu" style="width:260px;">
                        <div class="column" style="width:100%">
                            <ul>
                                <li><a href="#"><span><img src="/css/res/076.png"/>План виконання робіт на тиждень</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="toproot"><a><span><img src="/css/res/005.png"/>Управління ком власності</span></a>
                    <div class="submenu" style="width:348px;">
                        <div class="column" style="width:100%">
                            <ul>
                                <li><a href="/dovidnik/com_vlas_free"><span><img src="/css/res/076.png"/>Перелік зем. ділянок які не використовуваються</span></a></li>
                                <li><a href="/dovidnik/com_vlas_free_ne"><span><img src="/css/res/076.png"/>Перелік вільних зем. ділянок</span></a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </li>
            </ul>
            <p style="clear: both;">&nbsp;</p>
            
            <h2 style="text-decoration: underline; text-align: center; color: black;"><a href="/blogadmin/dispetcher">Едина диспечерска</a></h2>
            
        <?}?>   
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>
  <style>
  .ui-menu { width: 150px; }
  .column li a {
    cursor: pointer !important;
  }
  </style>
<? $sesblog = Session::instance()->get('blogadmin');?>
<article >
    <div class="indent-left">
        <h1 style="text-align: center;"><?=print_r($sesblog['blog_name']);?></h1>
    </div>
</article>

