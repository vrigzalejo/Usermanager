@extends(Config::get('usermanager::views.master'))

@section('content')
<div class="container" id="main-container">
    <div class="row">
        <div class="col-lg-6">
            <section class="module">
                <div class="module-head">
                    <b>{{ $group->getId() }} - {{ $group->name }}</b>
                </div>
                <div class="module-body">
                    <form class="form-horizontal" id="edit-group-form" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                   <label class="control-label">{{ trans('usermanager::groups.name') }}</label>
                                    <input class="col-lg-12 form-control" type="text" id="groupname" name="groupname" value="{{ $group->name }}">
                               </div>
                            </div>
                             <div class="col-lg-4">
                                @if($currentUser->hasAccess(Config::get('usermanager::permissions.addGroupPermission')))
                                    @include(Config::get('usermanager::views.permissions-select'), array('permissions'=> $permissions))
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="control-group">
                                    <button id="update-group" class="btn btn-embossed btn-primary">{{ trans('usermanager::all.update') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <div class="col-lg-6">
            <section class="module">
            <div class="module-head">
                <b>{{ trans('usermanager::groups.groups-users-title') }}</b>
            </div>
            <div class="module-body ajax-content">
                @include(Config::get('usermanager::views.users-in-group'))
            </div>
        </div>
    </div>
</div>
@stop

@section('module_scripts')
<script src="{{ asset('packages/vrigzalejo/usermanager/assets/js/dashboard/group.js') }}"></script>
@stop
