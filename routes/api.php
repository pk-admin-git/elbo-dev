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

        /* Projekte */
        Route::get('/projects', 'ProjectController@index')->middleware('cors');
        Route::post('/projects', 'ProjectController@store')->middleware('cors');
        Route::patch('/projects/{project}', 'ProjectController@update')->middleware('cors');
        Route::delete('/projects/{project}', 'ProjectController@destroy')->middleware('cors');

        /* Projekt-Leistungsverzeichnis */
        Route::get('/project/{project}/specification', 'SpecificationController@index')->middleware('cors');
        Route::post('/specifications', 'SpecificationController@store')->middleware('cors');
        Route::patch('/specifications/{specification}', 'SpecificationController@update')->middleware('cors');
        Route::delete('/specifications/{specification}', 'SpecificationController@destroy')->middleware('cors');

        /* Projekt-Kategorien */
        Route::get('/project/{project}/docuCategories', 'DocuCategoryController@index')->middleware('cors');
        Route::post('/docuCategories', 'DocuCategoryController@store')->middleware('cors');
        Route::patch('/docuCategories/{category}', 'DocucategoryController@update')->middleware('cors');
        Route::delete('/docuCategories/{category}', 'DocuCategoryController@destroy')->middleware('cors');

        /* Projekt-Gebäude */
        Route::get('/project/{project}/docuObjects', 'DocuObjectController@index')->middleware('cors');
        Route::post('/docuObjects', 'DocuObjectController@store')->middleware('cors');
        Route::patch('/docuObjects/{object}', 'DocuObjectController@update')->middleware('cors');
        Route::delete('/docuObjects/{object}', 'DocuObjectController@destroy')->middleware('cors');

        /* Projekt-Etagen */
        Route::get('/project/{project}/floors', 'DocuFloorController@index')->middleware('cors');
        Route::post('/docuFloors', 'DocuFloorController@store')->middleware('cors');
        Route::patch('/docuFloors/{floor}', 'DocuFloorController@update')->middleware('cors');
        Route::delete('/docuFloors/{floor}', 'DocuFloorController@destroy')->middleware('cors');

         /* Projekt-Räume */
         Route::get('/project/{project}/rooms', 'DocuRoomController@index')->middleware('cors');
         Route::post('/docuRooms', 'DocuRoomController@store')->middleware('cors');
         Route::patch('/docuRooms/{room}', 'DocuRoomController@update')->middleware('cors');
         Route::delete('/docuRooms/{room}', 'DocuRoomController@destroy')->middleware('cors');

        /*Projekt-Kabelzuglisten */
        Route::get('/project/{project}/cableLists', 'CableListController@index')->middleware('cors');
        Route::post('/cableLists', 'CableListController@store')->middleware('cors');
        Route::patch('/cableLists/{cableList}', 'CableListController@update')->middleware('cors');
        Route::delete('/cableLists/{cableList}', 'CableListController@destroy')->middleware('cors');

        /* Projekt-Kabelzuglistenelement */
        Route::get('/project/{project}/cableLists/{cableList}/cableListElements', 'CableListElementController@index')->middleware('cors');
        Route::post('/cableListElements', 'CableListElementController@store')->middleware('cors');
        Route::patch('/cableListElements/{cableListElement}', 'CableListElementController@update')->middleware('cors');
        Route::delete('/cableListElements/{cableListElement}', 'CableListElementController@destroy')->middleware('cors');

        /* Projekt-Dokumentation */
        Route::get('/project/{project}/cableLists/{cableList}/documentation', 'DocumentationController@index')->middleware('cors');
        Route::post('/documentations', 'DocumentationController@store')->middleware('cors');
        Route::patch('/documentations/{documentation}', 'DocumentationController@update')->middleware('cors');
        Route::delete('/documentations/{documentation}', 'DocumentationController@destroy')->middleware('cors');
