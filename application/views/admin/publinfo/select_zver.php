<div >
     <h4 style="font-size: 25px;">Доступ до публічної інформації</h4>
     <table style="width: 100%;  font-size:16px;" cellpadding="5" cellspacing="5" border="5">
    <thead>
        <tr style="color:grey;">
            <td>Статус</td>
            <td>П.І.Б</td>
            <td>Адресса</td>
            <td>Email</td>
            <td>Телефон</td>
            <td>Удалить</td>
        </tr>
    </thead>
    <tbody>
        <? foreach($zvernenna as $zver){?>
        <tr style="border:1px solid blue;">
            <td><a href="/admin/show_publinfo?zver_id=<?=$zver['id']?>" style="border-bottom: 1px solid red;"><? if($zver['zver_status'] == 0) {echo "<span style='color:red;'>новое</span>";}else { echo 'просмотрено';} ;?></a></td>
            <td><?=$zver['zver_pib'];?></td>
            <td><?=$zver['zver_adress'];?></td>
            <td><?=$zver['zver_email'];?></td>
            <td><?=$zver['zver_tel'];?></td>
            <td><a href="<?='/admin/delete_publinfo/?zver_id='.$zver['id'];?>">Удалить</a></td>
        </tr>
       <? }?>     
       
    </tbody>
</table>
</div>
                  