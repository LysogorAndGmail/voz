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
            <h2><?php echo $page['page_title'];?></h2>
            <div class="show_page_text">
                <?php echo $page['page_text'];?>
                <div class="zver_form"  style="width: 600px; float: right; margin-top: 40px;">
                    <form action="/user/add_zvernenna" method="POST" class="zver_for">
                    <label>П.І.Б:<br />
                        <input type="text" name="zver_pib" class="valid" />
                    </label><br />
                    <label>Адреса:<br />
                        <input type="text" name="zver_adress" class="valid" />
                    </label><br />
                    <label>Email:<br />
                        <input type="text" name="zver_email" class="valid" />
                    </label><br />
                    <label>Телефон:<br />
                        <input type="text" name="zver_tel" class="valid" />
                    </label><br />
                    <label>Текст звернення:<br />
                        <textarea style="height: 50px;" name="zver_text" class="valid"></textarea>
                    </label><br /><br />
                    <div>
                        Прошу надати мені відповідь:<br /><br />
                        <span><input style="width: 13px;" type="radio" name="vidpov"  value="pochta" />Телефоном</span>
                        &nbsp;<span><input type="radio" name="vidpov" style="width: 13px;" value="email" checked="checked"/>Електронною поштою</span>
                    </div>
                    <br />
                    <input type="submit" value="Відправити" />
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

$('.zver_for').submit(function(){
    
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