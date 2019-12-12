<article style="width: 900px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Доходи</h1>        
    </div>
    <p><a href="/monitoring/fin_doh_add">Добавить</a></p>
    <div>
        <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
            <tr>
                <th rowspan=2>№ з/п</th>
                <th rowspan=2>Дата</th>
                <th colspan="2">Поступило</th>
                <th colspan="2">За що</th>
                <th rowspan=2>Удалить</th>
            </tr>
            <tr>
                <th>загальній фонд</th>
                <th>спеціальний фонд</th>
                <th>загальній фонд</th>
                <th>спеціальний фонд</th>
            </tr>
            <? $i = 1;  foreach($all as $d){?>
            <tr style="background-color: #fff !important;">
                <td><?=$i;?></td>
                <td><?=date('d.m.Y',strtotime($d['date']));?></td>
                <td><?=$d['zag_fond_post'];?></td>
                <td><?=$d['spe_fond_post'];?></td>
                <td><?=$d['zag_fond_za_sho'];?></td>
                <td><?=$d['zag_fond_za_sho'];?></td>
                <td><a href="/monitoring/fin_doh_del?id=<?=$d['id'];?>">Удалить</a></td>
            </tr>
            <? $i++; }?>
        </table>
    </div>
</article>