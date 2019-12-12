<? $monitoring_users = Session::instance()->get('monitor_user');?>
<table id="admin_header" cellpadding="0" cellspacing="0" border="1" style="width: 100%;">
    <? switch($monitoring_users['group']){
        case'gor': ?>
    <tr>
        <td><a href="/monitoring">Главная</a></td>
        <td><a href="/monitoring/logout">Выход</a></td>
    </tr>
    <? break;
        case'res':?>
    <tr>
        <td><a href="/monitoring">Всі заяви</a></td>
        <td><a href="/monitoring/logout">Выход</a></td>
    </tr>
    <? break;
        case'fin':?>
    <tr>
        <td><a href="/monitoring/fin_doh">Доходи</a></td>
        <td><a href="/monitoring/fin_vit">Витрати</a></td>
        <td><a href="/monitoring/fin_zal">Залишок на рахунку</a></td>
        <td><a href="/monitoring/fin_kontrol">Контроль платіжних доручень</a></td>
        <td><a href="/monitoring/logout">Выход</a></td>
    </tr>
    <? break;
        case'soc':?>
    <tr>
        <td><a href="/monitoring/soc_zar">Контроль за виплотою заробю плати</a></td>
        <td><a href="/monitoring/soc_peresel">Робота з переселенцями</a></td>
        <td><a href="/monitoring/soc_likar">Моніторінг роботи сім. лікарів</a></td>
        <td><a href="/monitoring/logout">Выход</a></td>
    </tr>
    <? break;
        case'center':?>
    <tr>
        <td><a href="/monitoring/see_senter">Контроль за сплатою комунальних послуг</a></td>
        <td><a href="/monitoring/logout">Выход</a></td>
    </tr>
    <? break;
        case'szkg':?>
    <tr>
        <td><a href="/monitoring">Всі заяви</a></td>
        <td><a href="/monitoring/logout">Выход</a></td>
    </tr>
    <? break;
        case'com':?>
    <tr>
        <td><a href="/monitoring/com_free">Перелік вільних земельних ділянок</a></td>
        <td><a href="/monitoring/com_free_ne">Перелік земельних ділянок, які виделені, але не використовуваются</a></td>
        <td><a href="/monitoring/logout">Выход</a></td>
    </tr>
    <? break;
        default: ?>
    <tr>
        <td><a href="/monitoring">Всі заяви</a></td>
        <td><a href="/monitoring/logout">Выход</a></td>
    </tr>
        
    <? }?>
</table>