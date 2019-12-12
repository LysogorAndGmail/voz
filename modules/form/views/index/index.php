<div id="content" class="contentCommunity">
    <h1>Сообщество <span>Все</span></h1>
    <div class="clear"></div>
    <div id="leftMenu">
        <h3>Пользователи</h3>
        <ul>
            <li><a href="/community/">Все</a></li><?php
            if (Auth::instance()->logged_in()) { ?>
                <li><a href="/community/index/friends/">Друзья</a></li><?php
            } ?>
        </ul>
        <h3>Поиск</h3><?php
        print $users->renderFiltersForm(); ?>
    </div>
    <div id="centerColumn"><?php print $users->render(); ?></div>
</div>