<style>
.error_input {
    border: 1px solid red !important;
}
.error_input_chek {
    color: red;
}
.valid {
    outline: none;
    border: 1px solid black;
}
</style>
<div class="main">
    <div class="container_24">
        <div id="show_page">
            <!-- -->
    <? if(!empty($svazi)  || !empty($svazi_mat)) {?>
    <article class="grid_6 suffix_2">
        <h3 style="text-align: center; margin-left: 90px;">Розділи</h3>
        <ul class="list-1" style="width: 290px;">
        <? foreach($svazi as $svaz){?>
            <li style="margin-left: 18px;"><a href="/cat/<?=$svaz['svaz_cat_id'];?>"><span><? $cat = Model::factory('cat')->get_cat($svaz['svaz_cat_id']); echo $cat['cat_title'];?></span></a></li>
        <?}?>
        <? foreach($svazi_mat as $svaz_mat){?>
            <li style="margin-left: 18px;"><a href="/material/<?=$svaz_mat['mat_id'];?>"><span><? $mat = Model::factory('material')->get_material($svaz_mat['mat_id']); echo $mat['material_title'];?></span></a></li>
        <?}?>
        </ul>
    </article>
    <?}?>
    <!-- -->
            <h2><?php echo $page['page_title'];?></h2>
            <div class="show_page_text">
            <?php echo $page['page_text'];?>
            <div class="publ_info" style="width: 620px; float: right;">
                <p style="text-align: center;">Запит на інформацію</p>
                <form class="zver_form" action="/user/add_publ_info" method="POST" style="width: 90%;">
                    <label>П.І.Б. *:<br />
                    <input type="text" name="zver_pib" class="valid" />
                    </label>
                    <br />
                    <label>Поштова адреса *:<br />
                    <input type="text" name="zver_adress" class="valid"/>
                    </label>
                    <br />
                    <label>Телефон *:<br />
                    <input type="text" name="zver_tel" class="valid" />
                    </label>
                    <br />
                    <label>Електронна адреса *:<br />
                    <input type="text" name="zver_email" class="valid"/>
                    </label>
                    <br />Текст звернення *:<br />
                    <textarea style="height: 50px;" name="zver_text" class="valid"></textarea>
                    <p>Відповідно до ст. 11 Закону України «Про захист персональних даних» надаю згоду на обробку
                        та використання моїх персональних даних для здійснення повноважень, пов’язаних із розглядом даного запиту:</p>
                    <p class="check"><input type="checkbox" class="check_input" value="1" style="text-align: left; margin: 3px 0 0 0; width: 15px;" /> Згоден</p>
                    <div>
                        Прошу надати мені відповідь:<br /><br />
                        <span><input style="width: 13px;" type="radio" name="vidpov"  value="pochta" />Поштою</span>
                        &nbsp;<span><input type="radio" name="vidpov" style="width: 13px;" value="fax" />Факсом</span>
                        &nbsp;<span><input type="radio" name="vidpov" style="width: 13px;" value="email" checked="checked"/>Електронною поштою</span>
                    </div>
                    <br />
                    
                    <button>Зберегти</button><button>Скасувати</button>
                </form>
                </div>
                <div class="clear"></div>
                <br />
                
            </div>
        </div>
        <div class="clear"></div>
    </div>
    
               
</div>
<script type="text/javascript">
setInterval(Validation, 1000);

$('.zver_form').submit(function(){
    var Puhh = [];
    $('.error_input').each(function(){
        Puhh.push(1);
    })
    if(Puhh.length > 0){
        return false;
    }
})
function Validation(){
    $('.valid').each(function(){
        $(this).removeClass('error_input');
        if($(this).val().length <= 3){
            $(this).addClass('error_input');
        }
    })
    //alert($('.check:checked').val());
    var Ch = $('.check_input:checked').val();
    var Ch_par = $('.check');
    if(Ch === undefined){
        //$(this).
        Ch_par.addClass('error_input_chek');
    }else{
        Ch_par.removeClass('error_input_chek');
        //.addClass('error_input');
    }
}
</script>