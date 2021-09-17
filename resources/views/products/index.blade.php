@extends('layouts.master')

@section('content-header')
<div class="row mx-1 mt-2">
    <div class="col-md-6">
        <h4>Products</h4>
    </div>
    <div class="col-md-6">
        <h5 class="text-right">
            <a href="">Dashboard </a>/ Products
        </h5>
  </div>
</div>
<hr class="mt-1">
<div class="row mx-1">
  <div class="col-md-12">
      @php
          $categories = ["All","Drink","Beer","Khmer","sian Food","Bread","Burgar","Coffee","Item Set"];

      @endphp
      @foreach ($categories as $category)
        <button class="btn btn-warning rounded-pill my-1 py-0 category" onclick="$(this).addClass('bg-white'); $('.category').not(this).removeClass('bg-white')">
          {{ $category }}
        </button>
      @endforeach

  </div>
</div>
@endsection
@section('content')
<div class="container-fluid">

  @include('products.list')  

  <button class="btn btn-warning btn-sm rounded-pill px-3" style="position: fixed; bottom: 10%; right: 20%; z-index: 1" data-toggle="modal" data-target="#createProduct">
    <i class="far fa-plus"></i>
    Create New
  </button>
  @include('products.create')
  @include('products.edit')

</div>
@endsection
@section('footer-content')
<script>
  $('.product-category-select2').select2()
</script>
{{-- <script>
  var image_crop = $('#image-crop').croppie({
      enableExif: true,
      enableOrientation: true,
      viewport:{
        width: 300, 
        height: 300, 
        type: 'circle'
      },
      boundary:{
        width: 400, 
        height: 400}
  });    

  $('#img-input').on('change', function(){
      var reader = new FileReader();
      reader.onload = function (event) {
          image_crop.croppie('bind', {
              url: event.target.result,
          })
      }
      reader.readAsDataURL(this.files[0]);
      $('#modal-crop-image').modal('show');
  });
 
  $('.submit-crop').click(function(){
      image_crop.croppie('result', {
          type: 'base64',
          size: {width:1080, height:1080},
      }).then(function(res){
          $('#modal-crop-image').modal('hide');
          $('#img-upload').attr('src', res);
          createUser.data.image = res
      })
  })
</script> --}}
    
@endsection