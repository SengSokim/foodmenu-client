@extends('layouts.master')
@section('content-header')
    {!! generateContentHeader('Roles', 'Roles') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        @if (checkPermission($auth->user->permissions, 'roles-create'))
                            <a href="{{ route('roles.create') }}" class="btn btn-primary">
                                <i class="far fa-plus fa-fw"></i>
                                Add New
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <form action="" id="Filter">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search"
                                            placeholder="Search by Name" value="{{ request('search') }}">
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-default"> <i
                                                    class="fas fa-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('admin/roles') }}" class="btn btn-danger"> <i
                                            class="fas fa-sync-alt"></i> Clear</a>
                                    <button class="btn btn-info text-white"> <i class="fas fa-filter"></i> Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @include('roles.table')
                    @include('layouts.pagination')
                </div>
            </div>
        </div>
    </div>
@endsection
