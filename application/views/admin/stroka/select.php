<div >
     <h4 style="font-size: 25px;">Строки</h4>
     <p><a href="/admin/add_stroka">Добавить</a></p>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>Название</th>
            <th>Удалить</th>
            
        </tr>
    </thead>
    <tbody>
        <? foreach($all as $s){?>
        <tr>
            <td><?=$s['title'];?></td>
            <td><a href="<?='/admin/delete_stroka/?id='.$s['id'];?>">Удалить</a></td>
        </tr>
       <?};?>     
       
    </tbody>
</table>
</div>
                  