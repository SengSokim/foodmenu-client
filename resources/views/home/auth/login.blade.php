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
              <p class="login-card-description">Sign into your account</p>
              <form action="{{ route('auth.login') }}" method="POST">
                @csrf    
                @include('home.auth.alert_error_message')

                @php $error = session()->get('error'); @endphp    
                <div class="form-group">
                  <label for="phone_number">Phone Number</label>
                  <input type="text" class="form-control {{ isset($error['val']['phone_number']) ? 'is-invalid' : '' }}" name="phone_number" id="phone_number" placeholder="Phone Number">
                  <span class="invalid-feedback" role="alert">{{ $error['val']['phone_number'] ?? ''  }}</span> 
                </div>
               
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control {{ isset($error['val']['password']) ? 'is-invalid' : '' }}" name="password" id="password" placeholder="******">
                  <span class="invalid-feedback" role="alert">{{ $error['val']['password'] ?? ''  }}</span> 
                </div>
                <button class="login-card login-btn" type="submit">login</button>
              </form>

              <p>
                <a class="register-here" href="{{ url('auth/forget') }}">Forgot password?</a>
              </p>

              <p class="login-card-footer-text">Don't have an account? <a href="{{ route('home') }}" class="register-here">Register here</a></p>
              {{-- <nav class="login-card-footer-nav">
                <a href="#">Terms of use.</a>
                <a href="#">Privacy policy</a>
              </nav> --}}
            </div>
          </div>
          <div class="col-md-7">
            <img src="{{ asset('images/banner3.png') }}" alt="login" class="login-card-img">
          </div>
          
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog" >
        <div class="modal-content" style="padding: 5vh;">
            <form action="#" id="fromfroget-password" >
              <center><img src="images/emenu-black-transparent.png" alt="" style="width: 150px;">
              <h5 style="font-weight: 600;margin: 0;">Reset Your Password</h5>
              <p>Enter your PhoneNumber below to reset your password</p></center>
                <div class="field">
                  <label for="validationCustom062">Phone Number</label>
                  <input type="phonenumber" class="form-control" id="validationCustom045" required>
                  <div class="invalid-feedback">
                    Please provide a valid Phone Number.
                  </div>							
                </div>
              <center><button class="btn btn-passwordReset" style="margin:2vh" >Reset password</button></center>
            </form>
        </div>
      </div>
    </div>
  </main>
  <script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
      var forms = document.getElementsByClassName('needs-validation');
      var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
      }
      form.classList.add('was-validated');
      }, false);
      });
      }, false);
    })();
  </script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>




