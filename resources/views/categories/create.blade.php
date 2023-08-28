<div class="modal fade" id="modal-category" tabindex="-1" data-backdrop="static" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('app.categories.create-category') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="submit" v-cloak id="createCategory">
          @include('categories.form')
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
        <button type="sumbit" form="createCategory" class="btn btn-success btn-sm px-3" onclick="showLoading()">{{ __('app.global.save') }}</button>
      </div>
    </div>
  </div>
</div>

