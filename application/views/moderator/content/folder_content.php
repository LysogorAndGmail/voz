<article>
<h2>Folder <span style="color: red;">Папка с картинками</span></h2>
<style>
   .folder_images {
    width: 240px;
    height: 200px;
    float: left;
    outline:1px solid red;
    text-align: center;
   } 
   .folder_images img{
        margin: 10px;
        width: 220px;
        height: 130px;
   }
</style>
<?php
    $dir = $_SERVER['DOCUMENT_ROOT']."/material_images";
    $dh  = opendir($dir);
    while (false !== ($filename = readdir($dh))) {?>
    <div class="folder_images">
    <img src="/material_images/<?echo $filename;?>" />
    <span><?echo $filename?></span><br />
    <a href="/admin/delete_files?file_name=<?echo $filename?>">Delete image</a>
    </div>
    <?}?>
<div class="clear"></div>
</article>