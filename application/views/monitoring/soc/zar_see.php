<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Контроль за виплотою заробю плати</h1>        
    </div>
    <p><a href="/monitoring/soc_zar_add">Добавить</a></p>
    <div>
        <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
            <tr>
                <th>№ з/п</th>
                <th>Дата</th>
                <th>Установа, організація бютж. сфери</th>
                <th>Нараховано зар. плати</th>
                <th>Виплачено зар. плати</th>
                <th>Заборгованість зар. плати</th>
                <th>Удалить</th>
            </tr>
            <? $i = 1;  foreach($all as $d){?>
            <tr style="background-color: #fff !important;">
                <td><?=$i;?></td>
                <td><?=date('d.m.Y',strtotime($d['date']));?></td>
                <td><?=$d['ustanova'];?></td>
                <td><?=$d['narahovano'];?></td>
                <td><?=$d['viplacheno'];?></td>
                <td><?=$d['zaborgov'];?></td>
                <td><a href="/monitoring/soc_zar_del?id=<?=$d['id'];?>">Удалить</a></td>
            </tr>
            <? $i++; }?>
        </table>
    </div>
</article>