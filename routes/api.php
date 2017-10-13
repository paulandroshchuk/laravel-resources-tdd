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

//$router->group(['namespace' => 'Api\Teams'], function ($router) {
//    $router->get('/users/{user}/teams', 'TeamsController@index');
//    $router->post('/users/{user}/teams', 'TeamsController@store');
//    $router->get('/users/{user}/teams/{team}', 'TeamsController@show');
//    $router->put('/users/{user}/teams/{team}', 'TeamsController@update');
//    $router->delete('/users/{user}/teams/{team}', 'TeamsController@destroy');
//});
//
$router->resource('/users/{user}/teams', 'Api\Teams\TeamsController')
    ->middleware('auth')
    ->except(['create']);
