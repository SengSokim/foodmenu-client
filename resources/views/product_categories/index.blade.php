@extends('layouts.master')
@section('content')
<div class="container-fluid">
  @include('product_categories.table')  
</div>
@endsection
@section('footer-content')
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
@endsection