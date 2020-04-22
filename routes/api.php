<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'Auth\RegisterController@api_register');
Route::post('/login', 'Auth\LoginController@api_login');
Route::post('/refresh', 'Auth\LoginController@refresh');
Route::post('/logout', 'Auth\LoginController@api_logout');
Route::post('/index', 'api\AuthController@index');
Route::post('/user/update/{id}', 'api\AuthController@update');
