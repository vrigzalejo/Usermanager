<?php

/**
 * Loggued routes without permission
 */
Route::group(array('before' => 'basicAuth', 'prefix' => Config::get('usermanager::config.uri')), function () {
    Route::get('', array(
        'as' => 'indexDashboard',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\DashboardController@getIndex')
    );

    Route::get('logout', array(
        'as' => 'logout',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\DashboardController@getLogout')
    );

    Route::get('access-denied', array(
        'as' => 'accessDenied',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\DashboardController@getAccessDenied')
    );
});

/**
 * Loggued routes with permissions
 */
Route::group(array('before' => 'basicAuth|hasPermissions', 'prefix' => Config::get('usermanager::config.uri')), function () {
    /**
     * User routes
     */
    Route::get('users', array(
        'as' => 'listUsers',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\UserController@getIndex')
    );

    Route::delete('user/{userId}', array(
        'as' => 'deleteUsers',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\UserController@delete')
    );

    Route::post('user/new', array(
        'as' => 'newUserPost',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\UserController@postCreate')
    );

    Route::get('user/new', array(
        'as' => 'newUser',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\UserController@getCreate')
    );

    Route::get('user/{userId}', array(
        'as' => 'showUser',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\UserController@getShow')
    );

    Route::put('user/{userId}', array(
        'as' => 'putUser',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\UserController@putShow')
    );

    Route::put('user/{userId}/activate', array(
        'as' => 'putActivateUser',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\UserController@putActivate')
    );

    /**
     * Group routes
     */
    Route::get('groups', array(
        'as' => 'listGroups',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\GroupController@getIndex')
    );

    Route::post('group/new', array(
        'as' => 'newGroupPost',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\GroupController@postCreate')
    );

    Route::get('group/new', array(
        'as' => 'newGroup',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\GroupController@getCreate')
    );

    Route::delete('group/{groupId}', array(
        'as' => 'deleteGroup',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\GroupController@delete')
    );

    Route::get('group/{groupId}', array(
        'as' => 'showGroup',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\GroupController@getShow')
    );

    Route::put('group/{groupId}', array(
        'as' => 'putGroup',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\GroupController@putShow')
    );

    Route::delete('group/{groupId}/user/{userId}', array(
        'as' => 'deleteUserGroup',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\GroupController@deleteUserFromGroup')
    );

    Route::post('group/{groupId}/user/{userId}', array(
        'as' => 'addUserGroup',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\GroupController@addUserInGroup')
    );

    /**
     * Permission routes
     */
    Route::get('permissions', array(
        'as' => 'listPermissions',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\PermissionController@getIndex')
    );

    Route::delete('permission/{permissionId}',array(
        'as' => 'deletePermission',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\PermissionController@delete')
    );

    Route::get('permission/new', array(
        'as' => 'newPermission',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\PermissionController@getCreate')
    );

    Route::post('permission/new', array(
        'as' => 'newPermissionPost',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\PermissionController@postCreate')
    );

    Route::get('permission/{permissionId}', array(
        'as' => 'showPermission',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\PermissionController@getShow')
    );

    Route::put('permission/{permissionId}', array(
        'as' => 'putPermission',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\PermissionController@putShow')
    );
});

/**
 * Unlogged routes
 */
Route::group(array('before' => 'notAuth', 'prefix' => Config::get('usermanager::config.uri')), function () {
    Route::get('login', array(
        'as' => 'getLogin',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\DashboardController@getLogin')
    );

    Route::post('login', array(
        'as' => 'postLogin',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\DashboardController@postLogin')
    );
});

Route::group(array('prefix' => Config::get('usermanager::config.uri')), function () {
    /**
     * Activate a user (with view)
     */
    Route::get('user/activation/{activationCode}', array(
        'as' => 'getActivate',
        'uses' => 'Vrigzalejo\Usermanager\Controllers\UserController@getActivate')
    );
});
