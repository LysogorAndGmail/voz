<script type="text/javascript">
    $(document).ready(function(){
        $('hr').last().hide();
    })
    
</script>
<div class="main">
    <div class="container_24">
        <div id="show_page">
            <div class="bread top">
                <p>Категорія -> <a href="<?='/gazeta_cat/'.$mat['g_m_cat_id']?>"><? if(strlen($mat_cat['g_c_title'])>100){ echo substr($mat_cat['g_c_title'], 0, 100)."...";}else { echo $mat_cat['g_c_title']; } ?></a></p>
            </div>
            <div class="clear"></div>
            <h2 style="color: black;"><?php echo $mat['g_m_title'];?></h2>
            <div class="show_page_text">
                <div class="material_text">
                    <?php echo $mat['g_m_text'];?>
                </div>           
            </div> <!-- end main block -->
        </div>
        <div class="clear"></div>
    </div>
</div>