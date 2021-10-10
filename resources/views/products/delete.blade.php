<div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-boxes"></i> Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h6>Do you want to delete this product: <span class="text-warning"></span>@{{ data.name }}?</h6>
      </div>
      <div class="modal-footer">
        <form @submit.prevent="deleteProduct">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
          <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>