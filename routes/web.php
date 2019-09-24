<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('mentors/destroy', 'MentorController@massDestroy')->name('mentors.massDestroy');

    Route::resource('mentors', 'MentorController');

    Route::delete('pakets/destroy', 'PaketController@massDestroy')->name('pakets.massDestroy');

    Route::resource('pakets', 'PaketController');

    Route::delete('murids/destroy', 'MuridController@massDestroy')->name('murids.massDestroy');

    Route::resource('murids', 'MuridController');

    Route::post('murids/media', 'MuridController@storeMedia')->name('murids.storeMedia');

    Route::delete('jadwals/destroy', 'JadwalController@massDestroy')->name('jadwals.massDestroy');

    Route::resource('jadwals', 'JadwalController');

    Route::delete('kehadirans/destroy', 'KehadiranController@massDestroy')->name('kehadirans.massDestroy');

    Route::resource('kehadirans', 'KehadiranController');
});
