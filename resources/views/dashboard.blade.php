@extends('layouts.master')
@section('content-header')
{!! generateContentHeader('Dashboard', 'Dashboard') !!}
@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $data->data->total_categories }}</h3>

          <p>{{ __('app.dashboard.total-categories') }}</p>
        </div>
        <div class="icon">
          <i class="fas fa-boxes"></i>
        </div>
        <a href="{{ url('admin/product-categories') }}" class="small-box-footer">{{ __('app.dashboard.more-info') }} <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $data->data->total_products }}</h3>

          <p>{{ __('app.dashboard.total-products') }}</p>
        </div>
        <div class="icon">
          <i class="fas fa-hamburger"></i>
        </div>
        <a href="{{ url('admin/products') }}" class="small-box-footer">{{ __('app.dashboard.more-info') }} <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $data->data->total_sales }}</h3>

          <p>{{ __('app.dashboard.total-orders') }}</p>
        </div>
        <div class="icon">
          <i class="fas fa-shopping-basket"></i>
        </div>
        <a href="#" class="small-box-footer">{{ __('app.dashboard.more-info') }} <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $data->data->total_users }}</h3>

          <p>{{ __('app.dashboard.total-user') }}</p>
        </div>
        <div class="icon">
          <i class="fas fa-user"></i>
        </div>
        <a href="#" class="small-box-footer">{{ __('app.dashboard.more-info') }} <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col --> 
  </div>
</div>
@endsection