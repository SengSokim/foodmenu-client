@extends('layouts.login_master')
@section('content')
<h1><b>Reset Password</b></h1>
<h4>Please fill the require information</h4>
<div class="mr-5 mt-5">
    <form class="forget-form" action="{{ url('reset-password') }}" method="post">
        @csrf
        @include('auth.alert_error_message')
        @php $error = session()->get('error'); @endphp
        <div class="input-group mb-3 {{ isset($error['val']['password']) ? 'has-error' : '' }}">
            <input type="password" class="form-control" name="password" placeholder="New Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3 {{ isset($error['val']['confirm_password']) ? 'has-error' : '' }}">
            <input type="password" class="form-control" name="confirm_password"
                placeholder="Confrim Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <input type="hidden" name="phone" value="{{$phone}}">
        <input type="hidden" name="code" value="{{request('code')}}">
        <input type="hidden" name="token" value="{{$token}}">
        <button type="submit" class="btn btn-primary">Save Change</button>
    </form>
    <p class="mt-3 mb-1">
        <a href="{{url('verify-code/'.$phone.'?code='.request('code'))}}">Back</a>
    </p>
</div>
@endsection
