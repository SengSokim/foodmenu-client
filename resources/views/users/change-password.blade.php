<div class="modal fade" id="update-password" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('users.password', $data->id ) }}" class="needs-validation" novalidate method="POST">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="" class="required">New Password</label>
                <input type="password" name="password" class="form-control" placeholder="********" id="password" required pattern=".{8,}">
                <span class="invalid-feedback" id="error_password">The password field is required.</span>
              </div>
              <div class="form-group">
                <label for="" class="required">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="********" id="confirm_password" required>
                <span class="invalid-feedback"></span>
                <span class="invalid-feedback" id="error_confirm_password">The confirm password field is required.</span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save fa-fw"></i> Save Change</button>
        </div>
      </form>
    </div>
  </div>
</div>