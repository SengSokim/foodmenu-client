<div id="editProfile">
  <nav class="main-header navbar navbar-expand navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" data-enable-remember="true"><i class="fas fa-bars"></i></a>
      </li>
      <li style="position: absolute; left: 20%; right: 20%;">
        <form action="{{ route('products') }} " class="form-inline mt-1">
          <div class="input-group input-group-sm" style="width: 100%;">
            <input name="search" class="form-control rounded-pill" type="search" placeholder="{{ __('app.global.search-product') }}..." aria-label="Search" value="{{ request('search') }}" style="border:0; background: #fff">
            <div class="input-group-append">
              <button type="submit" class="btn btn-lg btn-default rounded-pill mx-1" style="border:0; background: #fff" title="Search">
                <i class="far fa-search"></i>
              </button>
              <a href="{{ route('products') }}" class="btn btn-lg btn-default rounded-pill" style="border:0; background: #fff" title="Refresh">
                <i class="far fa-sync-alt"></i>
              </a>
            </div>
          </div>
        </form>
      </li>
      <li class="dropdown" style="position: absolute; right: 120px;">
        <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle" title="Translation">
          <i class="far fa-globe fa-fw" style="size: 40px;">
          </i><span class="caret"></span></a>
        <ul class="dropdown-menu border-1 shadow">
            <li>
                <a class="dropdown-item" rel="alternate" hreflang="{{ 'en' }}" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                    <img src="{{asset('adminlte/dist/img/lang_flag/english.png')}}" style="width: 20px; margin:5px;"> 
                    {{ 'English' }}
                </a>
            </li>
            <li>
                <a class="dropdown-item" rel="alternate" hreflang="{{ 'km' }}" href="{{ LaravelLocalization::getLocalizedURL('km', null, [], true) }}" >
                    <img src="{{asset('adminlte/dist/img/lang_flag/khmer.png')}}" style="width: 20px; margin:5px;"> 
                    {{ 'ភាសាខ្មែរ' }}
                </a>
            </li>
            
        </ul>   
      </li>
      <li class="nav-item dropdown" style="position: absolute; right: 0; margin-top: -6px;cursor: pointer;" id="my-profile" title="Profile">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="border: 0;">
          <img src="{{ $auth->user->media->url ?? asset('adminlte/dist/img/placeholder/square_avatar_placeholder.jpg') }}" class="user-image img-circle elevation-2" alt="User Image" width="30">
          <span class="d-none d-md-inline">{{$auth->user->name ?? 'Unknown' }}</span> 
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#edit-profile" data-toggle="modal" @click="viewProfile">{{ __('app.profile.account') }}</a>
          <a class="dropdown-item" href="{{ route('logout') }}">{{ __('app.profile.logout') }}</a>    
        </div>   
      </li>
    </ul>
  </nav>
  <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="overflow: scroll !important;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{ __('app.profile.edit-profile') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="submit" id="profile" v-cloak>
            <div class="row">
              <div class="col-md-4 offset-md-4">
                <div class="form-group">
                  <img id="user-profile-upload" class="profile-user-img img-fluid img-circle mb-1" :src="data.image ? data.image : (data.media ? data.media.url : '{{ asset('adminlte/dist/img/placeholder/square_avatar_placeholder.jpg') }}')" style="width: 120px; height: 120px">
                  <input type='file' id="user-profile-input" name="image" class="hide-file-name" accept=".jpg,.png" @change="uploadImage"/>
                  <input class="btn-upload btn btn-default form-control" type="button" value="Browse" onclick="document.getElementById('user-profile-input').value='';document.getElementById('user-profile-input').click();" style="width: 120px;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label class="required">{{ __('app.profile.name') }}</label>
                    <input type="text" class="form-control" :class="{'is-invalid': errors.has('name') }" name="name" placeholder="Enter name" v-model="data.name" v-validate="'required'">
                    <div class="invalid-feedback">@{{ errors.first('name') }}</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="required">{{ __('app.profile.gender') }}</label>
                  <select class="form-control" :class="{'is-invalid': errors.has('gender') }"  name="gender" v-select2 v-model="data.gender" v-validate="'required'" style="width: 100%;">
                    <option value="male">{{ __('app.profile.male') }}</option>
                    <option value="female">{{ __('app.profile.female') }}</option>
                  </select>
                  <div class="invalid-feedback">@{{ errors.first('gender') }}</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="required">{{ __('app.profile.phone-number') }}</label>
                  <input type="text" class="form-control" name="phone_number" v-model="data.phone_number" v-validate="'required'" placeholder="Enter phone number" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>{{ __('app.profile.address') }}</label>
                  <textarea name="address" class="form-control" rows="2" placeholder="Type something..." v-model="data.address"></textarea>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default rounded-pill" data-toggle="modal" data-target="#modal-change-password"><i class="fas fa-lock fa-fw"></i>{{ __('app.profile.change-now') }}</button>
          <button type="button" class="btn btn-default rounded-pill" data-dismiss="modal">{{ __('app.global.cancel') }}</button>
          <button type="submit" form="profile" class="btn btn-warning rounded-pill" @click="submit()">{{ __('app.global.save-changes') }}</button>
        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.password.index')