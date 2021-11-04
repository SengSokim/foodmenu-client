  <!-- jQuery -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 
  <!-- Fontawesome 5-->
  <script src="{{ asset('adminlte/plugins/fontawesome-free/js/all.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
   <!-- Helper -->
  <script src="{{ asset('js/helper.js') }}"></script>
    
  <!-- Jquery toast -->
  <script src="{{ asset('loading/jquery.loading.min.js') }}"></script>
  <script src="{{ asset('toast/jquery.toast.min.js') }}"></script>
  <script src="{{ asset('confirm/jquery-confirm.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- Select2 -->
  <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
  <!-- lity -->
  <script src="{{ asset('assets/plugins/lity/lity.js') }}"></script>
  <!-- croppie -->
  <script src="{{ asset('adminlte/plugins/croppie-2.6.4/croppie.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
  <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>

  <script src="{{ mix('dist/js/app.js') }}"></script>
  <script>
    let EditRestaurant;
    let editProfile;
    const search = <?php echo ("'".request('search')."'" ?? "''") ?> ;
  </script>
  <script src="{{ mix('dist/js/restaurants/edit.js') }}"></script>
 
  @yield('footer-content')
  <script src="{{ mix('dist/js/profile/profile.js') }}"></script>
  <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
  
        reader.onload = function (e) {
            $('#user-profile-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
  
    $("#user-profile-input").change(function(){
        readURL(this);
    });
  
    function readURL_RP(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#restaurant-profile-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    var image_crop = $('#image-crop').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport:{width: 300, height: 300},
        boundary:{width: 400, height: 400}
    });    

    var imageBind;
    var isImgInput =0 ;
    var result={width: 1080, height: 1080};  

    $('input[type=file]').change(function(e){
      var idClicked= e.target.id;
      image_crop.croppie('destroy');
      if(idClicked == 'restaurant-profile-input'){
        viewport={width: 300, height: 300};
        result={width: 400, height: 400};  
        isImgInput = 1;
        $('#square').show()
        $('#landscape').hide()
      }else if(idClicked == 'restaurant-banner-input'){
        viewport={width: 300, height: 168};
        result={width: 1080, height: 608}; 
        isImgInput = 0;
        $('#square').hide()
        $('#landscape').show()
      }else if(idClicked == 'product-input'){
        viewport={width: 300, height: 300};
        result={width: 400, height: 400}; 
        isImgInput = 2;
        $('#square').hide()
        $('#landscape').hide()
      }else if(idClicked == 'user-profile-input'){
        viewport={width: 300, height: 300};
        result={width: 400, height: 400}; 
        isImgInput = 3;
        $('#square').hide()
        $('#landscape').hide()
      }

      image_crop = $('#image-crop').croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: viewport,
        boundary: {width:400, height:400}
      });
    });

    $('#user-profile-input, #restaurant-profile-input, #restaurant-banner-input, #product-input').on('change', function(){
      var reader = new FileReader();
      reader.onload = function (event) {
        imageBind = event.target.result;
        image_crop.croppie('bind', {
          url: event.target.result,
        })
      }
      reader.readAsDataURL(this.files[0]);
      $('#modal-crop-image').modal('show');
    });
    
    $('.submit-crop').click(function(){
      image_crop.croppie('result', {
        type: 'base64',
        size: result,
        quality: 1,
      }).then(function(res){
        $('#modal-crop-image').modal('hide');
        if(isImgInput == 1){
          $('#restaurant-profile-upload').attr('src', res);
          EditRestaurant.data.image = res
        }
        else if(isImgInput == 0){
          $('#restaurant-banner-upload').attr('src', res);
          EditRestaurant.data.banner_image = res
        }else if(isImgInput == 2){
          $('#product-upload').attr('src', res);
          Product.data.image = res
        }else if(isImgInput == 3){
          $('#user-profile-upload').attr('src', res);
          editProfile.data.image = res
        }
      })
    })
  </script> 
</html>
