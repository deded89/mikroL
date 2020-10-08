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
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {
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



Route::group(['middleware' => ['auth']], function () {
    // USER ROUTE
    Route::get('dashboard', 'User\DashboardController@index')->name('dashboard')->middleware('auth');

    Route::get('home', 'User\HomeController@index')->name('home');
    Route::get('home/data', 'User\HomeController@getData')->name('home.getData');


    Route::get('master', 'User\MasterDataController@index')->name('master');
    Route::get('master/data', 'User\MasterDataController@getData')->name('master.getData');


    Route::get('account', 'User\AccountController@index')->name('account');
    Route::get('account/data', 'User\AccountController@getData')->name('account.getData');

    Route::get('edit-profile', 'User\ProfileController@edit');
    Route::post('save-profile', 'User\ProfileController@store');

    Route::get('menu', function () {
        return view('layouts.user.bottom_menu');
    });
    // ================================================

    // ================================================
    Route::patch('stores', 'User\StoreController@store')->name('stores.store');

    Route::get('cabangs/{cabang}/ubah', 'User\CabangController@ubahStatus')->name('cabangs.ubahStatus');

    Route::get('cabangs/data', 'User\CabangController@getTableData')->name('cabangs.table');
    Route::resource('cabangs', 'User\CabangController')->except('show', 'destroy');

    Route::get('layanans/data', 'User\LayananController@getTableData')->name('layanans.table');
    Route::resource('layanans', 'User\LayananController')->except('show', 'update');

    Route::get('pelanggans/data', 'User\PelangganController@getTableData')->name('pelanggans.table');
    Route::resource('pelanggans', 'User\PelangganController')->except('show', 'update');
});

// GUEST ROUTE
Route::get('/', function () {
    return view('user.landing');
});

//TES ROUTE
Route::get('tes/kirimpesan', 'TesController@kirimWa');
Route::get('tes/cekstatus/{id}', 'TesController@getMessageById');
Route::post('webhook', 'TesController@handle');
Route::resource('tes', 'TesController')->except('show');
