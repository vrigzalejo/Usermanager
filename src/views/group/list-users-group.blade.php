<div class="row upper-menu" style="height: 35px;">
    {{ $users->links() }}

    <div style="float:right;">
        <a id="delete-item" class="btn btn-danger btn-embossed users">{{ trans('usermanager::all.delete') }}</a>
    </div>
</div>

<table class="table table-striped table-bordered table-condensed">
<thead>
    <tr>
        @if($currentUser->hasAccess(Config::get('usermanager::permissions.addUserGroup')))
        <th style="width:20px; text-align: center;">
            <label class="checkbox primary">
                <input type="checkbox" data-toggle="checkbox" class="check-all">
            </label>
        </th>
        @endif
        <th style="width:20px; text-align: center;">ID</th>
        <th style="width:200px;">{{ trans('usermanager::users.username') }}</th>
        <th style="width:30px; text-align: center;">{{ trans('usermanager::all.show') }}</th>
    </tr>
</thead>
<tbody>
    @foreach ($users as $user)
    <tr>
        @if($currentUser->hasAccess(Config::get('usermanager::permissions.addUserGroup')))
        <td style="text-align: center;">
            <label class="checkbox primary">
                <input type="checkbox" data-toggle="checkbox" data-user-id="{{ $user->getId() }}">
            </label>
        </td>
        @endif
        <td style="text-align: center;">{{ $user->getId() }}</td>
        <td>&nbsp;{{ $user->username }}</td>
        <td style="text-align: center;">&nbsp;<a href="{{ URL::route('showUser', $user->getId()); }}">{{ trans('usermanager::all.show') }}</a></td>
    </tr>
    @endforeach
</tbody>
</table>

@if(!empty($candidateUsers) && $currentUser->hasAccess(Config::get('usermanager::permissions.addUserGroup')))
<div class="row">
    <div class="col-lg-6" style="margin-bottom: 15px;">
        <select class="form-control" id="ungrouped-users-list" data-group-id="{{ $group->getId() }}">
            @foreach($candidateUsers as $user)
            <option value="{{ $user->getId() }}">{{ $user->username}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4">
        <button id="add-user" type="button" class="btn btn-primary">{{ trans('usermanager::groups.add-user') }}</button>
    </div>
</div>
@endif
