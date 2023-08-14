@extends('layouts.master')
@section('style')
    <style>
        .user_image {
            width: 55px;
            height: 55px;
        }
        .show-user {

        }
    </style>
@endsection
@section('content-header')
    {!! generateContentHeader(__('app.user.restaurant-user'), __('app.user.restaurant-user')) !!}
@endsection
@section('content')
<div class="row" id="Users" v-cloak>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row d-flex justify-content-between">
                    <div class="col-md-6">
                        <form action="{{ route('users')}}">
                            <div class="input-group">
                                <input name="search" class="form-control" type="search" placeholder="{{ __('app.user.search-user') }}..." aria-label="Search" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-sm btn-primary" style="border:1; width: 50px;" title="Search">
                                        <i class="far fa-search"></i>
                                    </button>
                                    <a href="{{ route('users') }}" style="border: 0; background-color: #F2F2F2" class="btn btn-default" title="refresh">
                                        <i class="far fa-sync-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-tools mt-1" style="float:right">
                        <button @click="clearData()" class="btn btn-primary btn-sm"  title="Create" data-toggle="modal" data-target="#createUser"><i class="far fa-plus fa-fw"></i>{{ __('app.global.create-new') }}</button>
                        @include('users.create')
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('users.table')
                @include('users.create')
                @include('users.edit')
                @include('users.delete')
            </div>
            <div class="card-footer">
                @include('layouts.pagination')
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer-content')
    <script>
        const restaurant_users = @json($data);
    </script>
    <script src="{{ mix('dist/js/app.js') }}"></script>
    <script src="{{ mix('dist/js/users/user.js')}}"></script>
@endsection
