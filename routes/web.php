<?php

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
Route::get('{any}', function () {
    return view('welcome');
})->where('any', '.*');



/*Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks','TaskController@index');
Route::post('/task','TaskController@store');
Route::get('/tasks/create','TaskController@create');
Route::delete('/task/{task}', 'TaskController@destroy');

//TasksController U mnozini

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
