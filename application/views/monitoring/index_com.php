<? $monitoring_users = Session::instance()->get('monitor_user');?>
    <article style="width: 900px !important; margin: 0 auto;" >
        <div class="indent-left">
            <h1 style="text-align: center;"><?//=print_r($monitoring_users);?></h1>        
        </div>
        <div>
            <table style="width: 100%; background-color: #fff; color: black;" cellpadding="0" cellspacing="0" border="1"> 
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Дата</th>
                    <th>Картка</th>
                    <th>Действия</th>
                </tr>
                <? foreach($all_mess as $m){?>
                <tr>
                    <td><?=$m['id'];?></td>
                    <td <?if($m['status'] == 'новое'){?> style="color: red;" <?}?>><?=$m['status'];?></td>
                    <td><?=date('d.m.Y H:i:s',strtotime($m['zayava_date']));?></td>
                    <td><? $chek_karta = DB::select()->from('monitoring_karta')->where('mess_id','=',$m['id'])->execute()->current(); if(!empty($chek_karta)){ echo 'ДА';}else{ echo 'Нет';}?></td>
                    <td><a href="/monitoring/see_mess?id=<?=$m['id']?>">Просмотреть</a></td>
                </tr>
                <?}?>
            </table>
        </div>
    </article>
<script type="text/javascript">
    $('.mess_form').submit(function(){
        if (!confirm("Отправить?")) {
            return false;
        }
    })
</script>