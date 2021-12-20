@extends('layouts.master')
@section('content-header')
{!! generateContentHeader( __('app.table.restaurant-table'), __('app.table.restaurant-table')) !!}
@endsection
@section('content')
<div class="row" id="RestaurantTables">
  <div class="col-md-12" v-cloak>
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-12 d-flex justify-content-between">
            <div class="col-md-4">
              <form action="{{ route('tables')}}">
                <div class="input-group">
                    <input name="search" class="form-control" type="search" placeholder="{{ __('app.table.search-table') }}..." aria-label="Search" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-sm" style="border:1; width: 50px; background: #FFC107" title="Search">
                            <i class="far fa-search"></i>
                        </button>
                        <a href="{{ route('tables') }}" style="border: 0; background-color: #F2F2F2" class="btn btn-default" title="refresh">
                            <i class="far fa-sync-alt"></i>
                        </a>
                    </div>
                </div>
              </form>
            </div>
            <div class="card-tools mt-1" style="float:right">
              <button class="btn btn-warning btn-sm rounded-pill" @click="clearData()" title="Create Table" data-toggle="modal" data-target="#modal-table"><i class="far fa-plus fa-fw"></i>{{ __('app.global.create-new') }}</button>
              @include('tables.create')
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        @include('tables.table')  
        @include('tables.edit')
        @include('tables.delete')
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
    const restaurant_tables = @json($data)
</script>
    <script src="{{ mix('dist/js/tables/table.js')}}"></script>
@endsection