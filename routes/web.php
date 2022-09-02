<?php

use Illuminate\Support\Facades\Route;

/**
 * Route root web
 */
Route::prefix('/')->group(function () {
    Route::name('root.')->group(function () {
        Route::get('/', ['uses' =>'API\AuthController@index','as' =>'index']);
    });
});
