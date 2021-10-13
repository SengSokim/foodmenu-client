@extends('layouts.master')

@section('content-header')
<div class="row mx-1">
  <div class="col-md-12">
    <a href="{{ route('products') }}" class="btn btn-default rounded-pill"><i class="far fa-arrow-left fa-fw"></i>Back</a>
  </div>
</div>
@endsection
@section('content')
<div class="container-fluid" id="product_variant">
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon" style="width: 80px; height: auto;">  
          <img src="{{ $data->data->product->media->url ?? asset('adminlte/dist/img/logo/emenu-square-black-bg-with-stroke.png') }}">
        </span>
        
        <div class="info-box-content">
          <span class="info-box-text" style="line-height: 1.1"></a> {{$data->data->product->name}}</span>
          <span class="info-box-text text-muted" style="line-height: 1.1;"><em>{{$data->data->product->product_category}}</em></span>
          <span class="info-box-text" style="line-height: 1.1"><b>{{formatCurrency($data->data->product->price)}}</b></span>
        </div>
      </div>
    </div>
  </div>
  @include('products.variants.table')  
  @include('products.variants.edit')
  @include('products.variants.delete')

</div>
@endsection
@section('footer-content')
  <script>
    const data = <?php echo json_encode($data) ?>;
    const product_id = <?php echo request('product_id'); ?>;
  </script>
  <script src="{{ mix('dist/js/app.js') }}"></script>
  <script src="{{ mix('dist/js/product-variants/product-variant.js') }}"></script>
@endsection