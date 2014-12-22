@extends(Config::get('usermanager::views.master'))

@section('content')
<script src="{{ asset('packages/vrigzalejo/usermanager/assets/js/dashboard/user.js') }}"></script>

<div class="container" id="main-container">
    @include('usermanager::layouts.dashboard.confirmation-modal', array('title' => trans('usermanager::all.confirm-delete-title'), 'content' => trans('usermanager::all.confirm-delete-message'), 'type' => 'delete-user'))
    <div class="row">
        <div class="col-lg-10">
            <section class="module">
                <div class="module-head">
                    <b>{{ trans('usermanager::users.all') }}</b>
                </div>
                <div class="module-body ajax-content">
                    @include(Config::get('usermanager::views.users-list'))
                </div>
            </section>
        </div>
        <div class="col-lg-2">
            <section class="module">
                <div class="module-head">
                    <b>{{ trans('usermanager::all.search') }}</b>
                </div>
                <div class="module-body">
                    <form id="search-form" onsubmit="return false;">
                        <div class="form-group">
                            <label for="userIdSearch">{{ trans('usermanager::users.id') }}</label>
                            <input type="text" class="form-control" id="userIdSearch" name="userIdSearch">
                        </div>
                        <div class="form-group">
                            <label for="usernameSearch">{{ trans('usermanager::users.username') }}</label>
                            <input type="text" class="form-control" id="usernameSearch" name="usernameSearch">
                        </div>
                        <div class="form-group">
                            <label for="emailSearch">{{ trans('usermanager::all.email') }}</label>
                            <input type="email" class="form-control" id="emailSearch" name="emailSearch">
                        </div>
                        <div class="form-group">
                            <label for="lastNameSearch">{{ trans('usermanager::users.last-name') }}</label>
                            <input type="text" class="form-control" id="lastNameSearch" name="lastNameSearch">
                        </div>
                        <div class="form-group">
                            <label for="firstNameSearch">{{ trans('usermanager::users.first-name') }}</label>
                            <input type="text" class="form-control" id="firstNameSearch" name="firstNameSearch">
                        </div>
                        <div class="form-group">
                            <label for="bannedSearch">{{ trans('usermanager::users.banned') }}</label>
                            <select class="form-control" id="bannedSearch" name="bannedSearch">
                                <option value="">--</option>
                                <option value="0">{{ trans('usermanager::all.no') }}</option>
                                <option value="1">{{ trans('usermanager::all.yes') }}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ trans('usermanager::all.search') }}</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
@stop
