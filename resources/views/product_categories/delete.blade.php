<div class="modal fade" id="delete-category" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-boxes"></i> Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <form @submit.prevent="deleteCategory" id="delete">
          <h6>Do you want to delete this category: <span class="text-warning"></span>@{{ data.name }}?</h6>
        </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
          <button type="sumbit" form="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Confirm</button>
      </div>
    </div>
  </div>
</div>