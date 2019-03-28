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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', 'APIRegisterController@register');

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::prefix('v1')->group( function ($router) {
    Route::get('area/mobile', 'API\AreaController@mobile');
    Route::get('area', 'API\AreaController@index');
    Route::get('area/{AreaId}', 'API\AreaController@show');
});

// Route::prefix('v1')->group( function ($router) {
//     //Route::get('zone', 'API\BrnzoneController@index');
//     //Route::get('zone/{AreaId}', 'API\BrnzoneController@show');
//     Route::get('zone/area/count', 'API\BrnzoneController@areaCount');
//     Route::get('zone/cts/count', 'API\BrnzoneController@ctsCount');
//     Route::get('zone/setup/count', 'API\BrnzoneController@setupCount');
//     Route::get('zone/area', 'API\BrnzoneController@area');
//     Route::get('zone/area/{AreaId}', 'API\BrnzoneController@areaShow');
//     Route::get('zone/cts/{CtsId}', 'API\BrnzoneController@ctsShow');
//     Route::get('zone/setup/{SetupId}', 'API\BrnzoneController@setupShow');
//     Route::get('zone/cts', 'API\BrnzoneController@cts');
//     Route::get('zone/setup', 'API\BrnzoneController@setup');
// });

//Mobile
Route::prefix('m1')->group( function ($router) {
    Route::get('zone/cts', 'API\BrnzoneController@cts');
    Route::get('zone/cts/{CtsId}', 'API\BrnzoneController@ctsZone');
    Route::get('zone/area', 'API\BrnzoneController@area');
    Route::get('zone/area/{AreaId}', 'API\BrnzoneController@areaZone');
    Route::get('zone/setup', 'API\BrnzoneController@setup');
    Route::get('zone/setup/{SetupId}', 'API\BrnzoneController@SetupZone');    
});

Route::prefix('v1')->group( function ($router) {
    Route::get('cts', 'API\CtsController@index');
    Route::get('cts/area', 'API\CtsController@indexArea');
    Route::get('cts/zone', 'API\CtsController@indexZone');
});
