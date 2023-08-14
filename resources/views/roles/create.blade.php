@extends('layouts.master')
@section('header-content')
    <style>
        table td {
            padding-left: 20px;
            width: 140px;
            font-size: 15px
        }

        table th {
            padding-top: 10px
        }
    </style>
@endsection
@section('content-header')
    {!! generateContentHeader('Role', 'Roles', 'Add New') !!}
    <div class="button mt-2 ml-2">
        <a href="{{ route('roles') }}" class="btn btn-default"><i class="fas fa-share fa-flip-horizontal fa-fw"></i>Back</a>
        <button type="submit" form="createRole" class="btn btn-primary"><i class="fas fa-save fa-fw"></i>Save</button>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Role Information</h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent="submit" id="createRole" v-cloak>
                        @include('roles.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer-content')
    <script>
        var createRole;
    </script>
    <script src="{{ mix('dist/js/app.js') }}"></script>
    <script src="{{ mix('dist/js/roles/create.js') }}"></script>
@endsection
