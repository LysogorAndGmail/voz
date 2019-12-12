<div class="main">
    <div class="show_page_text">
    <? 
    $monss = '';
    switch($m){
        case'01':
        $monss = 'Січень';
        break;
        case'02':
        $monss = 'Лютий';
        break;
        case'03':
        $monss = 'Березень';
        break;
        case'04':
        $monss = 'Квітень';
        break;
        case'05':
        $monss = 'Травень';
        break;
        case'06':
        $monss = 'Червень';
        break;
        case'07':
        $monss = 'Липень';
        break;
        case'08':
        $monss = 'Серпень';
        break;
        case'09':
        $monss = 'Вересень';
        break;
        case'10':
        $monss = 'Жовтень';
        break;
        case'11':
        $monss = 'Листопад';
        break;
        case'12':
        $monss = 'Грудень';
        break;
    }?>
        
        <h3><?=$monss.' '.$_GET['y'];?></h3>
        <div class="left-padding-content-select" style="padding-left: 20px;">
        <h2><span style="color: red;">всi файли</span></h2>
            <ul>
            <?  $dir = $_SERVER['DOCUMENT_ROOT']."/old_docs/$y/$m";
                $dh  = opendir($dir);
                while (false !== ($filename = readdir($dh))) {
                if(strlen($filename) > 2){?>
                <li style="float: left; width: 50%;">
                    <a href="<?echo Kohana::$base_url."old_docs/$y/$m/".$filename;?>"><?echo $filename?></a></span><br />
                </li>
                <?}}?>
                </ul>
                <div class="clearfix"></div>
                <hr />
        <div class="clearfix"></div>
    </div>
    </div>              
</div>