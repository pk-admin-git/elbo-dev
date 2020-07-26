<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

/* Route::get('/projects', function () {
    return view('projects');
}); */

        Route::get('/projectApp/{vue_capture?}', function () {
            return view('vue.projects');
        })->where('vue_capture', '[\/\w\.-]*');



Route::get('/shiftplan', function () {
    return view('shiftplan');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
