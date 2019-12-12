<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
<? $sesblog = Session::instance()->get('blogadmin');?>
<article >
    <div class="indent-left">
        <h1 style="text-align: center;">Dispetcher</h1>
        <div style="width: 50%; margin: auto;">
            <table style="width: 100%; background-color: #fff; color: black;" cellpadding="0" cellspacing="0" border="1"> 
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>П.І.Б</th>
                    <th>Вулиця</th>
                    <th>Ком. підприємство</th>
                    <th>Зареєстрував</th>
                    <th>Дата</th>
                    <th>Картка</th>
                    <th>Действия</th>
                </tr>
                <? foreach($mes as $m){?>
                <tr>
                    <td><?=$m['id'];?></td>
                    <td><?=$m['status'];?></td>
                    <td><?=$m['zayava_user'];?></td>
                    <td><?=$m['zayava_street'];?></td>
                    <td><?=$m['zayava_com'];?></td>
                    <td><?=$m['disp_name'];?></td>
                    <td><?=date('d.m.Y H:i:s',strtotime($m['zayava_date']));?></td>
                    <td><? $chek_karta = DB::select()->from('monitoring_karta')->where('mess_id','=',$m['id'])->execute()->current(); if(!empty($chek_karta)){ echo 'ДА';}else{ echo 'Нет';}?></td>
                    <td><a href="/blogadmin/dispetcher_see?id=<?=$m['id']?>">Просмотреть</a></td>
                </tr>
                <?}?>
            </table>
        </div>
    </div>
</article>

