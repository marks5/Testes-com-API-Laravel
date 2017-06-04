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

Route::resource('/liquen','Liquends',['middleware' => 'auth:api']);

Route::get('/usuarios','UsuarioController@getUsuarios');
Route::post('/usuarios','UsuarioController@postUsuario');

Route::get('/games','ControllerGames@getGames');
Route::post('/games','ControllerGames@postGames');