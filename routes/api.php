<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('mentors', 'MentorApiController');

    Route::apiResource('pakets', 'PaketApiController');

    Route::apiResource('murids', 'MuridApiController');

    Route::apiResource('jadwals', 'JadwalApiController');

    Route::apiResource('kehadirans', 'KehadiranApiController');
});
