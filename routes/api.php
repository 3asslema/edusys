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
Route::group([
    'prefix' => 'v1'], function() {
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');
        Route::post('recover', 'AuthController@recover');

        Route::get('logout', 'AuthController@logout')
            ->middleware('jwt.auth');
    });
// API routes
Route::group([
    'prefix' => 'v1',
    'namespace' => 'API\V1',
    'middleware' => ['jwt.auth']],  function () {
        Route::get('/', 'HomeController@index');

        // Admissions
        Route::post('/admission', 'AdmissionController@store');
        //->middleware('can:store, App\Models\Category');
});
