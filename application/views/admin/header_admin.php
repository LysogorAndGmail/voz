<table id="admin_header" cellpadding="0" cellspacing="0" border="2" style="width: 100%;">
    <tr>
        <td><a href="/">Главная сайта</a></td>
        <td><a href="/admin">Главная админки</a></td>
        <td><a href="/admin/select_page">Страницы</a></td>
        <td><a href="/admin/select_cat">Категорий</a></td>
        <td><a href="/admin/select_svazi">Страницы+Категории</a></td>
        <td><a href="/admin/select_svazi_mat">Страницы+Материалы</a></td>
        <td><a href="/admin/select_materials">Материаллы</a></td>
        <td><a href="/admin/select_comments">Коментарии <? $new = DB::select()->from('comments')->where('comment_status','=',0)->execute()->as_array(); if(!empty($new)){ echo "<span style='color:red; position:relative; top:-5px;'>".count($new)."</span>";}?></a></td>
        <td><a href="/admin/select_moderators">Модераторы</a></td>
        <td><a href="/admin/select_cat_moderators">Категории модераторов</a></td>
    </tr>   
    <tr>
        <td><a href="/admin/select_users">Пользователи</a></td>
        <td><a href="/admin/select_deputats">Депутаты</a></td>
        <td><a href="/admin/look_images">Папка с картинками</a></td>
        <td><a href="/admin/select_video">Видео</a></td>
        <td><a href="/admin/select_galery">Галерея</a></td>
        <td><a href="/admin/select_docs">Решения</a></td>
        <td><a href="/admin/select_blogs">Блоги</a></td>
        <td><a href="/admin/select_zver">Звернення <? $new = DB::select()->from('zvernenna')->where('zver_status','=',0)->execute()->as_array(); if(!empty($new)){ echo "<span style='color:red; position:relative; top:-5px;'>".count($new)."</span>";}?></a></td>
        <td><a href="/admin/select_blog_zver">Обращения блог<? $new2 = DB::select()->from('blog_zver')->where('zver_status','=',0)->execute()->as_array(); if(!empty($new2)){ echo "<span style='color:red; position:relative; top:-5px;'>".count($new2)."</span>";}?></a></td>
        <td><a href="/admin/select_footer_menu">Футер меню</a></td>
    </tr>
    <tr>
        <td colspan="2"><a href="/admin/select_publinfo">Доступ до публічної інформації</a></td>
        <td colspan="1"><a href="/admin/select_votes">Опрос-Голосования</a></td>
        <td colspan="2"><a href="/admin/select_afisha">Афиша</a></td>
        <td colspan="3"><a href="/admin/stroka">Бегущая строка</a></td>
        <td colspan="1"><a href="/admin/secretar_cats">Категории секретаря</a></td>
        <td colspan="1"><a href="/admin/bord">Оголошеня</a></td>
    </tr>
</table>           