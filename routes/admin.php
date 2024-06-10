<?php

use Hoangha\FpolyBaseWeb3014\Controllers\Admin\DashboardController;
use Hoangha\FpolyBaseWeb3014\Controllers\Admin\ProductController;
use Hoangha\FpolyBaseWeb3014\Controllers\Admin\UserController;
use Hoangha\FpolyBaseWeb3014\Controllers\Admin\CategoryController;
use Hoangha\FpolyBaseWeb3014\Controllers\Admin\PostController;
use Hoangha\FpolyBaseWeb3014\Controllers\Admin\OrderController;



$router->before('GET|POST', '/admin*.*', function () {
   if (!isset($_SESSION['user'])) {
      header('location: ' . url('login'));
      exit();
   }
});


$router->mount('/admin', function () use ($router) {
   $router->get('/',               DashboardController::class . '@dashboard');


   // CRUD USER
   $router->mount('/users', function () use ($router) {

      $router->get('/',               UserController::class . '@index');
      $router->get('/create',         UserController::class . '@create');
      $router->post('/store',         UserController::class . '@store');
      $router->get('/{id}/show',      UserController::class . '@show');
      $router->get('/{id}/edit',      UserController::class . '@edit');
      $router->post('/{id}/update',   UserController::class . '@update');
      $router->get('/{id}/delete',   UserController::class . '@delete');
   });


   $router->mount('/products', function () use ($router) {

      $router->get('/',               ProductController::class . '@index');
      $router->get('/create',         ProductController::class . '@create');
      $router->post('/store',         ProductController::class . '@store');
      $router->get('/{id}/show',      ProductController::class . '@show');
      $router->get('/{id}/edit',      ProductController::class . '@edit');
      $router->post('/{id}/update',   ProductController::class . '@update');
      $router->get('/{id}/delete',   ProductController::class . '@delete');
   });


   $router->mount('/categorys', function () use ($router) {

      $router->get('/',               CategoryController::class . '@index');
      $router->get('/create',         CategoryController::class . '@create');
      $router->post('/store',         CategoryController::class . '@store');
      $router->get('/{id}/show',      CategoryController::class . '@show');
      $router->get('/{id}/edit',      CategoryController::class . '@edit');
      $router->post('/{id}/update',   CategoryController::class . '@update');
      $router->get('/{id}/delete',   CategoryController::class . '@delete');
   });


   $router->mount('/posts', function () use ($router) {

      $router->get('/',               PostController::class . '@index');
      $router->get('/create',         PostController::class . '@create');
      $router->post('/store',         PostController::class . '@store');
      $router->get('/{id}/show',      PostController::class . '@show');
      $router->get('/{id}/edit',      PostController::class . '@edit');
      $router->post('/{id}/update',   PostController::class . '@update');
      $router->get('/{id}/delete',   PostController::class . '@delete');
   });


   $router->mount('/orders', function () use ($router) {

      $router->get('/',               OrderController::class . '@index');
      $router->get('/create',         OrderController::class . '@create');
      $router->post('/store',         OrderController::class . '@store');
      $router->get('/{id}/show',      OrderController::class . '@show');
      $router->get('/{id}/edit',      OrderController::class . '@edit');
      $router->post('/{id}/update',   OrderController::class . '@update');
      $router->get('/{id}/delete',   OrderController::class . '@delete');
   });
});
