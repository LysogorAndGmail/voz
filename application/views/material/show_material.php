<script type="text/javascript">
    $(document).ready(function(){
        $('hr').last().hide();
    })
    
</script>
<style>
#share42 {
    margin-top: 40px;
    margin-right: 15px;
    float: right;
}
.main h2{
    line-height:35px;
}
.my_bt {
    background: url(../images/top-buttons-2.gif) repeat-x;
    text-shadow: 1px 1px #bd5a02;
    width: 180px;
    font-family: 'Oswald', sans-serif;
    font-size: 11px;
    line-height: 19px;
    color: #fff;
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    text-transform: uppercase;
    margin: 0 2px 15px 0;
    padding: 9px 0;
    text-align: center;
    cursor: pointer;
    display: block;
    margin:auto;
    margin-bottom:20px;
}

.my_bt_comm {
    background: url(../images/top-buttons-2.gif) repeat-x;
    text-shadow: 1px 1px #bd5a02;
    width: 180px;
    font-family: 'Oswald', sans-serif;
    font-size: 11px;
    line-height: 19px;
    color: #fff;
    border-radius: 10px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    text-transform: uppercase;
    margin: 0 2px 15px 0;
    padding: 9px 0;
    text-align: center;
    cursor: pointer;
    display: block;
    margin:auto;
    margin-bottom:20px;
}
.author {
    color: blue;
}
</style>
<div class="main">
    <div class="container_24">
        <div id="show_page">
            <div class="bread top">
                <p>
                <? if($ho_insert == 'admin') {
                    echo 'Категорія -> ';
                    $parent_cat = Model::factory('cat')->get_cat($material_cat['parent_id']);
                    echo "<a href='/cat/".$parent_cat['cat_id']."'>".$parent_cat['cat_title']."</a> -> "; ?>
                <a href="<?='/cat/'.$material_cat['cat_id']?>"><? if(strlen($material_cat['cat_title'])>100){ echo substr($material_cat['cat_title'], 0, 100)."...";}else { echo $material_cat['cat_title']; } ?></a>
                <? }else {
                    //print_r($material_cat);
                    //die;
                    echo 'Категорія -> ';
                    $parent_cat = Model::factory('moderatorcat')->get_cat($material_cat['parent_cat']);
                    echo "<a href='/moderator_cat/".$parent_cat['moderator_cat_id']."'>".$parent_cat['moderator_cat_title']."</a> -> "; ?>
                <a href="<?='/moderator_cat/'.$material_cat['cat_id']?>"><? if(strlen($material_cat['moderator_cat_title'])>100){ echo substr($material_cat['moderator_cat_title'], 0, 100)."...";}else { echo $material_cat['moderator_cat_title']; } ?></a>
                <?}?>
                </p>
            </div>
            <div class="clear"></div>
            <h2 style="color: black; text-shadow: none !important;"><?php echo $material['material_title'];?></h2>
            <div class="show_page_text">
                <div class="material_text">
                    <?php echo $material['material_text'];?>
                </div>   
                <button class="my_bt">Роздрукувати сторінку</button>
            <div class="share42init"></div>
            <script type="text/javascript" src="<?=Kohana::$base_url?>share42/share42.js"></script>
         
            <p class="views_count">Дата: <span style="font-weight: bold;"><?=date('d.m.Y',strtotime($material['material_date']));?></span> / Переглядів: <span style="font-weight: bold;"><?=$material['material_views'];?></span> / <span >Комментарії - <span style="color: red; font-weight: bold;"><? if($material['comment_count']){echo $material['comment_count'];}else  {echo 0;}?></span> шт.</span></p>
            
            <ol class="commentlist" style="list-style: none; padding: 20px 10px;">
                <?  foreach($mat_comments as $comments){?>
                <li class="comment" style="background-color: #d9eff9; border-radius: 0 30px 0 30px; padding:10px 20px 20px 20px; margin: 20px 0;">
                    <div id="comment-2">
                        <div class="comment-body">
                            <span class="author"><? 
                                            //if($new_user) {
                                            //    if ($res['user_login'] == $new_user['user_login']) {
                                            //        echo "<span style='color:red;font-size: 18px;'>Вы</span>";
                                            //    } else {
                                            //        echo '<a href="/user/'.$comments['user_id'].'">'.$res['user_login'].'</a>';
                                           //     }
                                           // }else {
                                           //     echo '<a href="/user/'.$comments['user_id'].'">'.$res['user_login'].'</a>';}
                                           echo $comments['name'];
                                           ?>
                                        </span>
                            <div class="extra-wrap">
                                <? //$res = DB::select()->from('user')->where('user_id','=',$comments['user_id'])->execute()->current(); 
                                   // if($res['user_img'] == '') { ?>
                                        <img alt='' style="float: left; padding: 0 20px 20px 0;" src='<?=Kohana::$base_url?>material_images/no-foto.jpg' class='avatar avatar-60 photo' height='60' width='60' />
                                   <? //} else { ?>
                                       <!-- <img alt='' style="float: left; padding: 0 20px 20px 0;" src='<?=Kohana::$base_url?>material_images/<?//=$res['user_img'];?>' class='avatar avatar-60 photo' height='60' width='60' />-->
                                  <?// }?>
                                
                                <p><? echo $comments['comment_text'];?></p>
                                <div class="reply" style="text-align: right;">
                                    <span class="comment-meta commentmetadata"><?= date('d.m.Y',strtotime($comments['comment_date']));?>
                                        
                                    </span>
                                </div>
                            </div>      
                        </div>
                    </div>
                </li>
                <hr />
                <? };?>
            </ol>
            <div id="start_comm"></div>
            <div class="clear"></div>
            <div class="comment_form">
                <form action="/comment/add_comment" method="POST" class="zver_form" style="width: 90% !important; padding: 20px !important;">
                    <p style="text-align: left; margin: -10px auto; padding: 0;"><span style="width: 50px; float: left;">Iм'я - </span><input type="text" name="comm_name" style="width: 150px; float: left;" class="com_name"/></p><br /><br />
                    <textarea id="comment_text" class="comm_text" name="comment_text" maxlength="800" style="height: 200px;"></textarea><br />
                    <input type="hidden" name="mat_id" value="<?=$material['material_id'];?>"/>
                    <input type="hidden" name="comment_date" value="<?=date("Y:m:d");?>"/>
                    <p style="text-align: center; padding: 0; margin: 0;"><button class="comm_submit top-button-3 my_bt_comm" style="background: url(../images/top-buttons-3.gif) repeat-x; text-shadow: 1px 1px #0167d3;" >Додати коментар</button></p>
                </form>
            </div>
            </div> <!-- end main block -->
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="print_ticket_block" style="display: none;"><?php echo $material['material_text'];?></div>
<script type="text/javascript">
$('.my_bt').click(function(){
    $('body').css('height',0);
     $('#print_ticket_block').html($(this).prev('div').html());
     
     //alert($('#print_ticket_block').html());
     //exit;
     var printContents = document.getElementById('print_ticket_block').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     //
    window.print();
     document.body.innerHTML = originalContents;
     //$('#print_ticket_block')
     //
    
})
$('.zver_form').submit(function(){
    //alert($('.comm_text').val().length);
    //alert($('.com_name').val().length);
    //return false;
    if($('.comm_text').val().length < 3 || $('.com_name').val().length < 3){
        alert("Заповніть поле ім'я і текст коментаря!");
        return false;
    }
    
})
</script>




                   