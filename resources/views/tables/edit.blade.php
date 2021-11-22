<div class="modal fade" id="editTable" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"> 
                <h5 class="modal-title">Edit table</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @include('tables.form')
            </div>
            <div class="modal-footer"> 
                <button class="btn btn-default rounded-pill" data-dismiss="modal" >Cancel</button>
                <button type="submit" @click="submit()" class="btn btn-warning rounded-pill" data-dismiss="modal"> Save Change</button>
            </div>
        </div>
    </div>
</div>