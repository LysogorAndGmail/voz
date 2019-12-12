<article style="width: 1200px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Перелік земельних ділянок, які виделені, але не використовуваются</h1>        
    </div>
    <div>
        <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
            <tr>
                <th>№ з/п</th>
                <th>Адрес зем. ділянки</th>
                <th>Кому виделено</th>
                <th>Рішення міської ради (дата, №)</th>
                <th>Чому не використовувается</th>
                <th>Що зроблено</th>
            </tr>
            <? $all_doh = DB::select()->from('com_vlas_free_ne')->order_by('id','DESC')->limit(100)->execute()->as_array();
            $i = 1;  foreach($all_doh as $d){?>
            <tr style="background-color: #fff !important;">
                <td><?=$i;?></td>
                <td><?=$d['adress'];?></td>
                <td><?=$d['comu'];?></td>
                <td><?=$d['rish'];?></td>
                <td><?=$d['chomu'];?></td>
                <td><?=$d['zrobleno'];?></td>
            </tr>
            <? $i++; }?>
        </table>
    </div>
</article>