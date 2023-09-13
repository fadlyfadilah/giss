<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/kampanye', 'HomeController@kampanye')->name('kampanye');
Route::get('/kampanye/{kampanye:slug}', 'HomeController@show')->name('kampanye.show');
Route::post('/midtrans/notification', 'NotificationController@handleNotification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Koordinat
    Route::delete('koordinats/destroy', 'KoordinatController@massDestroy')->name('koordinats.massDestroy');
    Route::resource('koordinats', 'KoordinatController');

    // Kampanye
    Route::delete('kampanyes/destroy', 'KampanyeController@massDestroy')->name('kampanyes.massDestroy');
    Route::resource('kampanyes', 'KampanyeController');

    // Donasi
    Route::resource('donasis', 'DonasiController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::group(['as' => 'frontend.', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    //donasi
    Route::post('donasi', 'DonasiController@store')->name('donasi.store');
    Route::get('donasi/{donasi}', 'DonasiController@detail')->name('donasi.detail');
    Route::get('/midtrans/callback', 'DonasiController@getTransactionData');
    Route::get('transaksi', 'DonasiController@show')->name('donasi.show');
    Route::get('donasi-saya', 'DonasiController@index')->name('donasi.index');

    // Kampanye
    Route::resource('kampanyes', 'KampanyeController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});