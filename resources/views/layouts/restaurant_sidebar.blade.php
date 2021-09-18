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
<div class="sidebar restaurant-sidebar" style="height: 100vh">
  <div class="row pull-right">
    <div class="col-md-12">
      <div class="p-1 mt-1 float-right">
        <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editRestaurant">
          <i class="fa fa-eye"></i>
        </button>
        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#editRestaurant">
          <i class="fa fa-edit"></i>
        </button>
        <div class="modal fade" id="editRestaurant" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Restaurant</h5>
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
      </div>
    </div>
  </div>
  <div class="text-center mt-5">
      <img src="{{ $restaurant_info->media->url ?? asset('adminlte/dist/img/placeholder/square-placeholder.png')}}" width="40%" style="margin: auto">
  </div>
  
  <div class="res-name">
    <span style="font-size: 1rem">{{ $restaurant_info->name ?? '' }}</span>
     
    <button class="btn btn-transparent btn-sm" type="button" title="share link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-share-all" style="opacity: 0.5; font-size: 15px;"></i>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#"><i class="fab fa-facebook fa-fw"></i>Facebook</a>
        <a class="dropdown-item" href="#"><i class="fab fa-telegram fa-fw"></i>Telegram</a>
        <a class="dropdown-item" href="#"><i class="fab fa-instagram fa-fw"></i>Instagram</a>
        <a class="dropdown-item" href="#"><i class="far fa-link fa-fw"></i>Copy Link</a>
      </div>
    </button>
  </div>

  <div class="res-qrcode">
    <div class="card">
      <div class="card-body">
        <img src="data:image/png;base64, 
          {!! base64_encode(QrCode::format('png')
          ->merge('https://emenu-development-admin.rorean.com/adminlte/img/emenu-square-black-bg.png', .3, true)
          ->size(300)
          ->generate($restaurant_info->website_url ?? '' )) !!} " style="width: 100%">
      </div>
    </div>
  </div>  
  <div class="scan-for-menu">
    <span>Scan For Menu</span>
  </div>

  <div class="poweredby">
    <p>Powered By</p>
    <img src="{{ asset('adminlte/dist/img/logo/emenu-black-transparent.png') }}" alt="" width="15%">
    <img src="{{ asset('adminlte/dist/img/logo/papa-deliver.png') }}" alt="" width="15%">
  </div>
</div>
