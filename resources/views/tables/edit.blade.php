<div class="modal fade" id="editTable" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"> 
                <h5 class="modal-title">{{ __('app.table.edit-table') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="submit" v-cloak id="updateTable">
                  @include('tables.form') 
                </form>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-default rounded-pill btn-sm" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
              <button type="sumbit" form="updateTable" class="btn btn-warning rounded-pill btn-sm"></i>{{ __('app.global.save-changes') }}</button>
              </div>
        </div>
    </div>
</div>