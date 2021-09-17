<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-12">
              <div class="card-tools mt-1" style="float:right">
                <button class="btn btn-warning btn-sm rounded-pill"  title="Create" data-toggle="modal" data-target="#createUser"><i class="far fa-plus fa-fw"></i>Create New</button>
                @include('users.create')
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form>
            <div class="row py-3"> 
                <div class="col-md-3">
                    <select name="role" class="form-control">
                        <option value="" @if(request('role') == '') selected @endif>All Role</option>
                        <option value="admin" @if(request('role') == 'admin') selected @endif>Admin</option>
                        <option value="manager" @if(request('role') == 'manager') selected @endif>Manager</option>
                        <option value="hr" @if(request('role') == 'hr') selected @endif>HR</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="enable_status" class="form-control">
                        <option value="" @if(request('enable_status') == '') selected @endif>All Status</option>
                        <option value="1" @if(request('enable_status') == '1') selected @endif>Active</option>
                        <option value="0" @if(request('enable_status') == '0') selected @endif>Deactive</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-sm btn-info text-white">Filter <i class="fas fa-filter"></i></button>
                    <a href="{{ url('portal/product-categories') }}" class="btn btn-sm btn-danger">Clear <i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
          </form>
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr class="text-center">
                  <th>#</th>
                  <th>Image</th>
                  <th scope="col">Name</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @for($i = 1; $i <= 5; $i++)
                <tr class="text-center">
                  <td>{{ $i }}</td>
                  <td><img src="{{ asset('img/avatar'.$i.'.png')}}" width="40px"></td>
                  <td class="text-left">Hun Sovanneth</td>
                  <td>Male</td>
                  <td>0966206029</td>
                  <td>Admin</td>
                  <td>Active</td>
                  <td>
                    <button class="btn btn-primary btn-sm" title="Edit" data-toggle="modal" data-target="#editUser" onclick="$('.name').val(<?php echo $i ?>)"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm"  title="Delete" data-toggle="modal" data-target="#deleteUser"><i class="fas fa-trash"></i></button>
                    <div class="text-left">
                       @include('users.edit')
                       @include('users.delete')
                    </div>
                  </td>
                </tr>
                @endfor
              </tbody>
            </table>
          </div>
        </div>
        <div class="row card-footer">
            <div class="col-md-6">
                <h5>Total: <span class="text-danger">{{ $i - 1 }}</span>{{ $i - 1 > 1 ? 'records' : 'record' }}</h5>
            </div>
            <div class="col-md-6">
                @include('layouts.pagination') 
            </div>
        </div>
      </div>
    </div>
  </div>