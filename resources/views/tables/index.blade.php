@extends('layouts.master')
@section('content-header')
    {!!generateContentHeader('Restaurant Tables', 'Restaurant Tables' )!!}
@endsection
@section('content')
<div class="row" id="RestaurantTables">
  <div class="col-md-12" v-cloak>
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-12">
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