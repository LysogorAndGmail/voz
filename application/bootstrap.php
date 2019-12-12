<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/kohana/core'.EXT;

if (is_file(APPPATH.'classes/kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('Europe/Kiev');

/**
 * Set the default locale.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, "ru_RU.UTF-8");

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
I18n::lang('ru-ru');

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
Kohana::init(array(
	'base_url'   => 'http://voz/',
    'index_file' => FALSE
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);


/**
 * Create cookie salt
 */
Cookie::$salt = '656565656555';

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	// 'auth'       => MODPATH.'auth',       // Basic authentication
	// 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	   'database'   => MODPATH.'database',   // Database access
	// 'image'      => MODPATH.'image',      // Image manipulation
	   'orm'        => MODPATH.'orm',        // Object Relationship Mapping
       'form'        => MODPATH.'form',        // формы
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	// 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
       'pagination' => MODPATH.'pagination', // Pagination
       'email' => MODPATH.'email', // Email
	));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
 
Route::set('show_cat',  'board/<category>', array('category'=> '.+'))
        ->defaults(array(
            'controller' => 'board',
            'action'=> 'show_cat'              
    ));
 
Route::set('board',  'board')
        ->defaults(array(
            'controller' => 'board'        
    ));

Route::set('dovidnik',  'dovidnik')
        ->defaults(array(
            'controller' => 'dovidnik'        
    ));

Route::set('monitoring',  'monitoring')
        ->defaults(array(
            'controller' => 'monitoring'        
    ));

Route::set('old_docs_year',  'old_docs_year/<id>', array('id'=> '[0-9\.]+'))
        ->defaults(array(
            'controller' => 'resurse',
            'action'=> 'old_docs_year'           
    ));
 
 
Route::set('gazeta_mat',  'gazeta_mat/<id>', array('id'=> '[0-9\.]+'))
        ->defaults(array(
            'controller' => 'resurse',
            'action'=> 'gazeta_mat'           
    ));


Route::set('gazeta_cat',  'gazeta_cat/<id>(/<page>)', array('id'=> '[0-9\.]+','page'=>'[0-9]+'))
        ->defaults(array(
            'controller' => 'resurse',
            'action'=> 'gazeta_cat'           
    ));
 
 
Route::set('blogs', 'blogs')
        ->defaults(array(
            'controller' => 'resurse',
            'action' => 'blogs'
            
    )); 
 
Route::set('show_blog', 'blog/<id>',array('id'=>'[0-9\.]+'))
        ->defaults(array(
            'controller' => 'resurse',
            'action'=> 'blog'           
    )); 
 
Route::set('show_doc', 'doc/<id>',array('id'=>'[0-9\.]+'))
        ->defaults(array(
            'controller' => 'resurse',
            'action'=> 'doc'           
    ));

Route::set('ajax_search', 'search')
        ->defaults(array(
            'controller' => 'search',
            'action' => 'search'
            
    )); 
 
Route::set('ajax_deb', 'ajax_dep')
        ->defaults(array(
            'controller' => 'deputat',
            'action' => 'ajax_dep'
            
    )); 
 
 
Route::set('moderator', 'moderator')
        ->defaults(array(
            'controller' => 'moderator'
            
    )); 

 
Route::set('ajax', 'chek_user_login')
        ->defaults(array(
            'controller' => 'user',
            'action'=> 'chek_user_login'
                       
    ));
    
Route::set('resurse', 'resurse')
        ->defaults(array(
            'controller' => 'resurse'
                       
    ));

Route::set('secretar', 'secretar')
        ->defaults(array(
            'controller' => 'secretar'
                       
    ));

Route::set('regist_info', 'regist_info')
        ->defaults(array(
                'controller' => 'error',
                'action'=>'regist_info'
));
    
Route::set('error', 'error/<action><message>', array('action' => '[0-9]+', 'message' => '.+'))
        ->defaults(array(
                'controller' => 'error',
));
    
    
Route::set('comment', 'comment')
        ->defaults(array(
            'controller' => 'comment',           
    ));
 Route::set('show_user', 'user/<id>',array('id'=>'[0-9\.]+'))
        ->defaults(array(
            'controller' => 'user',
            'action'=> 'show_user'           
    ));
 
 
Route::set('user', 'user')
        ->defaults(array(
            'controller' => 'user'           
    ));

Route::set('search', 'search')
        ->defaults(array(
            'controller' => 'search',
            'action'=>'search'
           
    ));

Route::set('cat', 'cat/<id>(/<page>)', array('id'=> '[0-9\.]+','page'=>'[0-9]+'))
        ->defaults(array(
            'controller' => 'cat',
            'action'=>'show_cat'
           
    ));
    
Route::set('moderator_cat', 'moderator_cat/<id>(/<page>)', array('id'=> '[0-9\.]+','page'=>'[0-9]+'))
        ->defaults(array(
            'controller' => 'moderatorcat',
            'action'=>'show_moderator_cat'
           
    ));


Route::set('material', 'material/<id>', array('id'=> '[0-9]+'))
        ->defaults(array(
            'controller' => 'material',
            'action'=>'show_material'
           
    ));


Route::set('admin', 'admin/<action>', array('action' => 'index|add_metki'))
        ->defaults(array(
            'controller' => 'admin',
            
    ));
    
Route::set('maincat', 'maincat/<most_cat_id>',array('id'=> '[0-9]+'))
        ->defaults(array(
            'controller' => 'maincat',
            'action'=>'show_maincat'
            
    ));

Route::set('page', 'page/<alias>')
        ->defaults(array(
            'controller' => 'page',
            'action'=>'show_page'
    ));
   
    
Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
            'controller' => 'page',
            'action'     => 'index',
	));

