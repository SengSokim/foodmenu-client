@extends('layouts.login_master')
@section('content')
<h1><b>Register Account</b></h1>
<h4>Please fill the require information</h4>
<div class="mr-5 mt-5">
    <form class="login-form" action="{{ url('register') }}" method="post">
        @csrf
        @include('auth.alert_error_message')
        <div class="input-group mb-3">
            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                value="{{ old('name') }}" name="name" placeholder="Company Name">
        </div>
        <div class="input-group mb-3">
            <input type="number" class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone') }}" name="phone" value="{{ old('phone') }}" placeholder="Phone">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <p class="mb-1">
        <a href="{{url('login')}}">Login now?</a>
    </p>
</div>
@endsection
