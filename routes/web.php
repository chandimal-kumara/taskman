<?php

// Auth routes
Auth::routes();

// Task Routes
Route::get('/', 'TaskController@index')->name('task.index');
Route::get('/tasks/admin_view_tasks', 'TaskController@admin_view_tasks')->name('task.admin_view_tasks');
Route::get('/tasks/my_view_tasks', 'TaskController@my_view_tasks')->name('task.my_view_tasks');
Route::get('/tasks/all_tasks', 'TaskController@all_tasks')->name('task.all_tasks');
Route::post('/tasks/all_tasks', 'TaskController@all_tasks')->name('task.all_tasks');
Route::delete('/tasks/delete_task/{id}', 'TaskController@destroy_task')->name('task.destroy_task');
Route::put('/tasks/assign_task/{id}', 'TaskController@assign_task')->name('task.assign_task');
Route::put('/tasks/action_task/{id}', 'TaskController@action_task')->name('task.action_task');
Route::put('/tasks/action2_task/{id}', 'TaskController@action2_task')->name('task.action2_task');
Route::put('/tasks/unhold_task/{id}', 'TaskController@unhold_task')->name('task.unhold_task');
Route::put('/tasks/reassign_task/{id}', 'TaskController@reassign_task')->name('task.reassign_task');
Route::get('/tasks/add_task', 'TaskController@add_task')->name('task.add_task');
Route::get('/tasks/view_task/{id}', 'TaskController@view_task')->name('task.view_task');
Route::get('/tasks/edit_task/{id}', 'TaskController@edit_task')->name('task.edit_task');
Route::put('/tasks/update_task/{id}', 'TaskController@update_task')->name('task.update_task');
Route::post('/tasks/save_task', 'TaskController@save_task')->name('task.save_task');

// User Routes
Route::get('/users', 'UserController@users')->name('user.users');
Route::get('/users/add_user', 'UserController@add_user')->name('user.add_user');
Route::post('/users/save_user', 'UserController@save_user')->name('user.save_user');
Route::get('/users/edit_user/{id}', 'UserController@edit_user')->name('user.edit_user');
Route::put('/users/update_user/{id}', 'UserController@update_user')->name('user.update_user');
Route::get('/users/edit_pass/{id}', 'UserController@edit_pass')->name('user.edit_pass');
Route::put('/users/update_pass/{id}', 'UserController@update_pass')->name('user.update_pass');
Route::delete('/users/delete_user/{id}', 'UserController@destroy_user')->name('user.destroy_user');

// Comment Routes
Route::post('/save_comment', 'TaskCommentController@save_comment')->name('taskComment.save_comment');
