<?php

//lab 3
$router->get('/profile', 'StudentController::index', ['middleware' => 'StudentMiddleware']);
//lab 4
$router->any('/show-users', 'AuthController::login');
//lab 5
$router->any('/', 'AuthController::login');
$router->any('/login', 'AuthController::login');
$router->get('/logout', 'AuthController::logout');

// API authentication and product CRUD
$router->group(['prefix' => '/api'], function ($router) {
    $router->post('/login', 'ApiController::login');
    $router->post('/register', 'ApiController::register');
    $router->post('/logout', 'ApiController::logout');
    $router->post('/refresh', 'ApiController::refresh');
    $router->get('/profile', 'ApiController::profile');
    $router->get('/users', 'ApiController::list');
    $router->post('/users', 'ApiController::create');
    $router->put('/users/{id}', 'ApiController::update');
    $router->delete('/users/{id}', 'ApiController::delete');
    $router->get('/products', 'ApiController::products');
    $router->post('/products', 'ApiController::product_create');
    $router->put('/products/{id}', 'ApiController::product_update');
    $router->delete('/products/{id}', 'ApiController::product_delete');
});

// lab 6 migrations
$router->get('/migration/create/{migration_class}', 'MigrationController::create_migration');
$router->get('/migration/migrate', 'MigrationController::migrate');
$router->get('/migration/rollback', 'MigrationController::rollback');
$router->get('/migration/rollback-all', 'MigrationController::rollback_all');
$router->get('/migration/refresh', 'MigrationController::refresh');
$router->get('/migration/status', 'MigrationController::status');

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

