<div class="modal fade" id="delete-table" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('app.table.delete-table') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <h6>{{ __('app.table.do-you-want-to-delete-this-table:') }} <span class="text-warning"></span>@{{ data.name }}?</h6>
        </div>
        <div class="modal-footer">
            <button class="btn btn-default rounded-pill btn-sm" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
            <button @click="deleteTable()" class="btn btn-danger rounded-pill btn-sm">{{ __('app.global.confirm') }}</button>
        </div>
      </div>
    </div>
  </div>