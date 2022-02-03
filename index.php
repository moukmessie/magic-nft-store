<?php

//session starting

use controller\AccountController;

session_start();

//initialisation of autoloading file
require('src/Autoloader.php');
Autoloader::register();

$router = new router\Router(basename(__DIR__));

/***Routing***/

$router->get('/', 'controller\IndexController@index');
$router->get('/browser', 'controller\BrowserController@browser');
$router->get('/product','controller\BrowserController@product');


/** Account Router */
$router->get('/account','controller\AccountController@account');
$router->get('/account/logout','controller\AccountController@logout');
$router->post('/account/login','controller\AccountController@login');
$router->post('/account/signin','controller\AccountController@signin');

/** Shop Router**/
$router->get('/shop','controller\ShopController@shop');
$router->get('/cart','controller\ShopController@cart');



// Erreur 404
$router->whenNotFound('controller\ErrorController@error');

/** Ecoute des requêtes entrantes *********************************************/

$router->listen();