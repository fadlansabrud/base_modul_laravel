<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::to('/login');
});

Route::get('/admin', '\App\Http\Controllers\AdminController@index');
Route::get('/admin/delete/{id}', '\App\Http\Controllers\AdminController@delete');
Route::get('/admin/add', '\App\Http\Controllers\AdminController@add');
Route::post('/admin/add_action', '\App\Http\Controllers\AdminController@add_action');
Route::get('/admin/edit/{id}', '\App\Http\Controllers\AdminController@edit');
Route::post('/admin/edit_action', '\App\Http\Controllers\AdminController@edit_action');

Route::get('/karyawan', '\App\Http\Controllers\KaryawanController@index');
Route::post('/karyawan/add', '\App\Http\Controllers\KaryawanController@add');
Route::post('/karyawan/edit', '\App\Http\Controllers\KaryawanController@edit');
Route::get('/karyawan/delete/{id}', '\App\Http\Controllers\KaryawanController@delete');
Route::get('/karyawan/print/{id}', '\App\Http\Controllers\KaryawanController@print');

Route::get('/login', '\App\Http\Controllers\LoginController@index');
Route::get('/logout', '\App\Http\Controllers\LoginController@logout');
Route::get('/tes', '\App\Http\Controllers\LoginController@tes');
Route::post('/login_action', '\App\Http\Controllers\LoginController@login_action');

Route::get('/register', '\App\Http\Controllers\LoginController@register');
Route::post('/register_action', '\App\Http\Controllers\LoginController@register_action');