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
                  <h6 class="mb-4 sub-header">SMS Verification Code</h6>
                </div>
                <form action="{{ url('auth/verify') }}" method="POST">
                  @csrf    
                  @php $error = session()->get('error'); @endphp    
                  @include('home.auth.alert_error_message')

                  <div class="form-group">
                    <label for="verify_code" class=" d-none d-md-block">Code</label>
                    <input type="text" class="form-control {{ isset($error['val']['verify_code']) ? 'is-invalid' : '' }}" value="{{ old('verify_code', request('code')) }}" name="verify_code" id="verify_code" placeholder="xxxx">
                    <span class="invalid-feedback" role="alert">{{ $error['val']['verify_code'] ?? ''  }}</span> 
                  </div>

                  <input type="hidden" name="phone_number" value="{{ request('phone_number') }}">


                  <button class="button-submit" type="submit">Send Verify Code</button>
                </form>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-6 col-sm-6 d-none d-md-block">
                <img src="{{ asset('adminlte/dist/img/other/verify_code.png') }}" width="100%">
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




