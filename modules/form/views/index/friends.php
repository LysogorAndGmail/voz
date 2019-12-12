<div id="content" class="contentCommunity">
    <h1>Сообщество <span>Друзья</span></h1>
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
        print $friends->renderFiltersForm(); ?>
    </div>
    <div id="centerColumn"><?php
        if (Auth::instance()->logged_in()) {
            print $friends->render();
        } else {
            print View::factory('access_denied');
        } ?>
    </div>
</div>