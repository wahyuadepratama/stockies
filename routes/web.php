<?php

Route::get('/', function () { return view('guest.welcome'); });

Auth::routes();
Route::get('home', 'HomeController@index');

Route::get('{usernameEdit}/edit','UserController@edit');
Route::get('{username}','UserController@index');

//------------ Halaman admin --------------//
Route::get('stockies-admin', 'AdminController@index');
Route::get('admin/user-management', 'AdminController@getAllUser');
Route::post('admin/user-management/delete/{id}','AdminController@deleteUser');
Route::post('admin/user-management/restore/{id}','AdminController@restoreUser');
