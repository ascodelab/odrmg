<?php

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
$app->get('/user/{id}','OrdersController@getuser');
$app->get('/orders','OrdersController@index');
$app->get('/orders/{id}','OrdersController@show');
$app->post('/orders','OrdersController@create');
$app->post('/orders/items/add','OrdersController@additems');
$app->put('/orders/update','OrdersController@updateorder');
$app->put('/orders/cancel','OrdersController@cancelorder');
$app->put('/orders/payment','OrdersController@payment');
