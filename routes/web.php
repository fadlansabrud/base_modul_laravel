<?php

use App\Http\Controllers\admin\PenggunaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect::to('pengguna');
});

// route::get('halo', function(){
//     return"Hallo Ini Uji Coba";
// });

//route resource
// route admin

// Route::resource('pengguna', \App\Http\Controllers\admin\PenggunaController::class);
// Route::resource('dashboard', \App\Http\Controllers\admin\DashboardController::class);

Route::get('/pengguna', '\App\Http\Controllers\admin\PenggunaController@index');
Route::post('/pengguna/register','\App\Http\Controllers\admin\PenggunaController@register');
Route::post('/pengguna/update','\App\Http\Controllers\admin\PenggunaController@update');