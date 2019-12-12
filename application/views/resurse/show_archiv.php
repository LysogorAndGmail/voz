<div class="main">
    <div class="show_page_text">
        <h3>Нормативні акти</h3>
        <ol>
            <? $new_arc = array(); foreach($archiv as $arch){
                $new_arc[date('m',strtotime($arch['doc_date']))] = $arch; 
            } foreach($new_arc as $year=>$mons){ ?>
            <li style="font-size:20px; margin: 20px 0;"><a href="/resurse/doc_m?type=<?=$_GET['type'];?>&year=<?=$_GET['year'];?>&mon=<?=$year;?>"><? $mon = Model::factory('Page')->show_month($year);echo $mon;?></a></li>
            <? }?>
        </ol>
        <div class="clear"></div>
    </div>
    
               
</div>