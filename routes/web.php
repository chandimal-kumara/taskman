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

Auth::routes();

Route::get('/', 'TaskController@index')->name('task.index');
Route::get('/tasks', 'TaskController@tasks')->name('task.tasks');
Route::get('/add', 'TaskController@add')->name('task.add');
Route::post('/add', 'TaskController@addTask')->name('task.addTask');
Route::post('/home','TaskController@store')->name('task.store');
Route::delete('/delete/{id}', 'TaskController@destroy')->name('task.destroy');
