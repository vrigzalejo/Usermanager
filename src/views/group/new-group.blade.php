@extends(Config::get('usermanager::views.master'))

@section('content')
<script src="{{ asset('packages/vrigzalejo/usermanager/assets/js/dashboard/group.js') }}"></script>
<div class="container" id="main-container">
    <div class="row">
        <div class="col-lg-12">
            <section class="module">
                <div class="module-head">
                    <b>{{ trans('usermanager::groups.new') }}</b>
                </div>
                <div class="module-body">
                    <form class="form-horizontal" id="create-group-form" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">{{ trans('usermanager::groups.name') }}</label>
                                    <input class="col-lg-12 form-control" type="text" id="groupname" name="groupname">
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
                                    <button id="create-group" class="btn btn-primary btn-embossed">{{ trans('usermanager::all.create') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
@stop
