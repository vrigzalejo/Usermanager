@extends(Config::get('usermanager::views.master'))

@section('content')
<div class="container" id="main-container">
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-8 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-offset-2">
            <form id="login-form" method="post" class="form-horizontal">
                <div class="form-group account-username">
                    @if($loginAttribute === 'email')
                    <input type="text" class="col-lg-12 form-control" placeholder="{{ trans('usermanager::all.email') }}" name="email" id="email">
                    @elseif($loginAttribute === 'username')
                    <input type="text" class="col-lg-12 form-control" placeholder="{{ trans('usermanager::users.username') }}" name="username" id="username">
                    @endif
                </div>
                <div class="form-group account-username account-password">
                   <input type="password" class="col-lg-12 form-control" placeholder="{{ trans('usermanager::all.password') }}" name="pass" id="pass">
                </div>

                <label class="checkbox primary">
                    <input type="checkbox" data-toggle="switch" id="remember" name="remember" value="false" data-on-text="<span class='fui-check'></span>" data-off-text="<span class='fui-cross'></span>" />
                    {{ trans('usermanager::all.remember') }}
                </label>

                <button class="btn btn-block btn-large btn-primary" style="margin-top: 15px;">{{ trans('usermanager::all.signin') }}</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('module_scripts')
<script type="text/javascript" src="{{ asset('packages/vrigzalejo/usermanager/assets/js/dashboard/login.js') }}"></script>
@stop