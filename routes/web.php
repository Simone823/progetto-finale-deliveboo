<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route middleware auth admin
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group( function () {

    // Rotta / controller index
    // Route::get('/', 'HomeController@index')->name('logged');

    // Rotta homepage
    Route::get('/homepage', 'HomeController@homepage')->name('homepage');

    // Rotta resource homecontroller
    Route::resource('/user', 'HomeController');

    //Rotta resource PlateController
    Route::resource('/plates', 'PlateController');
});

