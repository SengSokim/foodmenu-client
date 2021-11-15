<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="submit">
                    @include('users.form')
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-default rounded-pill" data-dismiss="modal" >Cancel</button>
                        <button type="submit" class="btn btn-warning rounded-pill"> Save</button>
                    </div>
                </form>
            </div>
        
        </div>
    </div>
</div>