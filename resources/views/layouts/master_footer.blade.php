{{-- <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
    var OneSignal = window.OneSignal || [];

    OneSignal.push(function() {
        OneSignal.init({
            appId: @json(config('onesignal.app_id')),
            safari_web_id: @json(config('onesignal.safari_web_id')),
            autoRegister: true,
            notifyButton: {
                enable: false
            }
        });

        OneSignal.sendTags({
            'id': @json($auth->user->id ?? null)
        });

        OneSignal.isPushNotificationsEnabled(function(isEnabled) {
            if (isEnabled) {
                OneSignal.getUserId( function(userId) {
                    axios.post('subscribe', {
                        'player_id': userId
                    });
                });
            }
        });
    });
</script> --}}
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Fontawesome 5-->
<script src="{{ asset('adminlte/plugins/fontawesome-free/js/all.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- croppie -->
<script src="{{ asset('adminlte/plugins/croppie-2.6.4/croppie.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('adminlte/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<!-- Lity -->
<script src="{{ asset('adminlte/plugins/lity-2.4.1/dist/lity.js') }}"></script>
<script src="{{ mix('dist/js/general.js') }}"></script>
<script src="{{ asset('/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('loading/jquery.loading.min.js') }}"></script>
<script src="{{ asset('/plugins/confirm/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('/plugins/toastr/toastr.min.js')}}"></script>

 <!-- Jquery toast -->
 <script src="{{ asset('toast/jquery.toast.min.js') }}"></script>
 <script src="{{ asset('confirm/jquery-confirm.min.js') }}"></script>


   <!-- Helper -->
<script src="{{ asset('js/helper.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
 <!-- chart js -->

@yield('footer-content')
<script>
    @if(isset($auth->user))
    var profile = {
        name: "{{$auth->user->name}}",
        phone: "{{$auth->user->phone}}",
        email: "{{$auth->user->email}}",
        image: "{{$auth->user->image}}",
    };
    @endif

    // $(function () {
    //     //Date picker
    //     $('#date_picker_from_date').datetimepicker({
    //         format: "YYYY-MM-DD",
    //     });

    //     $('#date_picker_to_date').datetimepicker({
    //         format: "YYYY-MM-DD",
    //     });

    //     $(".select2").select2({
    //         placeholder : "Select an option"
    //     });

    //     $(".member_id_select2").select2({
    //         placeholder : "Select Member"
    //     });

    //     $(".leader_id_select2").select2({
    //         placeholder : "Select Leader"
    //     });
    // });

</script>
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
      } else if(idClicked == 'user-input') {
        viewport={width:300, height:300};
        result={width:400, height:400};
        isImgInput = 4;
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

    $('#user-profile-input, #restaurant-profile-input, #restaurant-banner-input, #product-input, #user-input').on('change', function(){
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
          app.data.image = res
        }else if(isImgInput == 3){
          $('#user-profile-upload').attr('src', res);
          editProfile.data.image = res
        }else if(isImgInput == 4) {
          $('#user-upload').attr('src', res);
          Users.data.image = res
        }
      })
    })

    var is_show_restaurant = false;
    function showInfo() {
      var x = document.getElementById("responsive-qr");
      if(!is_show_restaurant) {
          x.style.display = "block";
          x.style.width = "100%";
          x.style.height = "100%";
          x.style.overflow = "scroll";
      }
      else {
          x.style.display = "none";
          x.style.marginTop = "0px";
          is_show_restaurant = false;
      }
    }
    $(document).ready(function(){
      $(".btnclose").click(function(){
        $("#responsive-qr").hide();
      });
    });
    Vue.filter('str_limit', function (value, size) {
      if (!value) return '';
      value = value.toString();

      if (value.length <= size) {
        return value;
      }
      return value.substr(0, size) + '...';
    });

  </script>
</body>

</html>
