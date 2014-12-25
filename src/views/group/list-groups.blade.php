<div class="row upper-menu">
    {{ $groups->links(); }}

    <div style="float:right;">
        <a id="delete-item" class="btn btn-danger btn-embossed groups">{{ trans('usermanager::all.delete') }}</a>
        <a class="btn btn-embossed btn-new btn-primary" href="{{ URL::route('newGroup') }}">{{ trans('usermanager::groups.new') }}</a>
    </div>

</div>
<table class="table table-striped table-bordered table-condensed">
<thead>
    <tr>
        <th class="col-lg-1" style="text-align: center;">
            <label class="checkbox primary">
                <input type="checkbox" data-toggle="checkbox" class="check-all">
            </label>
        </th>
        <th class="col-lg-1" style="text-align: center;">Id</th>
        <th class="col-lg-2">{{ trans('usermanager::all.name') }}</th>
        <th class="col-lg-7 hidden-xs">{{ trans('usermanager::navigation.permissions') }}</th>
        <th class="col-lg-1" style="text-align: center;">{{ trans('usermanager::all.show') }}</th>
    </tr>
</thead>
<tbody>
    @foreach ($groups as $group)
    <tr>
        <td style="text-align: center;">
            <label class="checkbox primary">
                <input type="checkbox" data-toggle="checkbox" data-group-id="{{ $group->getId(); }}">
            </label>
        </td>
        <td style="text-align: center;">{{ $group->getId() }}</td>
        <td>{{ $group->getName() }}</td>
        <td class="hidden-xs">{{ json_encode($group->getPermissions()) }}</td>
        <td style="text-align: center;">&nbsp;<a href="{{ URL::route('showGroup', $group->getId())}}">{{ trans('usermanager::all.show') }}</a></td>
    </tr>
    @endforeach
</tbody>
</table>
