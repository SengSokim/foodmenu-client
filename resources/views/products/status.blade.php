<div class="modal fade" id="status" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('app.product.update-product-status') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h6 v-if="data.enable_status==1">{{ __('app.product.do-you-want-to-update-this-product-deactive:') }} <span class="text-warning">@{{data.name}}</span>?</h6>
          <h6 v-else>{{ __('app.product.do-you-want-to-update-this-product-active:') }}: <span class="text-success">@{{ data.name }}</span>?</h6>
      </div>
      <div class="modal-footer">
        <form @submit.prevent="deleteProduct">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
          <button type="button" v-if="data.enable_status == 0" @click="updateProductStatus(1)" class="btn btn-outline-success btn-sm">{{ __('app.product.active') }}</button>
          <button type="button" v-else @click="updateProductStatus(0)" class="btn btn-outline-warning btn-sm">{{ __('app.global.deactive') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>

