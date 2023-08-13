@extends('layouts.login_master')
@section('content')
<h1><b>Verification</b></h1>
<h4>Please fill the require information</h4>
<div class="mr-5 mt-5">
    {{-- <p class="login-box-msg">{{__('general.verification_screen_label')}}</p> --}}
    <form class="forget-form" action="{{ url('verify-code') }}" method="post">
        @csrf
        @include('auth.alert_error_message')
        @php $error = session()->get('error'); @endphp
        <div class="input-group mb-3 {{ isset($error['val']['verify_code']) ? 'has-error' : '' }}">
            <input type="text" class="form-control" value="{{request('verify_code')}}" name="verify_code"
                placeholder="Verify Code">
        </div>
        <input type="hidden" name="phone" value="{{$phone}}">
        <input type="hidden" name="code" value="{{request('code')}}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <p class="mt-3 mb-1">
        <a href="{{url('forget')}}">Back</a>
    </p>
</div>
@endsection
