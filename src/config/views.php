<?php

return array(
    // layouts
    'master' => 'usermanager::layouts.dashboard.master',
    'header' => 'usermanager::layouts.dashboard.header',
    'permissions-select' => 'usermanager::layouts.dashboard.permissions-select',

    // dashboard
    'dashboard-index' => 'usermanager::dashboard.index',
    'login' => 'usermanager::dashboard.login',
    'error' => 'usermanager::dashboard.error',

    // users
    'users-index' => 'usermanager::user.index-user',
    'users-list' => 'usermanager::user.list-users',
    'user-create' => 'usermanager::user.new-user',
    'user-informations' => 'usermanager::user.user-informations',
    'user-profile' => 'usermanager::user.show-user',
    'user-activation' => 'usermanager::user.activation',

    // groups
    'groups-index' => 'usermanager::group.index-group',
    'groups-list' => 'usermanager::group.list-groups',
    'group-create' => 'usermanager::group.new-group',
    'users-in-group' => 'usermanager::group.list-users-group',
    'group-edit' => 'usermanager::group.show-group',

    // permissions
    'permissions-index' => 'usermanager::permission.index-permission',
    'permissions-list' => 'usermanager::permission.list-permissions',
    'permission-create' => 'usermanager::permission.new-permission',
    'permission-edit' => 'usermanager::permission.show-permission',

);
