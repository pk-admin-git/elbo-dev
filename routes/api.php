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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


        Route::get('/projects', 'ProjectController@index')->middleware('cors');
        Route::post('/projects', 'ProjectController@store')->middleware('cors');
        Route::patch('/projects/{project}', 'ProjectController@update')->middleware('cors');
        Route::delete('/projects/{project}', 'ProjectController@destroy')->middleware('cors');

        Route::get('/docuObjects', 'DocuObjectController@index')->middleware('cors');
        Route::post('/docuObjects', 'DocuObjectController@store')->middleware('cors');
        Route::patch('/docuObjects/{object}', 'DocuObjectController@update')->middleware('cors');
        Route::delete('/docuObjects/{object}', 'DocuObjectController@destroy')->middleware('cors');