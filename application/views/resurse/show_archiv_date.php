<div class="main">
    <div class="show_page_text">
        <h3>Нормативні акти</h3>
            <ol>
            <? foreach($archiv_m as $arch){?>
                <li style="font-size:20px; margin: 20px 0;"><a href="/doc/<?=$arch['doc_id'];?>"><? echo "№".$arch['doc_n']." від ".Date('d-m-Y',strtotime($arch['doc_date']))."р. ".$arch['doc_name']."";?></a></li>
            <? }?>
            </ol>
        <div class="clear"></div>
    </div>
    
               
</div>