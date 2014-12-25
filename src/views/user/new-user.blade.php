@extends(Config::get('usermanager::views.master'))

@section('content')
<script src="{{ asset('packages/vrigzalejo/usermanager/assets/js/dashboard/user.js') }}"></script>
<div class="container" id="main-container">
    <div class="row">
        <div class="col-lg-12">
            <section class="module">
                <div class="module-head">
                    <b>{{ trans('usermanager::users.new') }}</b>
                </div>
                <div class="module-body">
                    <form class="form-horizontal" id="create-user-form" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                 <div class="form-group">
                                    <label class="control-label">{{ trans('usermanager::users.username') }}</label>
                                    <p><input class="col-lg-12 form-control" type="text" placeholder="{{ trans('usermanager::users.username') }}" id="username" name="username"></p>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ trans('usermanager::all.email') }}</label>
                                    <p><input class="col-lg-12 form-control" type="text" placeholder="{{ trans('usermanager::all.email') }}" id="email" name="email"></p>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ trans('usermanager::all.password') }}</label>
                                    <p><input class="col-lg-12 form-control" type="password" placeholder="{{ trans('usermanager::all.password') }}" id="pass" name="pass"></p>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ trans('usermanager::users.last-name') }}</label>
                                    <p><input class="col-lg-12 form-control" type="text" placeholder="{{ trans('usermanager::users.last-name') }}" id="last_name" name="last_name"></p>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ trans('usermanager::users.first-name') }}</label>
                                    <p><input class="col-lg-12 form-control" type="text" placeholder="{{ trans('usermanager::users.first-name') }}" id="first_name" name="first_name"></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            @if($currentUser->hasAccess(Config::get('usermanager::permissions.addUserGroup')))
                                <label class="control-label">{{ trans('usermanager::users.groups') }}</label>
                                <div class="form-group">
                                @foreach($groups as $group)
                                <label class="checkbox primary">
                                    <input type="checkbox" data-toggle="switch" id="groups[{{ $group->getId() }}]" name="groups[]" value="{{ $group->getId() }}" data-on-text="<span class='fui-check'></span>" data-off-text="<span class='fui-cross'></span>" />
                                    {{ $group->getName() }}
                                </label>
                                @endforeach
                                </div>
                            @endif
                                <div class="form-group">
                                @if($currentUser->hasAccess(Config::get('usermanager::permissions.addUserPermission')))
                                    @include('usermanager::layouts.dashboard.permissions-select', array('permissions'=> $permissions))
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button id="add-user" class="btn btn-embossed btn-primary" style="margin-top: 15px;">{{ trans('usermanager::all.create') }}</button>
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
