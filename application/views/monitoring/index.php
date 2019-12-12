<style>
.align_left p {
    text-align: left;
    padding-left: 20px;
}
.align_left p input {
    width: 818px;
}
.align_left p select {
    width: 809px;
}
.align_left p.lef {
    width: 46%;
    float: left;
}
.align_left p.lef input{
    width: 80%;
    float: right;
}
</style>
<? $monitoring_users = Session::instance()->get('monitor_user');?>
<form method="POST" class="mess_form">
    <article style="width: 900px !important; margin: 0 auto;" >
        <div class="indent-left">
            <h1 style="text-align: center;"><?//=print_r($monitoring_users);?></h1>        
        </div>
        <div>
            <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
                <tr>
                    <td colspan="4">Реэстрація</td>
                </tr>
                <tr>
                    <td style="width: 25%;">№</td>
                    <td style="width: 25%; color: red;"><?=$last_id;?></td>
                    <td style="width: 25%;">Дата, час</td>
                    <td style="width: 25%;"><input type="hidden" name="zayava_date" value="<?=date('Y-m-d H:i:s')?>" /><?=date('d.m.Y H:i:s')?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Організація</td>
                    <td style="width: 25%;">Едина диспечерска</td>
                    <td style="width: 25%;">Зареестрував</td>
                    <td style="width: 25%;"><input type="hidden" name="dispetcher" value="<?=$monitoring_users['name'].' '.$monitoring_users['soname'];?>" /><?=$monitoring_users['name'].' '.$monitoring_users['soname'];?></td>
                </tr>
                <tr>
                    <td colspan="4">Інформація про заявника</td>
                </tr>
                <tr>
                    <td colspan="4" class="align_left">
                        <br />
                        <p>П.І.Б <input type="text" width="80%" name="zayava_name" /></p>
                        <p>Вулиця 
                            <select name="strit">
                                <?php if (($handle = fopen("street.csv", "r")) !== FALSE) { // перебор временных зон
                                        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                                        $num = count($data); ?>
                                        <option  value="<?=$data[0]?>"><?=$data[0]?></option>
                                        <? }
                                        fclose($handle);
                                        }
                                    ?>
                            </select>
                        </p>
                        <p>Провулок 
                            <select name="prov" style="width: 90%;">
                                <?php if (($handle = fopen("prov.csv", "r")) !== FALSE) { // перебор временных зон
                                        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                                        $num = count($data); ?>
                                        <option  value="<?=$data[0]?>"><?=$data[0]?></option>
                                        <? }
                                        fclose($handle);
                                        }
                                    ?>
                            </select>
                        </p>
                        <p class="lef">Будинок № <input type="text" width="80%" name="zayava_bud" /></p>
                        <p class="lef">Квартира № <input type="text" width="80%" name="zayava_kv" /></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <p>Опис проблеми</p>
                        <p>
                            <label style="float: left; margin-left: 20px;">Короткий зміст </label><textarea name="short" style="width: 80%; height: 200px;"></textarea>
                        </p>
                        <p>Комунальне підприемство, відповідальне за вирішення проблеми 
                            <select name="kom_pid" style="width: 300px;">
                                <option value="«САНІТАРНА ОЧИСТКА МІСТА»">«САНІТАРНА ОЧИСТКА МІСТА»</option>
                                <option value="«ВОДОПОСТАЧАННЯ м. ВОЗНЕСЕНСЬКА»">«ВОДОПОСТАЧАННЯ м. ВОЗНЕСЕНСЬКА»</option>
                                <option value="«ЄДНІСТЬ»">«ЄДНІСТЬ»</option>
                                <option value="«РЕГСПОД»">«РЕГСПОД»</option>
                                <option value="«БІОЛОГІЧНІ ОЧИСНІ СПОРУДИ»">«БІОЛОГІЧНІ ОЧИСНІ СПОРУДИ»</option>
                                <option value="«Миколаївобленерго»">«Миколаївобленерго»</option>
                                <option value="«Миколаївгаз»">«Миколаївгаз»</option>
                            </select>
                        </p>
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding: 20px;"><button>Направити на виконання</button></td>
                </tr>
            </table>
            
        </div>
    </article>
</form>
<script type="text/javascript">
    $('.mess_form').submit(function(){
        if (!confirm("Отправить?")) {
            return false;
        }
    })
</script>