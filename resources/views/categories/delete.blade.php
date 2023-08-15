<div class="modal fade" id="delete-category" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('app.categories.delete-category') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h6>{{ __('app.categories.do-you-want-to-delete-this-category:') }} <span class="text-danger">@{{ data.name}}</span>?</h6>
      </div>
      <div class="modal-footer">
        <form @submit.prevent="deleteCategory">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
          <button type="submit" class="btn btn-danger btn-sm">{{ __('app.global.confirm') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>
