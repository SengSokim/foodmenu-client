<style>
  div ul li{
    list-style-type: none;
  }

  .res-name{
    font-weight: bold;
    margin: 8px -25px 8px 8px;
    text-align: center
  }

  .res-qrcode{
    margin: 20px 10px
  }

  .card-body{
    padding: 0.5rem !important;
  }

  .scan-for-menu{
    text-align: center;
    margin-top: -10px
  }

  .poweredby{
    text-align: center;
    position: fixed;
    bottom: 10px
  }


</style>
<div class="sidebar restaurant-sidebar" style="height: 100vh" id="editRestaurant">
  <div class="row pull-right">
    <div class="col-md-12">
      <div class="p-1 mt-1 float-right">
        <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#edit-restaurant" title="Edit"  @click="showRestaurant">
          <i class="fa fa-edit"></i>
        </button>
        <div class="modal fade" id="edit-restaurant" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Restaurant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form @submit.prevent="submit" v-cloak id="submitUpdateRestaurant">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-4 offset-md-4">
                          <div class="form-group">
                            <img id="restaurant-profile-upload" class="img-fluid mb-1" :src="data.image ? data.image : (data.media ? data.media.url : '{{ asset('adminlte/dist/img/placeholder/square-placeholder.png') }}')" style="width: 110px;">
                            <input type='file' id="restaurant-profile-input" name="image" :class="{'is-invalid': errors.has('image') }" accept=".jpg,.png" style="display: none" @change="uploadProfile"/>
                            <input class="btn-upload btn btn-primary form-control" type="button" value="Browse" onclick="document.getElementById('restaurant-profile-input').value='';document.getElementById('restaurant-profile-input').click();"  style="width: 110px;">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-8 offset-md-2">
                          <div class="form-group">
                            <img id="restaurant-banner-upload" class="img-fluid mb-1" :src="data.banner_image ? data.banner_image : (data.banner ? data.banner.url : '{{ asset('adminlte/dist/img/placeholder/landscape_placeholder.png') }}')" style="width: 300px; height: 168.75px;">
                            <input type='file' id="restaurant-banner-input" name="banner" :class="{'is-invalid': errors.has('banner') }" accept=".jpg,.png" style="display: none" @change="uploadBanner"/>
                            <input class="btn-upload btn btn-primary form-control" type="button" value="Browse" onclick="document.getElementById('restaurant-banner-input').value='';document.getElementById('restaurant-banner-input').click();">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Restaurant Name</label>
                        <input type="text" name="name" class="form-control" :class="{'is-invalid': errors.has('name') }" v-model="data.name" placeholder="Restaurant name"/> 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Restaurant Code</label>
                        <input type="text" name="code" class="form-control" v-model="data.code" placeholder="code"/> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Website URL</label>
                        <input type="text" name="website_url" class="form-control" v-model="data.website_url" placeholder="www.emenu.com"/> 
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" v-model="data.email" placeholder="abc@example.com"/> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" :class="{'is-invalid': errors.has('phone_number') }" v-model="data.phone_number"  data-vv-as="phone number"/> 
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Other Phone Number</label>
                        <input type="text" name="other_phone_number" class="form-control" v-model="data.other_phone_number"/> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Telegram User</label>
                        <input type="text" name="telegram_user" class="form-control" v-model="data.telegram_user" placeholder="Telegram Username"/> 
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Telegram Group</label>
                        <input type="text" name="telegram_group" class="form-control" v-model="data.telegram_group" placeholder="Telegram Group"/> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control" v-model="data.latitude" placeholder="0"/> 
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" v-model="data.longitude" placeholder="0"/> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                        <label>About</label>
                        <textarea rows="5" class="form-control" v-model="data.about"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                        <label>Address</label>
                        <textarea rows="5" class="form-control" v-model="data.address"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label><input type="checkbox" v-model="data.is_can_order">Available Order</label>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" form="submitUpdateRestaurant" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center mt-5">
    <img class="img-circle" src="{{ $restaurant_info->media->url ?? asset('adminlte/dist/img/placeholder/square-placeholder.png')}}" width="40%" style="margin: auto">
  </div>
  
  <div class="res-name dropdown">
    <button class="btn btn-transparent btn-sm" type="button" title="share link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span style="font-size: 1rem" class="text-warning">{{ $restaurant_info->name ?? '' }}</span>
     
      <i class="far fa-share-all text-warning" style="opacity:1; font-size: 15px;"></i>
    </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ $restaurant_info->website_url }}&display=popup" target="_blank"><i class="fab fa-facebook fa-fw"></i>Facebook</a>
        <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ $restaurant_info->website_url }}" target="_blank"><i class="fab fa-twitter fa-fw"></i>Twitter</a>
        <a class="dropdown-item" href="https://t.me/share/url?url={{ $restaurant_info->website_url }}" target="_blank"><i class="fab fa-telegram fa-fw"></i>Telegram</a>
        <a class="dropdown-item" href="#" @click.stop.prevent="copySharableLink">
          <input type="hidden" :value="'{!! $restaurant_info->website_url !!}'" id="share-link">
          <i class="far fa-link fa-fw"></i>Copy Link</a>
      </div>
  </div> 

  <div class="res-qrcode">
    <div class="card">
      <div class="card-body">
        <img src="data:image/png;base64, 
          {!! base64_encode(QrCode::format('png')
          ->merge('adminlte/dist/img/logo/emenu-square-black-bg-with-stroke.png', .3, true)
          ->size(300)
          ->errorCorrection('H')
          ->generate($restaurant_info->website_url ?? '' )) !!} " style="width: 100%">
      </div>
    </div>
  </div>  
  <div class="scan-for-menu">
    <span>Scan For Menu</span>
  </div>

  <div class="poweredby">
    <p>Powered By</p>
    <img src="{{ asset('adminlte/dist/img/logo/papa-deliver.png') }}" alt="" width="15%">
  </div>
</div>
@include('layouts.modal-crop-image')