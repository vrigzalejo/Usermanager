<div class="row upper-menu">
    {{ $datas['users']->links(); }}

    <div style="float:right;">
        @if($currentUser->hasAccess(Config::get('usermanager::permissions.deleteUsers')))
        <a id="delete-item" class="btn btn-danger btn-embossed">{{ trans('usermanager::all.delete') }}</a>
        @endif

        @if($currentUser->hasAccess(Config::get('usermanager::permissions.newUser')))
        <a class="btn btn-embossed btn-primary" href="{{ URL::route('newUser') }}">{{ trans('usermanager::users.new') }}</a>
        @endif
    </div>
</div>
<table class="table table-striped table-bordered table-condensed">
<thead>
    <tr>
        @if($currentUser->hasAccess(Config::get('usermanager::permissions.deleteUsers')))
        <th class="col-lg-1" style="text-align: center;">
            <label class="checkbox primary">
                <input type="checkbox" data-toggle="checkbox" class="check-all">
            </label>
        </th>
        @endif
        <th class="col-lg-1 hidden-xs" style="text-align: center;">Id</th>
        <th class="col-lg-1">{{ trans('usermanager::users.username') }}</th>
        <th class="col-lg-2 visible-lg visible-xs">{{ trans('usermanager::all.email') }}</th>
        <th class="col-lg-2 hidden-xs">{{ trans('usermanager::users.groups') }}</th>
        <th class="col-lg-2 hidden-xs">{{ trans('usermanager::users.permissions') }}</th>
        <th class="col-lg-1 visible-lg">{{ trans('usermanager::users.last-name') }}</th>
        <th class="col-lg-1 visible-lg">{{ trans('usermanager::users.first-name') }}</th>
        <th class="col-lg-1 hidden-xs">{{ trans('usermanager::users.activated') }}</th>
        @if($currentUser->hasAccess(Config::get('usermanager::permissions.showUser')))
        <th class="col-lg-1 hidden-xs">{{ trans('usermanager::users.banned') }}</th>

        <th class="col-lg-1" style="text-align: center;">{{ trans('usermanager::all.show') }}</th>
        @endif
    </tr>
</thead>
<tbody>
    @foreach ($datas['users'] as $user)
    <?php
    $throttle = $throttle = Sentry::findThrottlerByUserId($user->getId());
    ?>
    <tr>
        @if($currentUser->hasAccess(Config::get('usermanager::permissions.deleteUsers')))
        <td style="text-align: center;">
            <label class="checkbox primary">
                <input type="checkbox" data-toggle="checkbox" data-user-id="{{ $user->getId(); }}">
            </label>
        </td>
        @endif
        <td class="hidden-xs" style="text-align: center;">{{ $user->getId() }}</td>
        <td >&nbsp;{{ $user->username }}</td>
        <td class="visible-xs visible-lg">&nbsp;{{ $user->email }}</td>
        <td class="hidden-xs">
        @foreach($user->getGroups()->toArray() as $key => $group) {{ $group['name'] }},
        @endforeach
        </td>
        <td class="hidden-xs">{{ json_encode($user->getPermissions()) }}</td>
        <td class="visible-lg">&nbsp;{{ $user->last_name }}</td>
        <td class="visible-lg">&nbsp;{{ $user->first_name }}</td>
        <td class="hidden-xs">{{ $user->isActivated() ? trans('usermanager::all.yes') : '<a class="activate-user" href="#" data-toggle="tooltip" title="'.trans('usermanager::users.activate').'">'.trans('usermanager::all.no').'</a>'}}</td>
        @if($currentUser->hasAccess(Config::get('usermanager::permissions.showUser')))
        <td class="hidden-xs">{{ $throttle->isBanned() ? trans('usermanager::all.yes') : trans('usermanager::all.no')}}</td>
        <td style="text-align: center;">&nbsp;<a href="{{ URL::route('showUser', $user->getId()) }}">{{ trans('usermanager::all.show') }}</a></td>
        @endif
    </tr>
    @endforeach
</tbody>
</table>
