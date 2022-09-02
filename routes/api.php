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

/**
 * Route Auth User
 */
Route::prefix('v1/sso/user')->group(function () {
    Route::name('user.')->group(function () {
        Route::post('/login', ['uses' =>'API\AuthController@Auth','as' =>'user.login']);
    });
});
