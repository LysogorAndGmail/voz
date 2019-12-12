<div >
     <h4 style="font-size: 25px;">Звернення громадян</h4>
     <table style="width: 100%;  font-size:16px;" cellpadding="5" cellspacing="5" border="5">
    <thead>
        <tr style="color:grey;">
            <td>Статус</td>
            <td>Дата</td>
            <td>П.І.Б</td>
            <td>Адресса</td>
            <td>Email</td>
            <td>Телефон</td>
            <td>Ответ</td>
            <td>Удалить</td>
        </tr>
    </thead>
    <tbody>
        <? foreach($zvernenna as $zver){?>
        <tr style="border:1px solid blue;">
            <td><a href="/admin/show_zver?zver_id=<?=$zver['zver_id']?>" style="border-bottom: 1px solid red;"><? if($zver['zver_status'] == 0) {echo "<span style='color:red;'>новое</span>";}else { echo 'просмотрено';} ;?></a></td>
            <td><?=$zver['date'];?></td>
            <td><?=$zver['zver_pib'];?></td>
            <td><?=$zver['zver_adress'];?></td>
            <td><?=$zver['zver_email'];?></td>
            <td><?=$zver['zver_tel'];?></td>
            <td><?=$zver['vidpovid'];?></td>
            <td><a href="<?='/admin/delete_zver/?zver_id='.$zver['zver_id'];?>">Удалить</a></td>
        </tr>
       <? }?>     
       
    </tbody>
</table>
</div>
                  