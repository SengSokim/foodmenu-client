<nav class="main-header navbar navbar-expand navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      {{-- <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a> --}}
      <a class="nav-link" data-widget="pushmenu" href="#" role="button" data-enable-remember="true"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item dropdown user-menu" style="position: absolute; right: 20px">
      <a href="#editProfile" class="nav-link" data-toggle="modal" aria-expanded="true">
        <img src="{{ $auth->user->media->url ?? asset('adminlte/dist/img/placeholder/square_avatar_placeholder.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline">{{ $auth->user->name ?? 'Not Set' }}</span>
      </a>
      <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </li>
  </ul>
</nav>