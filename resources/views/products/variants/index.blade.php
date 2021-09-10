@extends('layouts.master')

@section('content-header')
<div class="row mx-1">
  <div class="col-md-12">
    <a href="{{ route('products') }}" class="btn btn-default rounded-pill"><i class="far fa-arrow-left fa-fw"></i>Back</a>
  </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon" style="width: 80px; height: auto;">  
          <img src="{{ asset('adminlte/dist/img/logo/emenu-square-black-bg-with-stroke.png') }}">
        </span>
        <div class="info-box-content">
          <span class="info-box-text" style="line-height: 1.1"></a> Angkor Beer</span>
          <span class="info-box-text text-muted" style="line-height: 1.1;"><em>Drink</em></span>
          <span class="info-box-text" style="line-height: 1.1"><b>$ 1.15</b></span>
        </div>
      </div>
    </div>
  </div>
  @include('products.variants.table')  
</div>
@endsection

@section('content-footer')
<script>
  // const product_id = <?php echo request('product_id'); ?>;

</script>
<script src="{{ mix('dist/js/app.js') }}"></script>
<script src="{{ mix('dist/js/product-variants/create.js') }}"></script>
@endsection