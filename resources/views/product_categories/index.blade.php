@extends('layouts.master')
@section('content')
  <div class="row">
    <div class="col-md-6">
      <h4>Product Categories</h4>
    </div>
    <div class="col-md-6 text-right">
      <h5>
          <a href="{{ route('dashboard') }}">Dashboard</a> / Product Categories
      </h5>
    </div>
  </div>
  @include('product_categories.table')  

@endsection
@section('footer-content')
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
@endsection