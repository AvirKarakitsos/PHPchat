<?php

use Router\Router;

define('VIEWS',dirname(__DIR__).DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR); // ChatMP/views/
define('SCRIPTS',dirname($_SERVER['SCRIPT_NAME']).DIRECTORY_SEPARATOR); // ChatMP/public/

define('DBNAME','php_chatmp');
define('HOST','Localhost');
define('USERAME','root');
define('PASSWORD','');

require '../vendor/autoload.php';

$router = new Router($_SERVER['REQUEST_URI']); // := $router = new Router($_GET['url']);

$router -> get('/','App\Controllers\SiteController@redirect');
$router -> get('/login','App\Controllers\SiteController@login');

$router -> get('/register','App\Controllers\SiteController@register');
$router -> post('/register','App\Controllers\SiteController@storeUser');

$router -> post('/users','App\Controllers\SiteController@loginUser');

$router -> get('/users','App\Controllers\SiteController@index');
$router -> get('/users/:id','App\Controllers\SiteController@show');

$router -> get('/userslive','App\Controllers\SiteController@load');

$router -> post('/store','App\Controllers\SiteController@store');

$router -> get('/logout','App\Controllers\SiteController@logout');

$router->run();


