@extends('layouts.master')
@section('content-header')
    
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h4>Users</h4>
        </div>
        <div class="col-md-6 text-right">
            <h5>
                <a href="{{ route('dashboard') }}">Dashboard</a> / Users
            </h5>
        </div>
    </div>
    @include('users.table')
@endsection