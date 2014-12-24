@extends(Config::get('usermanager::views.master'))

@section('content')
<script type="text/javascript" src="{{ asset('packages/vrigzalejo/usermanager/assets/js/dashboard/login.js') }}"></script>
<div class="container" id="main-container">
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-2 col-lg-offset-5">
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
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" id="remember" value="false">{{ trans('usermanager::all.remember') }}
                    </label>
                </div>

                <button class="btn btn-block btn-large btn-primary" style="margin-top: 15px;">{{ trans('usermanager::all.signin') }}</button>
            </form>
        </div>
    </div>
</div>
@stop
