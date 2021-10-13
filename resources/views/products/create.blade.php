<div class="modal fade" id="create-product" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Product Information</h5>
      </div>
      <div class="modal-body m-1">
        <form @submit.prevent="submit" id="createProduct" v-cloak>
          @include('products.form')
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default rounded-pill" data-dismiss="modal">Cancel</button>
        <button type="submit" form="createProduct" class="btn btn-primary rounded-pill px-3">Save</button>
      </div>
    </div>
  </div>
</div>

