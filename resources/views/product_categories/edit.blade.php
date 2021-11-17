<div class="modal fade" id="editCategory" tabindex="-1" data-backdrop="static" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('app.categories.update-category') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="submit" v-cloak id="updateProductCategory">
          @include('product_categories.form') 
        </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default rounded-pill btn-sm" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
      <button type="sumbit" form="updateProductCategory" class="btn btn-warning rounded-pill btn-sm"></i>{{ __('app.global.save-changes') }}</button>
      </div>
    </div>
  </div>
</div>
