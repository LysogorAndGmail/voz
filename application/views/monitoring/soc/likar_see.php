<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Моніторінг роботи сімейних лікарів</h1>        
    </div>
    <p><a href="/monitoring/soc_likar_add">Добавить</a></p>
    <div>
        <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
            <tr>
                <th>№ з/п</th>
                <th>Дата</th>
                <th>Амбулаторія №</th>
                <th>Лікар</th>
                <th>Скільки хварих прийнято</th>
                <th>Примітка</th>
                <th>Удалить</th>
            </tr>
            <? $i = 1;  foreach($all as $d){?>
            <tr style="background-color: #fff !important;">
                <td><?=$i;?></td>
                <td><?=date('d.m.Y',strtotime($d['date']));?></td>
                <td><?=$d['ambulatoria'];?></td>
                <td><?=$d['likar'];?></td>
                <td><?=$d['count'];?></td>
                <td><?=$d['promitka'];?></td>
                <td><a href="/monitoring/soc_likar_del?id=<?=$d['id'];?>">Удалить</a></td>
            </tr>
            <? $i++; }?>
        </table>
    </div>
</article>