<div>
     <h4 style="font-size: 25px;">Видео всего - <? echo count($videos);?></h4>
     <a href="/admin/add_video">Добавить видео</a>
     <table style="width: 100%;" id="newspaper-c">
    <thead>
        <tr>
            <th>№</th>
            <th>Название</th>
            <th>Картинка</th>
            <th>Сылка</th>
            <th>Удалить видео</th>
        </tr>
    </thead>
    <tbody>
        <? $i = 1; foreach($videos as $video):?>
        <tr>
            <td><?=$i;?></td>
            <td><?=$video['video_title'];?></td>
            <td><?=$video['video_icon'];?></td>
            <td><?=$video['video_href'];?></td>
            <td><a href="<?='/admin/delete_video/?video_id='.$video['video_id'];?>">Удалить</a></td>
        </tr>
       <? $i++; endforeach; ?>     
       
    </tbody>
</table>
</div>