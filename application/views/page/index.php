
<style>
.ajax_pagin span {
    width: 8%;
    margin: 0 1%;
    float: left;
    cursor: pointer;
    text-align: center;
    border-radius: 10px;
}
.ajax_pagin span:hover {
    color: red;
    box-shadow: 0 0 10px red;
}
.sel_pag {
    color: red;
    box-shadow: 0 0 10px red;
}
.text-box-1 p {
    padding: 0 !important;
}
.text-box-1 span {
    float: right;
    color:#000;
    font-weight: bold;

}
</style>
<div class="main">
            <p style="margin-top: -140px;">&nbsp;</p>
        	<div class="container_24">
                <article class="grid_6 suffix_2">
                    <h3 class="smoll_p">Розділи сайту</h3>
                    <ul class="list-1">
                    <? foreach($all_admin_cat as $admin_cat) {?>
                        <li><a href="<?php echo Kohana::$base_url."cat/".$admin_cat['cat_id'];?>"><span><?php echo $admin_cat['cat_title'];?></span></a></li>
                        <?}?>
                    </ul>
                    
                    <h3 class="smoll_p">Установи міста</h3>
                    <ul class="list-1">
                        <? foreach($all_moderators_cats as $admin_cat) {?>
                        <li><a href="<?php echo Kohana::$base_url."moderator_cat/".$admin_cat['moderator_cat_id'];?>"><span><?php echo $admin_cat['moderator_cat_title'];?></span></a></li>
                        <?}?>
                    </ul>
                   <!--<a href="#" class="link-1">Всі категорії</a> -->
                    
                    <h3 class="smoll_p">Опитування</h3>
                    <ul class="list-1 ul_vote">
                        <? $res = DB::select()->from('vote')->where('status','=',1)->execute()->as_array(); foreach($res as $vote){?>
                            <p><?=$vote['vote_title'];?></p>
                            <ul class="vote_label">
                                <? $i=1; $res2 = DB::select()->from('vote_label')->where('vote_id','=',$vote['vote_id'])->execute()->as_array(); foreach($res2 as $label){?>
                                    <li><input type="radio" name="vote" value="<?=$label['id'];?>"/><?=$label['text'];?></li>
                                <? $i++;}?>
                            </ul>
                            <br /><button id="vote_button" class="index_button">Проголосувати</button><br />
                            <button class="show_vote_results">Переглянути результати</button><span class="vote_id" style="display: none;"><?=$vote['vote_id'];?></span>
                        <?}?>
                    </ul>
                           
                   
                   <h3 class="smoll_p">Нормативні акти</h3>
                    <ul class="list-1" style="position: relative;">
                    <li class="arch"><a><span>Проекти рішень міської ради</span></a></li>
                        <div class="mon_arch">
                            <?  $data_new4 = array(); foreach($all_docs_4 as $doc4) {
                            $data_new4[Date('Y',strtotime($doc4['doc_date']))][Date('m',strtotime($doc4['doc_date']))] = $doc4;
                        } foreach($data_new4 as $arhiv4=>$man4) {?>
                            <p><a href="/resurse/docs?type=4&year=<?php echo $arhiv4;?>" class="link-1"><span><?php echo $arhiv4;?></span></a></p>
                        <?} ?>
                        </div>
                    <li class="arch"><a><span>Рішення міської ради</span></a></li>
                        <div class="mon_arch">
                            <? $data_new1 = array(); foreach($all_docs_1 as $doc1) {
                            $data_new1[Date('Y',strtotime($doc1['doc_date']))][Date('m',strtotime($doc1['doc_date']))] = $doc1;
                        } foreach($data_new1 as $arhiv1=>$man1) {?>
                            <p><a href="/resurse/docs?type=1&year=<?php echo $arhiv1;?>" class="link-1"><span><?php echo $arhiv1;?></span></a></p>
                        <?} ?>
                        </div>
                    <li class="arch"><a><span>Рішення виконавчого комітету</span></a></li>
                        <div class="mon_arch">
                            <? $data_new2 = array(); foreach($all_docs_2 as $doc2) {
                            $data_new2[Date('Y',strtotime($doc2['doc_date']))][Date('m',strtotime($doc2['doc_date']))] = $doc2;
                        } foreach($data_new2 as $arhiv2=>$man2) {?>
                            <p><a href="/resurse/docs?type=2&year=<?php echo $arhiv2;?>" class="link-1"><span><?php echo $arhiv2;?></span></a></p>
                        <?} ?>
                        </div>
                    <li class="arch"><a><span>Розпорядження міського голови</span></a></li>
                        <div class="mon_arch">
                            <? $data_new3 = array(); foreach($all_docs_3 as $doc3) {
                            $data_new3[Date('Y',strtotime($doc3['doc_date']))][Date('m',strtotime($doc3['doc_date']))] = $doc3;
                        } foreach($data_new3 as $arhiv3=>$man3) {?>
                            <p><a href="/resurse/docs?type=3&year=<?php echo $arhiv3;?>" class="link-1"><span><?php echo $arhiv3;?></span></a></p>
                        <?} ?>
                        </div>
                        
                    </ul>
                    
                    <button class="index_button" onclick="location='/resurse/old_docs';">2006-2013 р.</button>
                    <br />
                    <button class="index_button" onclick="location='/search/archive';">Пошук по архіву</button>
                    
                </article>
                
                <article class="grid_16">
                    <h3 class="hp-1" id="top_pag" style="padding-bottom: 6px !important;">Останні новини</h3>
                    <div class="ajax_news">
                        <? $i=1; foreach($last_mat as $mat) { //print_r($mat);ho_insert moderator
                             if($i==3){$i = 0;}?>
                            <div class="padding-1" style="width: 30%; float: left; margin: 10px;">
                                <? if(empty($mat['mod_id'])){?>
                                    <a href="<?echo 'material/'.$mat['material_id'];?>">
                                <?if(!empty($mat['material_img'])){?>
                                    <img src="<?=Kohana::$base_url;?>material_images/<?echo $mat['material_img'];?>" alt="" width="" height="" style="width: 100% !important; height: auto !important;" class="img-indent"/>
                                <?}else {?>
                                    <img src="<?=Kohana::$base_url;?>material_images/no_foto_mat.jpg" alt="" style="width: 100% !important;" class="img-indent"/>
                                <?}?>
                                    </a>
                                <?}else{ ?>
                                    <a href="<?echo 'material/'.$mat['material_id'];?>">
                                        <img src="<?=Kohana::$base_url;?>moderator_icons/<? echo $mat['mod_id'].'.jpg';?>" alt="" width="" height="" style="width: 100% !important;  height: auto !important;" class="img-indent"/>
                                    </a>
                                <?}?>
                                <span style="position: relative; top: -20px; color: black; left: 10px;"><?echo date('d.m.Y',strtotime($mat['material_date']));?></span>
                                <div class="text-box-1" style="width:100% !important; margin-top: -28px;">
                                    <p style="text-align: center;"><a href="<?echo 'material/'.$mat['material_id'];?>"><?echo $mat['material_title'];?></a></p>
                                </div>
                            </div>
                            <?if($i==0){?>
                            <div class="clearfix">&nbsp;</div>    
                            <?}?>
                        <?  $i++; }?>
                    </div>
                    <div class="ajax_pagin">
                        <? foreach($pag as $p){?>
                            <span><?=$p;?></span>
                        <?}?>
                    </div>
                </article>
                <div class="clear"></div>
            </div>
		</div>
<script type="text/javascript">
    $('.ajax_pagin span').click(function(){
        var Pag = $(this).text();
        var Blo = $('.ajax_news');
        $('.sel_pag').each(function(){
            $(this).removeClass('sel_pag');
        })
        $(this).addClass('sel_pag');
        $.ajax({
            type: "POST",
            url: "/resurse/ajax_pag",
            data: {page:Pag},
            async: false,
            success: function(data) {
                Blo.html(data);
                location="/#top_pag";
            },
            error:function(code, opt, err){
                alert("Состояние : " + opt + "\nКод ошибки : " + code.status + "\nОшибка : " + err);
            }
       });
    })
</script>