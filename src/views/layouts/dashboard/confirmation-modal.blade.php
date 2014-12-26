<div class="modal fade {{ $type }}" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="confirm-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ $title }}</h4>
            </div>
            <div class="modal-body">{{ $content }}</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">{{ trans('usermanager::all.no') }}</button>
                <button type="button" class="btn btn-primary btn-embossed confirm-action">{{ trans('usermanager::all.yes') }}</button>
            </div>
        </div>
    </div>
</div>
