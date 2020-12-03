<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

Route::get('/users', 'UserController@getUsers');
//index
Route::get('/', 'UserController@index');
Route::post('/', 'UserController@addUser');
Route::get('/login', 'UserController@login');
Route::get('/test', 'UserController@result');
Route::get('/{id}', 'UserController@show');
Route::put('/users1/put/{id}', 'UserController@update');
Route::delete('/users1/delete/{id}', 'UserController@delete');
