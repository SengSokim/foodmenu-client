@extends('layouts.login_master')
@section('style')
    <style>
        .card-rounded-shape {
            border-radius: 10px;
        }

        /* .form-control {
                            border-radius: 20px;
                        } */

        .required {
            color: rgb(240, 3, 3);
        }

        /* #driver {
                            padding: 10px 10px;
                        } */
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-8 mx-auto">
                <div class="card shadow-lg p-3 card-rounded-shape" style="height: 400px;">
                    {{-- <div class="" >
                        <h3 class="text-center">Customer Relationship Management</h3>
                    </div> --}}
                    {{-- <hr> --}}
                    <div class="row align-items-center">
                        <div class="col-md-3"></div>
                        <div class="col-md-7 col-sm-8 mt-5">
                            <h4 class="mb-4 sub-header text-center"><b>Login</b></h4>
                            <form class="login-form" action="{{ url('auth/login') }}" method="post">
                                @csrf
                                @include('auth.alert_error_message')
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" @error('email') is-invalid @enderror
                                        value="{{ old('email') }}" name="email" placeholder="Email">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        class="form-control" name="password" placeholder="Password" id="password">
                                    <div class="input-group-append" style="cursor: pointer;" id="">
                                        <div class="input-group-text">
                                            <span class="fas fa-eye-slash" id="hidePassword" onclick="togglePass()"></span>
                                            <span class="fas fa-eye" id="showPassword" onclick="togglePass()"
                                                style="display: none;"></span>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary col-md-12 mt-3">Login</button>
                            </form>
                        </div>
                        {{-- <div class="col-md-6 col-sm-6 d-none d-md-block">
                            <img src="{{ asset('assets/images/login_image.jpg') }}" width="100%">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <h1><b>Customer Relationship Management</b></h1>
    <h4>If you have forgot password please <a href="{{ url('forget') }}">reset a new password</a> by your email.</h4>
    <div class="mr-5 mt-5">
        <form class="login-form" action="{{ url('login') }}" method="post">
            @csrf
            @include('auth.alert_error_message')
            <div class="input-group mb-3">
                <input type="text" class="form-control" @error('email') is-invalid @enderror value="{{ old('email') }}"
                    name="email" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" class="form-control"
                    name="password" placeholder="Password" id="password">
                <div class="input-group-append" style="cursor: pointer;" id="">
                    <div class="input-group-text">
                        <span class="fas fa-eye-slash" id="hidePassword" onclick="togglePass()"></span>
                        <span class="fas fa-eye" id="showPassword" onclick="togglePass()" style="display: none;"></span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div> --}}
@endsection
