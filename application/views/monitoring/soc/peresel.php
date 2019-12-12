<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">работа з переселенцями</h1>        
    </div>
    <div>
        <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
            <tr>
                <th>№ з/п</th>
                <th>Дата прибуття</th>
                <th>Звідки</th>
                <th>Перелік осіб однієї сім'ї</th>
                <th>Де поселені</th>
                <th>Які проблеми потребують вирішення</th>
                <th>Що зроблено</th>
            </tr>
            </tr>
            <? $all_doh = DB::select()->from('soc_peresel')->order_by('id','DESC')->limit(100)->execute()->as_array();
            $i = 1;  foreach($all_doh as $d){?>
            <tr style="background-color: #fff !important;">
                <td><?=$i;?></td>
                <td><?=date('d.m.Y',strtotime($d['date']));?></td>
                <td><?=$d['zvidki'];?></td>
                <td><?=$d['perelik'];?></td>
                <td><?=$d['poseleni'];?></td>
                <td><?=$d['problem'];?></td>
                <td><?=$d['zromleno'];?></td>
            </tr>
            <? $i++; }?>
        </table>
    </div>
</article>