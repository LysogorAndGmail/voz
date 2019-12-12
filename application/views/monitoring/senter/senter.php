<article style="width: 1200px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Контроль за сплатою комунальних послуг </h1>        
    </div>
    <div>
        <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
            <tr>
                <th rowspan="2">№ з/п</th>
                <th rowspan="2">Дата</th>
                <th colspan="3">КП "СОМ"</th>
                <th colspan="3">КП "Водопостачання"</th>
                <th colspan="3">КП "Едність"</th>
                <th colspan="3">Газове господарство</th>
                <th colspan="3">"Миколаїв облєнерго"</th>
            </tr>
            <tr>
                <th>Нарах</th>
                <th>Сплач</th>
                <th>%</th>
                <th>Нарах</th>
                <th>Сплач</th>
                <th>%</th>
                <th>Нарах</th>
                <th>Сплач</th>
                <th>%</th>
                <th>Нарах</th>
                <th>Сплач</th>
                <th>%</th>
                <th>Нарах</th>
                <th>Сплач</th>
                <th>%</th>
            </tr>
            <? $all_doh = DB::select()->from('senter')->order_by('id','DESC')->limit(100)->execute()->as_array();
            $i = 1;  foreach($all_doh as $d){?>
            <tr style="background-color: #fff !important;">
                <td><?=$i;?></td>
                <td><?=date('d.m.Y',strtotime($d['date']));?></td>
                <td><?=$d['som_1'];?></td>
                <td><?=$d['som_2'];?></td>
                <td><?=$d['som_3'];?></td>
                <td><?=$d['voda_1'];?></td>
                <td><?=$d['voda_2'];?></td>
                <td><?=$d['voda_3'];?></td>
                <td><?=$d['ednist_1'];?></td>
                <td><?=$d['ednist_2'];?></td>
                <td><?=$d['ednist_3'];?></td>
                <td><?=$d['gaz_1'];?></td>
                <td><?=$d['gaz_2'];?></td>
                <td><?=$d['gaz_3'];?></td>
                <td><?=$d['energia_1'];?></td>
                <td><?=$d['energia_2'];?></td>
                <td><?=$d['energia_3'];?></td>
            </tr>
            <? $i++; }?>
        </table>
    </div>
</article>