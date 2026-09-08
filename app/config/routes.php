<?php

/*
$router->get('/student', 'StudentController::index', 
            ['middleware' => 'StudentMiddleware']);

$router->get('/student/profile', 'StudentController::profile', 
            ['middleware' => 'StudentMiddleware']);
3rd acivity
*/

/*
4th lab activity
$router->get('/users', 'UserController::showUsers');
$router->get('/', 'Welcome::index');

*/

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

