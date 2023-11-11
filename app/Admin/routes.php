<?php

use App\Admin\Controllers\CategoryController;
use App\Admin\Controllers\OrderDetailsController;
use App\Admin\Controllers\OrdersController;
use App\Admin\Controllers\ProductsController;
use App\Admin\Controllers\StockController;
use App\Admin\Controllers\UserController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('users', UserController::class);
    $router->resource('products', ProductsController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('orders', OrdersController::class);
    $router->resource('order-details', OrderDetailsController::class);
    $router->resource('stocks', StockController::class);

});
