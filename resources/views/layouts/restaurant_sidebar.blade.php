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
      <img src="https://emenu-development-api.rorean.com/uploads/images/08489bc6d91115d951554830e6032b94.png" width="40%" style="margin: auto">
  </div>
  
  <div class="res-name">
    <span style="font-size: 1rem">តូបប្រហិត</span>
     
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
        <img style="width: 100%" src="data:image/png;base64, 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" alt="">
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
