@extends('layouts.master')

@section('content-header')
<div class="row mx-1">
  <div class="col-md-12">
    <a href="{{ route('products') }}" class="btn btn-default rounded-pill"><i class="far fa-arrow-left fa-fw"></i>{{ __('app.global.back') }}</a>
  </div>
</div>
@endsection
@section('content')
<div class="container-fluid" id="product_variant">
  <div class="row">
    <div class="col-12 col-sm-6 col-md-6">
      <div class="info-box">
        <span class="info-box-icon" style="width: 80px; height: auto;">  
           <a href="{{ asset($data->data->product->media->url ?? 'adminlte/dist/img/logo/emenu-square-black-bg-with-stroke.png') }}" data-lity data-lity-target="{{ asset($data->data->product->media->url ?? 'adminlte/dist/img/logo/emenu-square-black-bg-with-stroke.png') }}">
              <img src="{{ $data->data->product->media->url ?? asset('adminlte/dist/img/logo/emenu-square-black-bg-with-stroke.png') }}" width="60">
            </a>
        </span>
        
        <div class="info-box-content">
          <span class="info-box-text" style="line-height: 1.2"></a> {{$data->data->product->name}}</span>
          <span class="info-box-text text-muted" style="line-height: 1.2;font-size: 13px">{{$data->data->product->product_category}}</span>
          <span class="info-box-text" style="line-height: 1.2"><b>{{formatCurrency($data->data->product->price, $restaurant_info->currency_code)}}</b></span>
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