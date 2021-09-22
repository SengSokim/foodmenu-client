<div class="modal fade" id="deleteCategory" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-boxes"></i> Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <h6>Do you want to delete this category: <span class="text-warning"></span>?</h6>
      </div>
      <div class="modal-footer">
        <form @click="deleteCategory" id="formDelete">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
          <button type="sumbit" form="formDelete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>