<form method="GET">
    <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_name">Name</label>
                        <input type="text" class="form-control name" placeholder="Category Name..." required>
                    </div>
                    <div class="form-group">
                        <label for="display_sequence">Dispaly Sequence</label>
                        <input type="number" class="form-control" placeholder="Dispaly Sequence...">
                    </div>
                    <div class="form-group m-0">
                        <input type="checkbox">
                        <label for="status">Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="sumbit" class="btn btn-primary">Save Change</button>
                </div>
            </div>
        </div>
    </div>
</form>
