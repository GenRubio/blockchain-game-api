<?php

use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\TransportController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::fallback(function (){
    abort(404, 'API resource not found');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::group([
        'middleware' => 'auth:api',
        'prefix' => 'user'
    ], function () {
        Route::post('/', [UserController::class, 'getUser']);

        Route::prefix('characters')->group(function () {
            Route::post('all', [UserController::class, 'getCharacters']);
            Route::post('not-in-transport', [UserController::class, 'getCharactersNotInTransport']);
            Route::post('buy', [CharacterController::class, 'buyCharacter']);
        });

        Route::prefix('transports')->group(function () {
            Route::post('all', [UserController::class, 'getTransports']);
            Route::post('not-in-fleet', [UserController::class, 'getTransportsNotInFleet']);
            Route::post('buy', [TransportController::class, 'buyTransport']);
        });

        Route::post('objects/all', [UserController::class, 'getObjects']);
        Route::post('fleets/all', [UserController::class, 'getFleets']);
    });
});
