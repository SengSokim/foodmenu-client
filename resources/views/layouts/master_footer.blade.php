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

 {{-- <!-- Jquery toast -->
 <script src="{{ asset('toast/jquery.toast.min.js') }}"></script>
 <script src="{{ asset('confirm/jquery-confirm.min.js') }}"></script> --}}


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


</script>

</body>

</html>
