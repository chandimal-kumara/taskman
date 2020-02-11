<?php

// Auth routes
Auth::routes();

// Task Routes
Route::get('/', 'TaskController@index')->name('task.index');

Route::get('/tasks/new_tasks', 'ManagerViewController@new_tasks')->name('task.new_tasks');
Route::get('/tasks/dispatched_tasks', 'ManagerViewController@dispatched_tasks')->name('task.dispatched_tasks');

Route::get('/tasks/all_tasks', 'AllViewController@all_tasks')->name('task.all_tasks');
Route::post('/tasks/all_tasks', 'AllViewController@all_tasks')->name('task.all_tasks');

Route::get('/tasks/assigned_tasks', 'MyViewController@assigned_tasks')->name('task.assigned_tasks');
Route::get('/tasks/active_tasks', 'MyViewController@active_tasks')->name('task.active_tasks');
Route::get('/tasks/onhold_tasks', 'MyViewController@onhold_tasks')->name('task.onhold_tasks');
Route::get('/tasks/cancelled_tasks', 'MyViewController@cancelled_tasks')->name('task.cancelled_tasks');
Route::get('/tasks/completed_tasks', 'MyViewController@completed_tasks')->name('task.completed_tasks');

Route::delete('/tasks/delete_task/{id}', 'TaskController@destroy_task')->name('task.destroy_task');
Route::put('/tasks/assign_task/{id}', 'TaskController@assign_task')->name('task.assign_task');
Route::put('/tasks/accept_task/{id}', 'TaskController@accept_task')->name('task.accept_task');
Route::put('/tasks/cancel_task/{id}', 'TaskController@cancel_task')->name('task.cancel_task');
Route::put('/tasks/complete_task/{id}', 'TaskController@complete_task')->name('task.complete_task');
Route::put('/tasks/onhold_task/{id}', 'TaskController@onhold_task')->name('task.onhold_task');
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

// Task Catagory Routes
Route::get('/task_catagories', 'TaskCatagoryController@task_catagories')->name('task_catagories.task_catagories');
Route::get('/task_catagories/add_catagory', 'TaskCatagoryController@add_task_catagory')->name('task_catagories.add_task_catagory');
Route::post('/task_catagories/save_catagory', 'TaskCatagoryController@save_task_catagory')->name('task_catagories.save_task_catagory');
Route::get('/task_catagories/edit_catagory/{id}', 'TaskCatagoryController@edit_task_catagory')->name('task_catagories.edit_task_catagory');
Route::put('/task_catagories/update_catagory/{id}', 'TaskCatagoryController@update_task_catagory')->name('task_catagories.update_task_catagory');
Route::delete('/task_catagories/delete_catagory/{id}', 'TaskCatagoryController@destroy_task_catagory')->name('task_catagories.destroy_task_catagory');

