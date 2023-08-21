@extends('layouts.master')
@section('content-header')
{!! generateContentHeader('Users','Users') !!}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <div class="card-tools">
            @if(checkPermission($auth->user->permissions, 'user-create'))
              <a href="{{route('users.create')}}" class="btn btn-primary"><i class="far fa-plus fa-fw"></i>Add New </a>
            @endif
          </div>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-md-3 mb-3">
                      <input type="text" class="form-control" name="search" placeholder="Search by Name | Phone | Email" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <select name="role_id" class="form-control">
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                               <option value="{{ $role->id }}" @if(request('role_id') == $role->id) selected @endif>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                      <select name="is_active" class="form-control">
                          <option value="">Select Status</option>
                          <option value="1" @if(request('is_active') == '1') selected @endif>Active</option>
                          <option value="0" @if(request('is_active') == '0') selected @endif>Deactive</option>
                      </select>
                    </div>
                    <div class="col-md-3 mb-3">
                      <select name="gender" class="form-control">
                          <option value="">Select Gender</option>
                          <option value="male" @if(request('gender') == 'male') selected @endif>Male</option>
                          <option value="female" @if(request('gender') == 'female') selected @endif>Female</option>
                      </select>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-info text-white">Filter <i class="fas fa-filter"></i></button>
                    <a href="{{ url('admin/users') }}" class="btn btn-danger">
                        Clear
                        <i class="fas fa-sync-alt"></i>
                    </a>
                  </div>
                </div>
            </form>
            <br>
            @include('users.table')
            @include('layouts.pagination')
        </div>
        </div>
    </div>
</div>
@endsection
