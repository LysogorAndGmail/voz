<div >
     <h4 style="font-size: 25px;">Афиша</h4>
     <p><a href="/admin/add_afisha">Добавить афишу</a></p>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>Название</th>
            <th>Текст</th>
            <th>Редактировать</th>
            <th>Удалить</th>
            
        </tr>
    </thead>
    <tbody>
        <? foreach($afisha_all as $af){?>
        <tr>
            <td><?=$af['title'];?></td>
            <td><?=$af['text'];?></td>
            <td><a href="<?='/admin/update_afisha/?id='.$af['id'];?>">Редактировать</a></td>
            <td><a href="<?='/admin/delete_afisha/?id='.$af['id'];?>">Удалить</a></td>
        </tr>
       <?};?>     
       
    </tbody>
</table>
</div>
                  