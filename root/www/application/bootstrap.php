<?php defined('SYSPATH') or die('No direct script access.');

//-- Environment setup --------------------------------------------------------

/**
 * Set the default time zone.
 *
 * @see  http://docs.kohanaphp.com/about.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('Europe/Moscow');

/**
 * Set the default locale.
 *
 * @see  http://docs.kohanaphp.com/about.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'ru_RU.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://docs.kohanaphp.com/about.autoloading
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

//-- Configuration and initialization -----------------------------------------

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
Kohana::init(array('base_url' => '/', 'index_file' => ''));

/**
 * Sets the language to russian
 */
i18n::lang('ru');  

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Kohana_Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Kohana_Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	 //'auth'       => MODPATH.'auth',       // Basic authentication
	 'a1'         => MODPATH.'a1',       // Basic authentication
	 'acl'        => MODPATH.'acl',       // Basic authentication
	 'a2'         => MODPATH.'a2',       // Basic authentication
	 'a2acldemo'  => MODPATH.'a2acldemo',       // Basic authentication
	 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	 'database'   => MODPATH.'database',   // Database access
	 'image'      => MODPATH.'image',      // Image manipulation
	 'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	 'pagination' => MODPATH.'pagination', // Paging of results
	 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
Route::set('usermain', 'user')
	->defaults(array(
		'controller' => 'user',
		'action'     => 'user',
	));	

Route::set('userprofile', 'user/<username>')
	->defaults(array(
		'controller' => 'user',
		'action'     => 'profile',
	));	
	
Route::set('auth', 'auth/<action>')
	->defaults(array(
		'controller' => 'user',
	));	
	
Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'welcome',
		'action'     => '',
	));


/**
* Set the production status
*/
define('IN_PRODUCTION', TRUE);
	
/**
* Execute the main request. A source of the URI can be passed, eg: $_SERVER['PATH_INFO'].
* If no source is specified, the URI will be automatically detected.
*/
$request = Request::instance();
	
try
{
	// Attempt to execute the response
	$request->execute();
}
catch (ReflectionException $e)
{
	 throw $e;
}

/**
* Display the request response.
*/
echo $request->send_headers()->response;
