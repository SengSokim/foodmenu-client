<form method="GET">
    <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-boxes"></i> Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Category Name..." required>
                    </div>
                    <div class="form-group">
                        <label>Dispaly Sequence</label>
                        <input type="number" class="form-control" placeholder="0">
                    </div>
                    <div class="form-group m-0">
                        <input type="checkbox">
                        <label for="status">Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
                <button type="sumbit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save Change</button>
                </div>
            </div>
        </div>
    </div>
</form>
