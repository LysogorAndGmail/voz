<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Моніторінг роботи сімейних лікарів</h1>        
    </div>
    <div>
        <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
            <tr>
                <th>№ з/п</th>
                <th>Дата</th>
                <th>Амбулаторія №</th>
                <th>Лікар</th>
                <th>Скільки хварих прийнято</th>
                <th>Примітка</th>
            </tr>
            <? $all_doh = DB::select()->from('soc_likar')->order_by('id','DESC')->limit(100)->execute()->as_array();
            $i = 1;  foreach($all_doh as $d){?>
            <tr style="background-color: #fff !important;">
                <td><?=$i;?></td>
                <td><?=date('d.m.Y',strtotime($d['date']));?></td>
                <td><?=$d['ambulatoria'];?></td>
                <td><?=$d['likar'];?></td>
                <td><?=$d['count'];?></td>
                <td><?=$d['promitka'];?></td>
            </tr>
            <? $i++; }?>
        </table>
    </div>
</article>