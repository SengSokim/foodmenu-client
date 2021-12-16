<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-hidden="true" style="overflow: scroll !important;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('app.user.create-user') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="submit" id="create-user" v-cloak>
                    @include('users.form')
                </form>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default rounded-pill" data-dismiss="modal" >{{ __('app.global.cancel') }}</button>
                    <button type="submit" form="create-user" class="btn btn-warning rounded-pill"> {{ __('app.global.save') }}</button>
                </div>
            </div>
        
        </div>
    </div>
</div>