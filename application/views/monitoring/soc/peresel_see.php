<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Работа з переселенцями</h1>        
    </div>
    <p><a href="/monitoring/soc_peresel_add">Добавить</a></p>
    <div>
        <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
            <tr>
                <th>№ з/п</th>
                <th>Дата</th>
                <th>Звідки</th>
                <th>Перелік осіб однієї сім'ї</th>
                <th>Де поселені</th>
                <th>Які проблеми потребують вирішення</th>
                <th>Що зроблено</th>
                <th>Удалить</th>
            </tr>
            <? $i = 1;  foreach($all as $d){?>
            <tr style="background-color: #fff !important;">
                <td><?=$i;?></td>
                <td><?=date('d.m.Y',strtotime($d['date']));?></td>
                <td><?=$d['zvidki'];?></td>
                <td><?=$d['perelik'];?></td>
                <td><?=$d['poseleni'];?></td>
                <td><?=$d['problem'];?></td>
                <td><?=$d['zromleno'];?></td>
                <td><a href="/monitoring/soc_peresel_del?id=<?=$d['id'];?>">Удалить</a></td>
            </tr>
            <? $i++; }?>
        </table>
    </div>
</article>