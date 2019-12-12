<div >
     <h4 style="font-size: 25px;">Новости блога</h4>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>Название</th>
            <th>Дата</th>
            <th>Текст</th>
            <th>Удалить блог</th>
        </tr>
    </thead>
    <tbody>
        <? foreach($news as $n){?>
        <tr>
            <td><?=$n['b_n_title'];?></td>
            <td><?=$n['b_n_date'];?></td>
            <td><?=$n['b_n_text'];?></td>
            <td><a href="<?='/admin/delete_blog_news/?id='.$n['b_n_id'];?>">Удалить</a></td>
        </tr>
       <?}?>
    </tbody>
</table>
</div>
                  