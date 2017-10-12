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

Route::domain('{project}.localhost')->group(function () {
    Route::get('/live', 'ProjectController@show')->name('project.show');
    Route::get('/edit', 'ProjectController@edit')->name('project.edit');
    Route::put('/edit', 'ProjectController@update')->name('project.update');
    Route::delete('/destroy', 'ProjectController@destroy')->name('project.destroy');
});



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/room', 'RoomController@index')->name('room');


Route::get('/project', 'ProjectController@index')->name('project.index');
Route::get('/project/create', 'ProjectController@create')->name('project.create');
Route::post('/project/store', 'ProjectController@create')->name('project.store');

