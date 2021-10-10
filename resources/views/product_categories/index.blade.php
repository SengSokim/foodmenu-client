@extends('layouts.master')
@section('content-header')
{!! generateContentHeader('Product Categories', 'Product Categories') !!}
@endsection
@section('content')
<div class="row" id="productCategory">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-12">
            <div class="card-tools mt-1" style="float:right">
              <button class="btn btn-warning btn-sm rounded-pill" @click="clearData()" title="Create Category" data-toggle="modal" data-target="#modal-category"><i class="far fa-plus fa-fw"></i>Create New</button>
              @include('product_categories.create')
            </div>
          </div>
        </div>
      </div>
      {{-- <form>
        <div class="row py-3 px-3">
          <div class="col-md-3">
            <div class="form-group">
              <label>Status</label>
              <select name="enable_status" class="form-control">
                  <option value="" @if(request('enable_status') == '') selected @endif>All</option>
                  <option value="1" @if(request('enable_status') == '1') selected @endif>Active</option>
                  <option value="0" @if(request('enable_status') == '0') selected @endif>Deactive</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Search</label>
              <div class="input-group">
                <input type="search" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search..." >
              </div>
            </div>
          </div>
        </div>
        <div class="row pb-3 px-3">
          <div class="col-md-12">
            <button type="submit" class="btn btn-sm btn-info text-white">Filter <i class="fas fa-filter"></i></button>
            <a href="{{ url('portal/product-categories') }}" class="btn btn-sm btn-danger">Clear <i class="fas fa-sync-alt"></i></a>
          </div>
        </div>
      </form> --}}
      <div class="card-body">
        @include('product_categories.table')  
        @include('product_categories.edit')
        @include('product_categories.delete')
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
    const product_categories = @json($data)
  </script>
  <script src="{{ mix('dist/js/product-categories/product-category.js') }}"></script>
@endsection