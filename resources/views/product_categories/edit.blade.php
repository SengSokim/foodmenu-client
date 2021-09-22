<div class="modal fade" id="editCategory" tabindex="-1" data-backdrop="static" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-boxes"></i> Update Category</h5>
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
      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
      <button type="sumbit" form="updateProductCategory" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save Change</button>
      </div>
    </div>
  </div>
</div>
