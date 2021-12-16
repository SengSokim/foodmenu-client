<div class="modal fade" id="delete-user" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">{{ __('app.user.delete-user') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body text-center">
                <h6>{{__('app.user.do-you-want-to-delete-this-user:')}} <span class="text-warning">@{{ data.name }}</span>?</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm rounded-pill" data-dismiss="modal"> {{__('app.global.cancel')}}</button>
                <button @click="deleteUser()" class="btn btn-danger  btn-sm rounded-pill">{{__('app.global.confirm')}}</button>
            </div>
        </div>
    </div>
</div>