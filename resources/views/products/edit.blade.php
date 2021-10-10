<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Product Information</h5>
      </div>
      <div class="modal-body m-1">
        <form @submit.prevent="submit" id="updateProduct" v-cloak></form>
        @include('products.form')
      </div>
      <div class="modal-footer">
        <button type="button" v-if="data.enable_status == 0" @click="updateProductStatus(1)" class="btn btn-warning rounded-pill">Active</button>
        <button type="button" v-else @click="updateProductStatus(0)" class="btn btn-warning rounded-pill">Deactive</button>
        <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>
        <button type="confirm" form="updateProduct" class="btn btn-primary rounded-pill">Save changes</button>
      </div>
    </div>
  </div>
</div>