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

        Route::get('/project/{project}/docuObjects', 'DocuObjectController@index')->middleware('cors');
        Route::post('/docuObjects', 'DocuObjectController@store')->middleware('cors');
        Route::patch('/docuObjects/{object}', 'DocuObjectController@update')->middleware('cors');
        Route::delete('/docuObjects/{object}', 'DocuObjectController@destroy')->middleware('cors');

        Route::get('/project/{project}/floors', 'DocuFloorController@index')->middleware('cors');
        Route::post('/docuFloors', 'DocuFloorController@store')->middleware('cors');
        Route::patch('/docuObjects/{floor}', 'DocuFloorController@update')->middleware('cors');
        Route::delete('/docuObjects/{floor}', 'DocuFloorController@destroy')->middleware('cors');

        Route::get('/project/{project}/docuCategories', 'DocuCategoryController@index')->middleware('cors');
        Route::post('/docuCategories', 'DocuCategoryController@store')->middleware('cors');
        Route::patch('/docuCategories/{category}', 'DocucategoryController@update')->middleware('cors');
        Route::delete('/docuCategories/{category}', 'DocuCategoryController@destroy')->middleware('cors');

        Route::get('/project/{project}/cableLists', 'CableListController@index')->middleware('cors');
        Route::post('/cableLists', 'CableListController@store')->middleware('cors');
        Route::patch('/cableLists/{cableList}', 'CableListController@update')->middleware('cors');
        Route::delete('/cableLists/{cableList}', 'CableListController@destroy')->middleware('cors');