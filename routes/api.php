<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

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

/*
* Snippet for a quick route reference
*/
Route::get('/', function (Router $router) {
    return collect($router->getRoutes()->getRoutesByMethod()["GET"])->map(function($value, $key) {
        return url($key);
    })->values();   
});

Route::resource('programs', 'ProgramAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('perspectives', 'PerspectiveAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('strategicObjectives', 'StrategicObjectiveAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('keyPerfomaceIndicators', 'KeyPerfomaceIndicatorAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('keyPerfomanceIndicatorScores', 'KeyPerfomanceIndicatorScoreAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('strategicObjectiveScores', 'StrategicObjectiveScoreAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('nonConformities', 'NonConformitiesAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);