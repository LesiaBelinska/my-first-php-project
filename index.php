<?php

define('APP_DIR', __DIR__ . '/');
define('CONTROLLERS_DIR', __DIR__ . '/controllers/');
define('VIEWS_DIR', __DIR__ . '/views/');

require_once APP_DIR . 'system/View.php';
require_once APP_DIR . 'functions.php';
require_once APP_DIR . 'system/Request.php';
require_once APP_DIR . 'system/Router.php';
require_once APP_DIR . 'traits/Validator.php';
require_once APP_DIR . 'traits/NumberValidator.php';
require_once APP_DIR . 'controllers/AuthController.php';
require_once APP_DIR . 'controllers/GreetingController.php';
require_once APP_DIR . 'controllers/CalculateController.php';

$router = new Router;

$router->addRoute('/login', [
    'get' => 'AuthController@login',
    'post' =>'AuthController@auth',
]);

$router->addRoute('/logout', [
    'get' => 'AuthController@logout',
]);

$router->addRoute('/register', [
    'get' => 'AuthController@register',
    'post' =>'AuthController@registerProcess',
]);

$router->addRoute('/greeting', [
    'get' => 'GreetingController@greeting',
]);

$router->addRoute('/calculate', [
    'get'=> 'CalculateController@calculate',
    'post'=>'CalculateController@calculateResult',
]);





$router->processRoute(Request::getUrl(), Request::getMethod());