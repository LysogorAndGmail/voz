<style>
.top-box,.top-box_new {
    padding: 0 3px 0px 0;
}
#top-content {
position: relative;
z-index: 5;
padding: 65px 0 2px 0;
background: url(../images/top-content-tail.gif) repeat-x;
background: #fff;
margin-top: 3px;
}
.cou_bor {
    position: absolute;
    text-align: center;
    font-weight: normal;
    margin-left: 10px;
    background-image: url(/images/notification_counter.png);
    height: 16px;
    width: 25px;
    line-height: 15px;
    font-size: 11px;
    text-decoration: none;
    color: #fff;
}
.text_bord {
    color:black;
}
.text_bord p{
    margin: 0;
    font-size: 14px;
}
</style>

<section id="top-content">
    	<div class="main">
        	<div class="inner">
                <div class="col-1">
                	<div class="top-box">
                    	<div class="box-1">
                            <a href="/board/nedvig">
                                <img src="/images/bord_1.jpg" width="136" height="102" />
                            </a>
                            <h3>
                                <strong style="font-size: 20px;"><a href="/board/nedvig">Нерухомість</a><span class="cou_bor"><? $cou = DB::select()->from('bord')->where('cat','=','nedvig')->and_where('activ','=',1)->execute()->as_array(); echo count($cou);?></span>
                                </strong>
                            </h3>
                        </div>
                    </div>	
                </div>
                <div class="col-2">
                	<div class="top-box">
                    	<div class="box-1">
                            <a href="/board/trans">
                                <img src="/images/bord_2.jpg" width="136" height="102" />
                            </a>
                            <h3>
                                <strong style="font-size: 20px;"><a href="/board/trans">Транспорт</a><span class="cou_bor"><? $cou = DB::select()->from('bord')->where('cat','=','trans')->and_where('activ','=',1)->execute()->as_array(); echo count($cou);?></span></strong>
                            </h3>
                        </div>
                    </div>	
                </div>
                <div class="col-3">
                	<div class="top-box">
                    	<div class="box-1">
                            <a href="/board/rabota">
                                <img src="/images/bord_3.jpg" width="136" height="102" />
                            </a>
                            <h3>
                                <strong style="font-size: 20px;"><a href="/board/rabota">Робота</a><span class="cou_bor"><? $cou = DB::select()->from('bord')->where('cat','=','rabota')->and_where('activ','=',1)->execute()->as_array(); echo count($cou);?></span></strong>
                            </h3>
                        </div>
                    </div>	
                </div>
                
                <div class="col-4">
                	<div class="top-box_new">
                    	<div class="box-1">
                            <a href="/board/elek">
                                <img src="/images/bord_4.jpg" width="136" height="102" />
                            </a>
                            <h3>
                                <strong style="font-size: 20px;"><a href="/board/elek">Електроніка</a><span class="cou_bor"><? $cou = DB::select()->from('bord')->where('cat','=','elek')->and_where('activ','=',1)->execute()->as_array(); echo count($cou);?></span></strong>
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
                            <a href="/board/biznes">
                               <img src="/images/bord_5.jpg" width="136" height="102" />
                            </a>
                            <h3>
                                <strong style="font-size: 20px;"><a href="/board/biznes">Бізнес та послуги</a><span class="cou_bor"><? $cou = DB::select()->from('bord')->where('cat','=','biznes')->and_where('activ','=',1)->execute()->as_array(); echo count($cou);?></span></strong>
                            </h3>
                            
                        </div>
                    </div>	
                </div>
                <div class="col-2">
                	<div class="top-box">
                    	<div class="box-1">
                            <a href="/board/mir">
                               <img src="/images/bord_6.jpg" width="136" height="102" />
                            </a>
                            <h3>
                                <strong style="font-size: 20px;"><a href="/board/mir">Дитячий світ</a><span class="cou_bor"><? $cou = DB::select()->from('bord')->where('cat','=','mir')->and_where('activ','=',1)->execute()->as_array(); echo count($cou);?></span></strong>
                            </h3>
                            
                        </div>
                    </div>	
                </div>
                
                <div class="col-3">
                	<div class="top-box_new">
                    	<div class="box-1">
                            <a href="/board/sad">
                                <img src="/images/bord_7.jpg" width="136" height="102"/>
                            </a>
                            <h3>
                                <strong style="font-size: 20px;"><a href="/board/sad">Дім і сад</a><span class="cou_bor"><? $cou = DB::select()->from('bord')->where('cat','=','sad')->and_where('activ','=',1)->execute()->as_array(); echo count($cou);?></span></strong>
                            </h3>
                            
                        </div>
                    </div>	
                </div>
                <div class="col-4">
                	<div class="top-box_new">
                    	<div class="box-1">
                            <a href="/board/giv">
                                <img src="/images/bord_8.jpg" width="136" height="102" />
                            </a>
                            <h3>
                                <strong style="font-size: 20px;"><a href="/board/giv">Тварини</a><span class="cou_bor"><? $cou = DB::select()->from('bord')->where('cat','=','giv')->and_where('activ','=',1)->execute()->as_array(); echo count($cou);?></span></strong>
                            </h3>
                            
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
                            <a href="/board/moda">
                                <img src="/images/bord_9.jpg" width="136" height="102"/>
                            </a>
                            <h3>
                                <strong style="font-size: 20px;"><a href="/board/moda">Мода і стиль</a><span class="cou_bor"><? $cou = DB::select()->from('bord')->where('cat','=','moda')->and_where('activ','=',1)->execute()->as_array(); echo count($cou);?></span></strong>
                            </h3>
                        </div>
                    </div>	
                </div>
                <div class="col-2">
                	<div class="top-box_new_black">
                    	<div class="box-1">
                            <a href="/board/sport">
                                <img src="/images/bord_10.jpg" width="136" height="102" />
                            </a>
                            <h3>
                                <strong style="font-size: 20px;"><a href="/board/sport">Хобі, відпочинок і спорт</a><span class="cou_bor"><? $cou = DB::select()->from('bord')->where('cat','=','sport')->and_where('activ','=',1)->execute()->as_array(); echo count($cou);?></span></strong>
                            </h3>
                        </div>
                    </div>	
                </div>
                <div class="col-3">
                	<div class="top-box_new_black">
                    	<div class="box-1">
                            <a href="/board/obmin">
                               <img src="/images/bord_11.jpg" width="136" height="102" />
                            </a>
                            <h3>
                                <strong style="font-size: 20px;"><a href="/board/obmin">Обмін</a><span class="cou_bor"><? $cou = DB::select()->from('bord')->where('cat','=','obmin')->and_where('activ','=',1)->execute()->as_array(); echo count($cou);?></span></strong>
                            </h3>
                        </div>
                    </div>	
                </div>
                <div class="col-4">
                	<div class="top-box_new_black">
                    	<div class="box-1">
                            <a href="/board/viddam">
                                <img src="/images/bord_12.jpg" width="136" height="102" />
                            </a>
                            <h3>
                                <strong style="font-size: 20px;"><a href="/board/viddam">Віддам</a><span class="cou_bor"><? $cou = DB::select()->from('bord')->where('cat','=','viddam')->and_where('activ','=',1)->execute()->as_array(); echo count($cou);?></span></strong>
                            </h3>
                        </div>
                    </div>	
                </div>
                
            </div>
            <!-- -->
            <div class="text_bord">
<p style="text-align: center; font-style: italic; font-weight: bold;">Нова послуга інформаційного інтернет-порталу міста Вознесенська</p>
<p style="text-align: center;">Розмістити оголошення самостійно, швидко і  безкоштовно  в мережі інтернет.</p>
<p>Ви в будь-який зручний для Вас час можете швидко розмістити будь-яке оголошення
    на дошці безкоштовних оголошень «Оголошення» на інформаційному порталі міста Вознесенська (http://voznesensk.org/board) </p>
<p>Дошка безкоштовних оголошень дозволить вам швидко і ефективно купити, продати, обміняти або рекламувати свої послуги.</p> 
<p>Перший крок -  зареєструватись на інформаційному інтернет порталі  voznesensk.org </p>
<p>Другий крок - додавати, редагувати і видаляти свої оголошення.</p>
<p>Подати безкоштовне оголошення дуже просто - потрібно набрати текст оголошення, заголовок, додати свої контактні дані і натиснути кнопку «Додати оголошення».</p>
<p>Модератори сайту щодня переглядають оголошення на відповідність тематичного розділу і редагують їх. Тільки після  ознайомлення модератора з текстом оголошення  - воно буде оприлюднене в мережі.</p>
<p>Чим зручна наша послуга?  Ви економите час, нерви та кошти. І користуєтесь сучасними інформаційними технологіями.У наш час все більше і більше людей користуються послугами інтернету, тому результат послідує негайно. </p>
<p>На дошці оголошень  передбачено окремі рубрики. Тут ви можете подати оголошення, пов'язані з нерухомістю, автомобілями, пошуком роботи, продажем і придбанням різних товарів, подорожжю, відпочинком, послугами, розвагами та іншими. Для більшої інформації  Ви можете додати до оголошення фотографії .</p>
<p>Приватні особи, підприємства, державні структури можуть бути нашими користувачами і тому додавши своє оголошення Ви збільшуєте свої шанси на те, щоб вдало продати, купити або запропонувати свої послуги потенційному клієнту. </p>
<p>Запрошуємо до  безкоштовної дошки оголошення !</p>
            </div>
            
            
        </div>
    </section>
</div>
    </div>
<script type="text/javascript">
    $('.box-1').hover(function(){
        $(this).find('.nav_pag').show();
    },function(){
        $(this).find('.nav_pag').hide();
    })
</script>