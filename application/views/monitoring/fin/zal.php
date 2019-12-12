<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Залишок на рахунку</h1>        
    </div>
    <div>
        <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
            <tr>
                <th>№ з/п</th>
                <th>Дата</th>
                <th>загальній фонд</th>
                <th>спеціальний фонд</th>
            </tr>
            </tr>
            <? $all_doh = DB::select()->from('fin_zal')->order_by('id','DESC')->limit(100)->execute()->as_array();
            $i = 1;  foreach($all_doh as $d){?>
            <tr style="background-color: #fff !important;">
                <td><?=$i;?></td>
                <td><?=date('d.m.Y',strtotime($d['date']));?></td>
                <td><?=$d['zag_fond_zal'];?></td>
                <td><?=$d['spe_fond_zal'];?></td>
            </tr>
            <? $i++; }?>
        </table>
    </div>
</article>