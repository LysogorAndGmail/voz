
  <script>
  $(function() {
    $("#datepicker").datepicker({
monthNamesShort: [ "Янв", "Фев", "Мар", "Апр", "Май", "Июнь", "Июль", "Авгу", "Сент", "Окт", "Ноя", "Дек" ],
            monthNames:[ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
            gotoCurrent: true,
            dayNamesMin: [ "Вос" , "Пон", "Вто", "Сре", "Чет", "Пят", "Суб",  ],      minDate:new Date(),
	  dateFormat: "dd/mm/yy",
      altField: "#actualDate",
	  numberOfMonths: 2,
	  firstDay:1,
	    //showOtherMonths: true,
      selectOtherMonths: true
    });
  });
  </script>
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
                    <td style="width: 25%; color: red;"><?=$mess['id'];?></td>
                    <td style="width: 25%;">Дата, час</td>
                    <td style="width: 25%;"><?=date('d.m.Y H:i:s',strtotime($mess['zayava_date']))?></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Організація</td>
                    <td style="width: 25%;">Едина диспечерска</td>
                    <td style="width: 25%;">Зареестрував</td>
                    <td style="width: 25%;"><?=$mess['disp_name'];?></td>
                </tr>
                <tr>
                    <td colspan="4">Інформація про заявника</td>
                </tr>
                <tr>
                    <td colspan="4" class="align_left">
                        <br />
                        <p>П.І.Б <input type="text" width="80%" name="zayava_name" disabled="disabled" value="<?=$mess['zayava_user'];?>" /></p>
                        <p>Вулиця <input type="text" width="80%" name="zayava_name" disabled="disabled" value="<?=$mess['zayava_street'];?>" /></p>
                        <p class="lef">Будинок № <input type="text" width="80%" name="zayava_bud" disabled="disabled" value="<?=$mess['zayava_dom'];?>" /></p>
                        <p class="lef">Квартира № <input type="text" width="80%" name="zayava_kv" disabled="disabled" value="<?=$mess['zayava_kv'];?>" /></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <p>Опис проблеми</p>
                        <p><label style="float: left; margin-left: 20px;">Короткий зміст </label><textarea name="short" style="width: 80%; height: 200px;" disabled="disabled"><?=$mess['zayava_short'];?></textarea></p>
                    </td>
                </tr>
            </table>
            <br />
            <br />
            <? $chek_karta = DB::select()->from('monitoring_karta')->where('mess_id','=',$mess['id'])->execute()->current(); if(empty($chek_karta)){?>
            <form method="POST" action="/monitoring/send_karta">
                <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
                    <input type="hidden" name="id" value="<?=$mess['id'];?>" />
                    <tr>
                        <td colspan="2">Інформація щодо виконання</td>
                    </tr>
                    <tr>
                        <td>За видом</td>
                        <td>
                            <select name="vid" style="width: 300px;">
                                <option value="Вода">Вода</option>
                                <option value="Сміття">Сміття</option>
                                <option value="Світло">Світло</option>
                                <option value="Газ">Газ</option>
                                <option value="Каналізація">Каналізація</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Виконавець отримав</td>
                        <td><?=$mess['have_date'];?></td>
                    </tr>
                    <tr>
                        <td>Причина винекнення проблеми</td>
                        <td><textarea name="prich" style="width: 80%; height: 100px;"></textarea></td>
                    </tr>
                    <tr>
                        <td>Характер робіт по усуненню</td>
                        <td><textarea name="harakter" style="width: 80%; height: 100px;"></textarea></td>
                    </tr>
                    <tr>
                        <td>Прийнято до виконання</td>
                        <td><input type="text" id="datepicker" name="prinato" value="<?=date('d/m/Y')?>"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">Результат виконання</td>
                    </tr>
                    <tr>
                        <td>Результат</td>
                        <td>
                            <select name="rezult" style="width: 300px;">
                                <option value="Виконано">Виконано</option>
                                <option value="Не виконано">Не виконано</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Картку закрив (П.І.Б)</td>
                        <td><input type="text" name="zakril" value="" style="width: 300px;"/></td>
                    </tr>
                    <tr>
                        <td>Відправити в едину диспетчерсу</td>
                        <td><button>Відправити</button></td>
                    </tr>
                </table>
            </form>
            <?}else{?>
                <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
                    <input type="hidden" name="id" value="<?=$mess['id'];?>" />
                    <tr>
                        <td colspan="2">Інформація щодо виконання</td>
                    </tr>
                    <tr>
                        <td>За видом</td>
                        <td>
                            <?=$chek_karta['vid'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>Виконавець отримав</td>
                        <td><?=$mess['have_date'];?></td>
                    </tr>
                    <tr>
                        <td>Причина винекнення проблеми</td>
                        <td><textarea name="prich" style="width: 80%; height: 100px;"><?=$chek_karta['prich'];?></textarea></td>
                    </tr>
                    <tr>
                        <td>Характер робіт по усуненню</td>
                        <td><textarea name="harakter" style="width: 80%; height: 100px;"><?=$chek_karta['harakter'];?></textarea></td>
                    </tr>
                    <tr>
                        <td>Прийнято до виконання</td>
                        <td><input type="text" name="prinato" value="<?=$chek_karta['prinato'];?>"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">Результат виконання</td>
                    </tr>
                    <tr>
                        <td>Результат</td>
                        <td>
                            <?=$chek_karta['rezult'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>Картку закрив (П.І.Б)</td>
                        <td><?=$chek_karta['zakril'];?></td>
                    </tr>
                </table>
            <?}?>
            <br />
            <br />
            <br />
        </div>
    </article>
