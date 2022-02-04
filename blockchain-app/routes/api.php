<?php

use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\TransportController;
use App\Http\Controllers\Api\UserCharacterController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserFleetController;
use App\Http\Controllers\Api\UserObjectController;
use App\Http\Controllers\Api\UserTransportController;
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
            Route::post('buy', [CharacterController::class, 'buyCharacter']);
            Route::post('all', [UserCharacterController::class, 'getCharacters']);
            Route::post('not-in-transport', [UserCharacterController::class, 'getCharactersNotInTransport']);
        });

        Route::prefix('transports')->group(function () {
            Route::post('buy', [TransportController::class, 'buyTransport']);
            Route::post('all', [UserTransportController::class, 'getTransports']);
            Route::post('not-in-fleet', [UserTransportController::class, 'getTransportsNotInFleet']);
            Route::post('with-caracters', [UserTransportController::class, 'getTransportsWithCharacters']);
            //Recibe variables user_character_id y user_transport_id
            Route::post('add-character', [UserTransportController::class, 'addCharacterToTransport']);
        });

        Route::post('objects/all', [UserObjectController::class, 'getObjects']);
        Route::post('fleets/all', [UserFleetController::class, 'getFleets']);
    });
});
