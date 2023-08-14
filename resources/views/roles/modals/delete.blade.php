<div class="modal fade" id="modal_delete_role_{{ $list->id }}" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="far fa-times fa-fw text-secondary"></i></span>
                </button>
            </div>
            <form action="{{ route('roles.destroy', $list->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <h6>Do you want to delete this role?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="far fa-times fa-fw"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
