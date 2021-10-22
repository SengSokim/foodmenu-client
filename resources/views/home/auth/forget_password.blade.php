<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>eMenu</title>

  <!-- Favicon Icon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('adminlte/dist/img/logo/emenu-square-black-bg.png') }}">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.css') }}">
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body style="background-color: #d0d0ce">
  <div class="container h-100">
    <div class="row align-items-center min-vh-100 ">
      <div class="col-12 mx-auto">
          <div class="card shadow-lg p-3 card-rounded-shape">
            <div class="row align-items-center">
              <div class="col-md-1"></div>
              <div class="col-md-4 col-sm-6">
                <div class="header">
                    <img src="{{ asset('images/emenu-black-transparent.png') }}" width="150px" style="margin-left: -9px">
                  <h6 class="mb-4 sub-header">Reset password</h6>
                </div>
                <form action="{{ url('auth/forget') }}" method="POST">
                  @csrf    
                  @php $error = session()->get('error'); @endphp    
                  @include('home.auth.alert_error_message')

                  <div class="form-group">
                    <label for="phone_number" class=" d-none d-md-block">Phone Number</label>
                    <input type="text" class="form-control {{ isset($error['val']['phone_number']) ? 'is-invalid' : '' }}" name="phone_number" id="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}">
                    <span class="invalid-feedback" role="alert">{{ $error['val']['phone_number'] ?? ''  }}</span> 
                  </div>

                  <button class="button-submit" type="submit">Send Verify Code</button>
                </form>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-6 col-sm-6 d-none d-md-block">
                <img src="{{ asset('adminlte/dist/img/other/send_phone_number.png') }}" width="100%">
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>




