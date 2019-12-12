<style>
.no_activ {
    background-color: #e5e5e5;
    margin-bottom: 100px;
    border-bottom: 1px solid red;
}
.activ_all {
background: url(../images/top-buttons-2.gif) repeat-x;
text-shadow: 1px 1px #bd5a02;
width: 150px;
font-family: 'Oswald', sans-serif;
font-size: 11px;
line-height: 19px;
color: #fff;
border-radius: 10px;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
text-transform: uppercase;
margin: 0 2px 0 0;
padding: 9px 0;
text-align: center;
cursor: pointer;
}
.dell_all {
background: url(../images/top-buttons-1.gif) repeat-x;
text-shadow: 1px 1px #bd5a02;
width: 150px;
font-family: 'Oswald', sans-serif;
font-size: 11px;
line-height: 19px;
color: #fff;
border-radius: 10px;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
text-transform: uppercase;
margin: 0 2px 0 0;
padding: 9px 0;
text-align: center;
cursor: pointer;
}
</style>
<div >
    <h4 style="font-size: 25px;">Оголошеня</h4>
    <div class="no_activ">
        <p style="color: red;">Неактивные</p>
        <table style="width: 100%;" id="newspaper-c">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>ID</th>
                    <th>Текст</th>
                    <th>Категория</th>
                    <th style="width: 100px;">Дата</th>
                    <th>Цена</th>
                    <th>Тел</th>
                </tr>
            </thead>
            <tbody>
                <? foreach($all_no as $a){?>
                    <tr>
                        <td><input type="checkbox" class="sel_bord" data-id="<?=$a['id'];?>" /></td>
                        <td><?=$a['id'];?></td>
                        <td><?=$a['text'];?></td>
                        <td><?=$a['cat'];?></td>
                        <td><?=$a['date'];?></td>
                        <td><?=$a['price'];?></td>
                        <td><?=$a['tel'];?></td>
                    </tr>
                <?}?>     
            </tbody>
        </table>
        <div style="padding: 10px;">
            <button class="activ_all">Активировать</button>
            <button class="dell_all">Удалить</button>
        </div>
    </div>
    <div class="activ">
        <p style="color: blue;">Активные</p>
        <table style="width: 100%;" id="newspaper-c">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Текст</th>
                    <th>Категория</th>
                    <th style="width: 100px;">Дата</th>
                    <th>Цена</th>
                    <th>Тел</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <? foreach($all as $a){?>
                    <tr>
                        <td><?=$a['id'];?></td>
                        <td><?=$a['text'];?></td>
                        <td><?=$a['cat'];?></td>
                        <td><?=$a['date'];?></td>
                        <td><?=$a['price'];?></td>
                        <td><?=$a['tel'];?></td>
                        <td><a href="/admin/edit_one_bord?id=<?=$a['id'];?>">Редактировать</a>&nbsp;&nbsp;<a href="/admin/dell_one_bord?id=<?=$a['id'];?>">Удалить</a></td>
                    </tr>
                <?}?>     
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
$('.activ_all').click(function(){
    var Arrr = [];
    $('.sel_bord:checked').each(function(){
        Arrr.push($(this).data('id'));
    })
    if(Arrr.length == 0){
        alert('не выбрано!');
        return false;
    }
    
    $.ajax({
        url: "/admin/activ_bord",
        type:'post',
        data: {array:Arrr},
        success: function( data ) {
            location="/admin/bord";
        },
        error: function() {
            alert('error');
        }
    });
})

$('.dell_all').click(function(){
    var Arrr = [];
    $('.sel_bord:checked').each(function(){
        Arrr.push($(this).data('id'));
    })
    if(Arrr.length == 0){
        alert('не выбрано!');
        return false;
    }
    
    $.ajax({
        url: "/admin/dell_bord",
        type:'post',
        data: {array:Arrr},
        success: function( data ) {
            location="/admin/bord";
        },
        error: function() {
            alert('error');
        }
    });
})
</script>              