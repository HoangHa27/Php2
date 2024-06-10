<?php

use Hoangha\FpolyBaseWeb3014\Controllers\Client\HomeController;
use Hoangha\FpolyBaseWeb3014\Controllers\Client\ProductController;
use Hoangha\FpolyBaseWeb3014\Controllers\Client\ProducttController;
use Hoangha\FpolyBaseWeb3014\Controllers\Client\LoginController;
use Hoangha\FpolyBaseWeb3014\Controllers\Client\CartController;
use Hoangha\FpolyBaseWeb3014\Controllers\Client\OrderController;
use Hoangha\FpolyBaseWeb3014\Controllers\Client\CategoryController;

// $router->get( '/', HomeController::class . '@index3');
$router->get( '/', HomeController::class . '@index');
$router->get( '/show{id}', HomeController::class . '@show');



$router->get( '/products',          ProductController::class    . '@index');
$router->get( '/products/{id}',     ProductController::class    . '@detail');



$router->get( '/product',          ProducttController::class    . '@index');
$router->get( '/product/{id}',     ProducttController::class    . '@detail');

$router->get( '/category',          CategoryController::class    . '@index');
$router->get( '/category/{id}',     CategoryController::class    . '@detail');


$router->get( '/login',             LoginController::class    . '@showFormLogin');
$router->post( '/handle-login',     LoginController::class    . '@login');
$router->get( '/logout',            LoginController::class    . '@logout');


$router->get('cart/add',           CartController::class . '@add');
$router->get('cart/quantityInc',   CartController::class . '@quantityInc');
$router->get('cart/quantityDec',   CartController::class . '@quantityDec');
$router->get('cart/remove',        CartController::class . '@remove');
$router->get('cart/detail',        CartController::class . '@detail');

$router->post('order/checkout',     OrderController::class . '@checkout');