<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Route::resource('roles', 'RoleController')->except(['create', 'update', 'edit']);
    Route::resource('permissions', 'PermissionController')->except(['create', 'update', 'edit']);
});

Route::get('/home', 'HomeController@index')->name('home');
