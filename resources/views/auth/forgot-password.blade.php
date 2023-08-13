@extends('layouts.login_master')
@section('content')
<h1><b>Forgot Password</b></h1>
<h4>Please fill your email</h4>
<div class="mr-5 mt-5">
    <form class="forget-form" action="{{ url('forget') }}" method="post">
        @csrf
        @include('auth.alert_error_message')
        <div class="input-group mb-3 {{ isset($error['val']['email']) ? 'has-error' : '' }}">
            <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            </span>
        </div>
        <a class="btn btn-danger" href="{{ url('login') }}">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    {{-- <p class="mt-3 mb-1">
        <a href="{{ url('login')}}">Back</a>
    </p> --}}
</div>
@endsection
