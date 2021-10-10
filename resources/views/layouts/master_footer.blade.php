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
 
  <!-- Summernote -->
  <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- croppie -->
  <script src="{{ asset('adminlte/plugins/croppie-2.6.4/croppie.js') }}"></script>
  <!-- Select2 -->
  <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
  <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>

  <script src="{{ mix('dist/js/app.js') }}"></script>
  <!-- Jquery toast -->
 <script src="{{ asset('adminlte/plugins/loading/jquery.loading.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/toast/jquery.toast.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/confirm/jquery-confirm.min.js') }}"></script>
 <!-- Helper -->
 <script src="{{ asset('js/helper.js') }}"></script>
  @yield('footer-content')

  <script src="{{ mix('dist/js/profile/profile.js') }}"></script>
  <script src="{{ mix('dist/js/restaurants/edit.js') }}"></script>
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

    $("#restaurant-profile-input").change(function(){
        readURL_RP(this);
    });

    function readURL_RB(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#restaurant-banner-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#restaurant-banner-input").change(function(){
        readURL_RB(this);
    });

  </script> 
</html>
