<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6">
            <h2 class="m-0">Product Categories</h2>
          </div>
          <div class="col-md-6 text-right">
            <div class="card-tools mt-1">
              <button class="btn btn-warning btn-sm rounded-pill"  title="Create Category" data-toggle="modal" data-target="#createCategory"><i class="far fa-plus fa-fw"></i>Create New</button>
              @include('product_categories.create')
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form>
          <div class="row py-3">
            <div class="col-md-3">
                <select name="enable_status" class="form-control">
                    <option value="" @if(request('enable_status') == '') selected @endif>All Status</option>
                    <option value="1" @if(request('enable_status') == '1') selected @endif>Active</option>
                    <option value="0" @if(request('enable_status') == '0') selected @endif>Deactive</option>
                </select>
            </div>
            <div class="col-md-6">

            </div>
            <div class="col-md-3">
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
                  <a href="{{ url('portal/product-categories') }}" class="btn btn-sm btn-danger"><i class="fas fa-sync-alt"></i></a>
                  <button type="submit" class="btn btn-sm btn-warning text-white"><i class="fas fa-filter"></i></button>
              </div>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th scope="col">Category Name</th>
                <th scope="col" class="text-center">Display Sequence</th>
                <th scope="col" class="text-center">Status</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @for($i = 1; $i <= 10; $i++)
              <tr>
                <th scope="row" class="text-center">{{ $i }}</th>
                <td>Drink</td>
                <td class="text-center">0</td>
                <td class="text-center">Active</td>
                <td class="text-center">
                  <button class="btn btn-primary btn-sm" title="Edit" data-toggle="modal" data-target="#editCategory" onclick="$('.name').val(<?php echo $i ?>)"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-danger btn-sm"  title="Delete" data-toggle="modal" data-target="#deleteCategory"><i class="fas fa-trash"></i></button>
                  <div class="text-left">
                     @include('product_categories.edit')
                     @include('product_categories.delete')
                  </div>
                </td>
              </tr>
              @endfor
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        @include('layouts.pagination') 
      </div>
    </div>
  </div>
</div>