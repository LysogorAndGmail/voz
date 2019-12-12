<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Доходи</h1>        
    </div>
    <div>
        <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
            <tr>
                <th rowspan=2>№ з/п</th>
                <th rowspan=2>Дата</th>
                <th colspan="2">Поступило</th>
                <th colspan="2">За що</th>
            </tr>
            <tr>
                <th>загальній фонд</th>
                <th>спеціальний фонд</th>
                <th>загальній фонд</th>
                <th>спеціальний фонд</th>
            </tr>
            <? $all_doh = DB::select()->from('fin_doh')->order_by('id','DESC')->limit(100)->execute()->as_array();
            $i = 1;  foreach($all_doh as $d){?>
            <tr style="background-color: #fff !important;">
                <td><?=$i;?></td>
                <td><?=date('d.m.Y',strtotime($d['date']));?></td>
                <td><?=$d['zag_fond_post'];?></td>
                <td><?=$d['spe_fond_post'];?></td>
                <td><?=$d['zag_fond_za_sho'];?></td>
                <td><?=$d['spe_fond_za_sho'];?></td>
            </tr>
            <? $i++; }?>
        </table>
    </div>
</article>