<?php

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'auth', 'namespace' => 'Auth'], function () use ($router) {
    $router->post('login', 'LoginController');
});

$router->group(['prefix' => 'users', 'namespace' => 'Users'], function () use ($router) {
    $router->post('', 'CreateUserController');
});

//Auth
$router->group(['middleware' => 'auth'], function () use ($router) {
    //Users
    $router->group(['prefix' => 'users', 'namespace' => 'Users'], function () use ($router) {
        $router->get('', 'FindUserController');
    });

    //Groups
    $router->group(['prefix' => 'groups', 'namespace' => 'Groups'], function () use ($router) {
        $router->get('', 'FindGroupsByUserController');
    });

    //Expenses
    $router->group(['prefix' => 'expenses', 'namespace' => 'Expenses'], function () use ($router) {
        $router->get('', 'FindExpensesByUserController');
        $router->post('', 'CreateExpenseController');
        $router->put('{id}', 'UpdateExpenseController');
        $router->delete('{id}', 'DeleteExpenseController');

        //Categories
        $router->get('/categories', 'SearchCategoriesController');
    });
});




