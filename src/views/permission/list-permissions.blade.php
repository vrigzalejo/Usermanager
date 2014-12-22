<div class="row upper-menu">
    {{ $permissions->links(); }}

    <div style="float:right;">
        @if($currentUser->hasAccess(Config::get('usermanager::permissions.deletePermission')))
        <a id="delete-item" class="btn btn-danger">{{ trans('usermanager::all.delete') }}</a>
        @endif

        @if($currentUser->hasAccess(Config::get('usermanager::permissions.newPermission')))
        <a class="btn btn-info btn-new" href="{{ URL::route('newPermission') }}">{{ trans('usermanager::permissions.new') }}</a>
        @endif
    </div>
</div>
<table class="table table-striped table-bordered table-condensed">
<thead>
    <tr>
        @if($currentUser->hasAccess(Config::get('usermanager::permissions.deletePermission')))
        <th class="col-lg-1" style="text-align: center;"><input type="checkbox" class="check-all"></th>
        @endif
        <th class="col-lg-1" style="text-align: center;">Id</th>
        <th class="col-lg-1">{{ trans('usermanager::all.name') }}</th>
        <th class="col-lg-2">{{ trans('usermanager::permissions.value') }}</th>
        <th class="col-lg-2">{{ trans('usermanager::permissions.description') }}</th>
        @if($currentUser->hasAccess(Config::get('usermanager::permissions.showPermission')))
        <th class="col-lg-1" style="text-align: center;">{{ trans('usermanager::all.show') }}</th>
        @endif
    </tr>
</thead>
<tbody>
    @foreach ($permissions as $permission)
    <tr>
        @if($currentUser->hasAccess(Config::get('usermanager::permissions.deletePermission')))
        <td style="text-align: center;">
            <input type="checkbox" data-permission-id="{{ $permission->getId(); }}">
        </td>
        @endif
        <td style="text-align: center;">{{ $permission->getId() }}</td>
        <td>&nbsp;{{ $permission->getName() }}</td>
        <td>&nbsp;{{ $permission->getValue() }}</td>
        <td>&nbsp;{{ $permission->getDescription() }}</td>
        @if($currentUser->hasAccess(Config::get('usermanager::permissions.showPermission')))
        <td style="text-align: center;">&nbsp;<a href="{{ URL::route('showPermission', $permission->getId()) }}">{{ trans('usermanager::all.show') }}</a></td>
        @endif
    </tr>
    @endforeach
</tbody>
</table>
