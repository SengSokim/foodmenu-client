<div id="editProfile">
  <nav class="main-header navbar navbar-expand navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" data-enable-remember="true"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item dropdown user-menu" style="position: absolute; right: 20px">
        <a href="#edit-profile" class="nav-link" data-toggle="modal" aria-expanded="true" @click="viewProfile">
          <img src="{{ $auth->user->media->url ?? asset('adminlte/dist/img/placeholder/square_avatar_placeholder.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">{{$auth->user->name ?? 'Not Set' }}</span>
        </a>
      </li>
    </ul>
  </nav>
  <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="submit" id="profile" v-cloak>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <img id="user-profile-upload" class="profile-user-img img-fluid img-circle mb-1" :src="data.image ? data.image : (data.media ? data.media.url : '{{ asset('adminlte/dist/img/placeholder/square_avatar_placeholder.jpg') }}')" style="width: 120px; height: 120px">
                      <input type='file' id="user-profile-input" name="image" class="hide-file-name" accept=".jpg,.png" @change="uploadImage"/>
                      <input class="btn-upload btn btn-primary form-control" type="button" value="Browse" onclick="document.getElementById('user-profile-input').value='';document.getElementById('user-profile-input').click();" style="width: 120px;">
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" v-model="data.name">
                    </div>
                  
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="required">Gender</label>
                      <select class="form-control gender-select2" name="gender" v-select2 v-model="data.gender" v-validate="'required'" style="width: 100%;">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="required">Phone Number</label>
                      <input type="text" class="form-control" name="phone_number" v-model="data.phone_number" v-validate="'required'" placeholder="Enter phone number" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Address</label>
                      <textarea name="address" class="form-control" rows="2" placeholder="Type something..." v-model="data.address"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" form="profile" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>