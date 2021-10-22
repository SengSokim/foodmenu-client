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
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="{{ asset('images/emenu-black-transparent.png') }}" alt="" style="width: 150px;">
              </div>
              <p class="login-card-description">SMS Verification Code</p>
              <form action="{{ url('auth/verify') }}" method="POST">
                @csrf    
                @php $error = session()->get('error'); @endphp    
                @include('home.auth.alert_error_message')
                
                <div class="form-group">
                  <label for="code">Code</label>
                  <input type="text" class="form-control {{ isset($error['val']['verify_code']) ? 'is-invalid' : '' }}" value="{{ old('verify_code', request('code')) }}" name="verify_code" id="verify_code" placeholder="xxxx">
                  <span class="invalid-feedback" role="alert">{{ $error['val']['verify_code'] ?? ''  }}</span> 
                  <input type="hidden" name="phone_number" value="{{ request('phone_number') }}">
                </div>
                <button class="login-card login-btn" type="submit">Submit</button>
              </form>
            </div>
          </div>
          <div class="col-md-7">
            <img src="{{ asset('adminlte/dist/img/other/verify_code.png') }}" alt="login" class="login-card-img ml-5" style="width: 80%;">
          </div>
          
        </div>
      </div>
    </div>
  </main>
  <script>
  </script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>




