<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$router->post('/auth/register', 'Api\Auth\RegisterController@store');

$router->group(['as'  =>  'api.'], function ($router) {
    $router->resource('/users/{user}/teams', 'Api\Teams\TeamsController')
        ->middleware('auth:api')
        ->except(['create']);

    $router->resource('/shops', 'Api\Shops\ShopsController');
});
