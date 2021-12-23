<div class="modal fade" id="modal-change-password" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fab fa-keycdn fa-fw"></i>{{ __('app.profile.change-password') }}</h5>
      </div>
      <form @submit.prevent="submit" id="updatePassword" v-cloak>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="required">{{ __('app.profile.current-password') }}</label>
                <input type="password" class="form-control" name="old_password" v-model="data.old_password" placeholder="Enter current password">
              </div>
              <div class="form-group">
                <label class="required">{{ __('app.profile.new-password') }}</label>
                <input type="password" class="form-control" name="password" v-model="data.password" placeholder="Enter new password">
              </div>
              <div class="form-group">
                <label class="required">{{ __('app.profile.confirm-password') }}</label>
                <input type="password" class="form-control" name="confirm_password" v-model="data.confirm_password"  placeholder="Enter confirm password">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
          <button type="submit" class="btn btn-primary submit-crop">{{ __('app.global.save-change') }}</button>
        </div>
      </form>
    </div>
  </div>
</div>