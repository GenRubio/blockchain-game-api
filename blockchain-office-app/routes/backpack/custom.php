<?php
use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('setting', 'SettingCrudController');
    Route::group(['prefix' => 'user/{user_id}'], function (){
        Route::crud('user-fleet', 'UserFleetCrudController');
        Route::crud('user-transport', 'UserTransportCrudController');
        Route::crud('user-character', 'UserCharacterCrudController');
        Route::crud('user-object', 'UserObjectCrudController');
    });
    Route::crud('admin', 'AdminCrudController');
    Route::crud('character', 'CharacterCrudController');
    Route::crud('mission', 'MissionCrudController');
    Route::crud('object-type', 'ObjectTypeCrudController');
    Route::crud('item', 'ItemCrudController');
    Route::crud('transport', 'TransportCrudController');
}); // this should be the absolute last line of this file