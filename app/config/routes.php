<?php


$router->get('/profile', 'StudentController::index', ['middleware' => 'StudentMiddleware']);

$router->any('/show-users', 'AuthController::login');

$router->any('/', 'AuthController::login');

$router->any('/login', 'AuthController::login');
$router->get('/logout', 'AuthController::logout');

$router->group(['middleware' => 'AuthMiddleware'], function ($router) {
    $router->get('/product/display', 'ProductController::read');
    $router->any('/product/create', 'ProductController::create');
    $router->any('/product/edit/{id}', 'ProductController::edit');
    $router->get('/product/delete/{id}', 'ProductController::delete');

    $router->get('/products', 'ProductController::read');
    $router->any('/products/create', 'ProductController::create');
    $router->any('/products/edit/{id}', 'ProductController::edit');
    $router->get('/products/delete/{id}', 'ProductController::delete');
});

