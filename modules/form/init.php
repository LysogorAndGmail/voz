<?php defined('SYSPATH') or die('No direct script access.');
Route::set('form', 'form(/<controller>(/<action>))')->defaults(array(
    'directory'  => 'form',
    'controller' => 'index',
    'action'     => 'index'
));