<div class="modal fade" id="create-product" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="overflow: scroll !important;">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Product</h5>
      </div>
      <div class="modal-body m-1">
        <form @submit.prevent="submit" id="createProduct" v-cloak>
          @include('products.form')
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
        <button type="button" form="createProduct" class="btn btn-success btn-sm px-4">{{ __('app.global.save') }}</button>
      </div>
    </div>
  </div>
</div>

