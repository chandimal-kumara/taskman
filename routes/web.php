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
Route::get('/tasks/add_task', 'TaskController@add_task')->name('task.add_task');
Route::get('/tasks/view_task/{id}', 'TaskController@view_task')->name('task.view_task');
Route::get('/tasks/edit_task/{id}', 'TaskController@edit_task')->name('task.edit_task');
Route::put('/tasks/update_task/{id}', 'TaskController@update_task')->name('task.update_task');
//Route::get('/view', 'TaskController@view')->name('task.view');
Route::post('/tasks/save_task', 'TaskController@save_task')->name('task.save_task');
//Route::post('/home','TaskController@store')->name('task.store');
Route::delete('/tasks/delete_task/{id}', 'TaskController@destroy_task')->name('task.destroy_task');
