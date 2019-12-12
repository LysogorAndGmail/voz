<article style="width: 1200px !important; margin: 0 auto;" >
    <div class="indent-left">
        <h1 style="text-align: center;">Перелік вільних земельних ділянок</h1>        
    </div>
    <div>
        <table style="width: 100%; background-color: #e5e5e5; color: black;" cellpadding="0" cellspacing="0" border="1"> 
            <tr>
                <th>№ з/п</th>
                <th>Адрес зем. ділянки</th>
                <th>Площа м2</th>
                <th>Призначення</th>
            </tr>
            <? $all_doh = DB::select()->from('com_vlas_free')->order_by('id','DESC')->limit(100)->execute()->as_array();
            $i = 1;  foreach($all_doh as $d){?>
            <tr style="background-color: #fff !important;">
                <td><?=$i;?></td>
                <td><?=$d['adress'];?></td>
                <td><?=$d['plosh'];?></td>
                <td><?=$d['priz'];?></td>
            </tr>
            <? $i++; }?>
        </table>
    </div>
</article>