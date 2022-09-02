<?php

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

/**
 * Route root web
 */
Route::prefix('/')->group(function () {
    Route::name('root.')->group(function () {
        Route::get('/', ['uses' =>'API\AuthController@index','as' =>'index']);
    });
});
