<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Контроль платіжних доручень</h1>        
    </div>
    <div>
        <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
            <tr>
                <th>№ з/п</th>
                <th>Дата реєстрації в казначействі</th>
                <th>№ платіжного доручення</th>
                <th>Управління, відділміської ради</th>
                <th>Призначення платежу</th>
                <th>Дата оплати козначейством</th>
            </tr>
            </tr>
            <? $all_doh = DB::select()->from('fin_kontrol')->order_by('id','DESC')->limit(100)->execute()->as_array();
            $i = 1;  foreach($all_doh as $d){?>
            <tr style="background-color: #fff !important;">
                <td><?=$i;?></td>
                <td><?=date('d.m.Y',strtotime($d['date_reest']));?></td>
                <td><?=$d['nomber'];?></td>
                <td><?=$d['uprav'];?></td>
                <td><?=$d['priz'];?></td>
                <td><?=date('d.m.Y',strtotime($d['date_oplata']));?></td>
            </tr>
            <? $i++; }?>
        </table>
    </div>
</article>