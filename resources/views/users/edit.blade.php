@extends('layouts.master')
@section('content-header')
{!! generateContentHeader('Users','Users', 'Edit') !!}
<div class="button mt-2 ml-2">
  <a href="{{ route('users') }}" class="btn btn-default"><i class="fas fa-share fa-flip-horizontal fa-fw"></i>Back</a>
  <button type="submit" form="editUser" class="btn btn-primary"><i class="fas fa-save fa-fw"></i> Save Changes</button>
  @if(checkPermission($auth->user->permissions, 'user-update-password'))
    <button class="btn btn-success" data-toggle="modal" data-target="#update-password"><i class="fas fa-lock"></i> Change Password</button>
  @endif
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">User Information</h3>
      </div>
      <div class="card-body p-0">
        <div class="bs-stepper linear">
          <div class="bs-stepper-content">
            <form @submit.prevent="submit" id="editUser" v-cloak>
              @include('users.form')
            </form>
            @include('users.change-password')
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer-content')
    <script>
        const data = @json($data);
    </script>
    <script src="{{ mix('dist/js/app.js') }}"></script>
    <script src="{{ mix('dist/js/users/edit.js') }}"></script>
    <script type="text/javascript">
        $(".select2").select2();
    </script>
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

      var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

      function validatePassword(){
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Confirm password does not match");
          $('#error_confirm_password').html('Confirm password does not match')
        } else {
          $('#error_confirm_password').html('')
          confirm_password.setCustomValidity('');
        }

        if(!password.value) {
          $('#error_password').html('The password field is required.')
        } else if(password.value.length < 8) {
          $('#error_password').html('The Password must be at least 8 characters.')
        }

        if(!confirm_password.value) {
          $('#error_confirm_password').html('The confirm password field is required.')
        }
      }
      
      password.onkeyup = validatePassword;
      confirm_password.onkeyup = validatePassword;

    </script>
@endsection
