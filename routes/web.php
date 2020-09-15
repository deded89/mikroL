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

// AUTH ROUTES DEFAULT
Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    route::get('change-password', 'Auth\ChangePasswordController@edit')->name('password.edit');
    route::post('change-password', 'Auth\ChangePasswordController@change')->name('password.change');
});


// ADMIN ROUTE
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified', 'role:admin']], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('roles/rolePermissions/{role}', 'Admin\RoleController@rolePermissions')->name('roles.rolePermissions');
    Route::post('roles/assignPermissions/{role}', 'Admin\RoleController@assignPermissions')->name('roles.assignPermissions');
    Route::resource('roles', 'Admin\RoleController')->except(['create', 'update', 'edit']);
    Route::resource('permissions', 'Admin\PermissionController')->except(['create', 'update', 'edit']);
    Route::resource('users', 'Admin\UserController')->except(['edit', 'show', 'update']);
    Route::get('users/editRoles/{user}', 'Admin\UserController@editRoles')->name('users.editRoles');
    Route::post('users/updateRoles/{user}', 'Admin\UserController@updateRoles')->name('users.updateRoles');
    Route::get('users/permissions/{user}', 'Admin\UserController@userPermissions')->name('users.userPermissions');
    Route::post('users/assignPermissions/{user}', 'Admin\UserController@assignPermissions')->name('users.assignPermissions');
});

// USER ROUTE
Route::get('/home', 'User\HomeController@index')->name('home');

// GUEST ROUTE
Route::get('/', function () {
    return view('user.welcome');
});
