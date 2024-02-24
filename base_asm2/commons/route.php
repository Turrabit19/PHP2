<?php

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});

    $router->get('/', [\App\Controllers\HomeController::class, "index"]);

    $router->get('home-category', [\App\Controllers\CategoryController::class, "listCategory"]);
    $router->get('add-category', [\App\Controllers\CategoryController::class, "addCategory"]);
    $router->post('post-category', [\App\Controllers\CategoryController::class, "postCategory"]);
    $router->get('detail-category/{id}', [\App\Controllers\CategoryController::class, "detailCategory"]);
    $router->post('edit-category/{id}', [\App\Controllers\CategoryController::class, "editCategory"]);
    $router->get('delete-category/{id}', [\App\Controllers\CategoryController::class, "deleteCategory"]);

    $router->get('home-product', [\App\Controllers\ProductController::class, "listProduct"]);
    $router->get('add-product', [\App\Controllers\ProductController::class, "addProduct"]);
    $router->post('post-product', [\App\Controllers\ProductController::class, "postProduct"]);
    $router->get('detail-product/{id}', [\App\Controllers\ProductController::class, "detailProduct"]);
    $router->post('edit-product/{id}', [\App\Controllers\ProductController::class, "editProduct"]);
    $router->get('delete-product/{id}', [\App\Controllers\ProductController::class, "deleteProduct"]);

    $router->get('home-customer', [\App\Controllers\CustomerController::class, "listCustomer"]);
    $router->get('add-customer', [\App\Controllers\CustomerController::class, "addCustomer"]);
    $router->post('post-customer', [\App\Controllers\CustomerController::class, "postCustomer"]);
    $router->get('detail-customer/{id}', [\App\Controllers\CustomerController::class, "detailCustomer"]);
    $router->post('edit-customer/{id}', [\App\Controllers\CustomerController::class, "editCustomer"]);
    $router->get('delete-customer/{id}', [\App\Controllers\CustomerController::class, "deleteCustomer"]);

$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
?>