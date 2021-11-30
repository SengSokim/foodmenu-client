<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>eMenu</title>

  <!-- Favicon Icon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('adminlte/dist/img/logo/emenu-square-black-bg.png') }}">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
  <div class="container h-100">
    <div class="row align-items-center min-vh-100 ">
        <div class="col-12 mx-auto">
            <div class="card shadow-lg p-3 card-rounded-shape">              
              <div class="row align-items-center">
                <div class="col-md-1"></div>
                <div class="col-md-4 col-sm-6">
                  <div class="header">
                      <img src="{{ asset('images/emenu-black-transparent.png') }}" width="150px" style="margin-left: -9px">
                    <h6 class="mb-4 sub-header">Reset Password</h6>
                  </div>
                  <form action="{{ url('auth/reset') }}" method="POST">
                    @csrf    
                    @php $error = session()->get('error'); @endphp    
                    @include('home.auth.alert_error_message')
                    <div class="form-no-res">
                      <div class="form-group ">
                        <label for="password" class=" d-none d-md-block">New Password</label>
                        <input type="password" class="form-control {{ isset($error['val']['password']) ? 'is-invalid' : '' }}" name="password" id="password">
                        <span class="invalid-feedback" role="alert">{{ $error['val']['password'] ?? ''  }}</span> 
                      </div>
                      <div class="form-group">
                        <label for="confirm_password" class=" d-none d-md-block">Confirm Password</label>
                        <input type="password" class="form-control {{ isset($error['val']['confirm_password']) ? 'is-invalid' : '' }}" name="confirm_password" id="confirm_password">
                        <span class="invalid-feedback" role="alert">{{ $error['val']['confirm_password'] ?? ''  }}</span> 
                      </div>
                    </div>
                    {{-- <div id="form-res">
                      <div class="form-group">
                        <label for="password" class=" d-none d-md-block">New Password</label>
                        <input type="password" class="form-control {{ isset($error['val']['password']) ? 'is-invalid' : '' }}" name="password" id="password" placeholder="Enter New Password">
                        <span class="invalid-feedback" role="alert">{{ $error['val']['password'] ?? ''  }}</span> 
                      </div>
                      <div class="form-group">
                        <label for="confirm_password" class=" d-none d-md-block">Confirm Password</label>
                        <input type="password" class="form-control {{ isset($error['val']['confirm_password']) ? 'is-invalid' : '' }}" name="confirm_password" id="confirm_password" placeholder="Confirm New Password">
                        <span class="invalid-feedback" role="alert">{{ $error['val']['confirm_password'] ?? ''  }}</span> 
                      </div>
                    </div> --}}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="phone_number" value="{{ $phone_number }}">

                    <button class="button-submit" type="submit">Reset Password</button>
                  </form>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 col-sm-6 d-none d-md-block">
                  <img src="{{ asset('adminlte/dist/img/other/reset_password.png') }}" width="100%">
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  //Make responsive placeholder 
  <script>
    if ($(window).width() < 768) {
        $("#password").attr("placeholder", "Enter New Password");
    }
    else {
        $("#password").attr("placeholder", "********");
    }
    $(window).resize(function () {
        if ($(window).width() < 768) {
            $("#password").attr("placeholder", "Enter New Password");
        }
        else {
            $("#password").attr("placeholder", "********");
        }
    });
    if( $(window).width() < 768 ) {
      $("#confirm_password").attr("placeholder", "Confirm New Password");
    } else {
      $("#confirm_password").attr("placeholder", "********");
    }
    $(window).resize( function() {
      if($(window).width() < 768){
        $("#confirm_password").attr("placeholder", "Confirm New Password");
      } else {
        $("#confirm_password").attr("placeholder", "********")
      }
    });
  </script>
</body>
</html>




