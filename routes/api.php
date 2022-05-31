<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/home','Api\TypeController@welcome');
// creo la rotta per vedere i ristoranti che hanno la determinata tipologia
Route::get('/resturant-type/{user}','Api\UserController@showTypes');
//creo la rotta che visualizzerà i ristoranti dopo la selzione della città
Route::get('/city-resturants','Api\UserController@index');

