<div class="modal fade" id="status" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Product Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h6 v-if="data.enable_status==1">Are you sure, you want to deactive this product: <span class="text-warning"></span>@{{ data.name }}?</h6>
          <h6 v-else>Are you sure, you want to active this product: <span class="text-warning"></span>@{{ data.name }}?</h6>
      </div>
      <div class="modal-footer">
        <form @submit.prevent="deleteProduct">
          <button type="button" class="btn btn-default rounded-pill btn-sm" data-dismiss="modal">Cancel</button>
          <button type="button" v-if="data.enable_status == 0" @click="updateProductStatus(1)" class="btn btn-warning btn-sm rounded-pill">Active</button>
          <button type="button" v-else @click="updateProductStatus(0)" class="btn btn-warning btn-sm rounded-pill">Deactive</button>
        </form>
      </div>
    </div>
  </div>
</div>

