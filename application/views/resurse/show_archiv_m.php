<div class="main">
    <div class="show_page_text">
        <h3>Нормативні акти</h3>
            <? 
       
             if($_GET['type'] == 4){ foreach($archiv_m as $ar){
                    $new[Date('d.m.Y',strtotime($ar['doc_date']))][] = $ar;
                }
                 foreach($new as $in=>$vv){?>
                        <h3><?=$in;?></h3>
                        <?foreach($vv as $v){
                            //print_r($v);
                            //die;
                            ?>
                            <li style="font-size:20px; margin: 20px 0;"><a href="/resurse/doc/<?=$v['doc_id'];?>"><?=$v['doc_name'];?></a></li>
                        <?}?>
                    <? }
                    }else{?><ol>
            <? foreach($archiv_m as $arch){?>
            <li style="font-size:20px; margin: 20px 0;"><a href="/doc/<?=$arch['doc_id'];?>"><? echo "№".$arch['doc_n']." від ".Date('d-m-Y',strtotime($arch['doc_date']))."р. ".$arch['doc_name']."";?></a></li>
            <? }}?>
        </ol>
        <div class="clear"></div>
    </div>
    
               
</div>