<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="overflow: scroll !important;">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('app.product.product-information') }}</h5>
      </div>
      <div class="modal-body m-1">
        <form @submit.prevent="submit" id="updateProduct" v-cloak></form>
        @include('products.form')
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-default btn-sm rounded-pill" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
        <button type="confirm" form="updateProduct" class="btn btn-warning btn-sm rounded-pill">{{ __('app.global.save-change') }}</button>
      </div>
    </div>
  </div>
</div>