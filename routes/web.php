<?php

Route::resource('/todo', 'TodoController');
Route::put('/todo/{todo}/complete/', 'TodoController@complete')->name('todo.complete');
Route::put('/todo/{todo}/uncomplete/', 'TodoController@uncomplete')->name('todo.uncomplete');


Route::get('/', 'UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/upload', 'UserController@uploadAvatar')->name('upload');
