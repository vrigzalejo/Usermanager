@extends(Config::get('usermanager::views.master'))

@section('content')
<script src="{{ asset('packages/vrigzalejo/usermanager/assets/js/dashboard/group.js') }}"></script>
<div class="container" id="main-container">
 @include('usermanager::layouts.dashboard.confirmation-modal',  array('title' => trans('usermanager::all.confirm-delete-title'), 'content' => trans('usermanager::all.confirm-delete-message'), 'type' => 'delete-group'))
    <div class="row">
        <div class="col-lg-10">
            <section class="module">
                <div class="module-head">
                    <b>{{ trans('usermanager::groups.all') }}</b>
                </div>
                <div class="module-body ajax-content">
                    @include(Config::get('usermanager::views.groups-list'))
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
                            <label for="groupIdSearch">{{ trans('usermanager::groups.id') }}</label>
                            <input type="text" class="form-control" id="groupIdSearch" name="groupIdSearch">
                        </div>
                        <div class="form-group">
                            <label for="groupnameSearch">{{ trans('usermanager::groups.name') }}</label>
                            <input type="text" class="form-control" id="groupnameSearch" name="groupnameSearch">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ trans('usermanager::all.search') }}</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
@stop
