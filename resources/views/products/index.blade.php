@extends('layouts.master')
@section('content')
<style>
  .card:hover{
    transform: translate(0, -8px);
    transition: transform 1s;
  }
 
 .overlay{
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: .4s ease;
  }

  .card:hover .overlay {
    opacity: 1;
    background-color: rgba(0,0,0,0.8);
  }
</style>
<div class="container-fluid" id="product" v-cloak>
  <div class="row mx-1 mx- mb-3">    
    <div class="col-md-12">
      <button class="btn rounded-pill my-1 py-0" v-on:click="product_category_selected=undefined; product_category_id=null" :class="[product_category_id == null ? 'btn-warning' : 'btn-default']">All</button>
      <button class="btn btn-default rounded-pill my-1 py-0" style="margin:0 2px" v-for="item in product_categories" v-on:click="product_category_id = item.id; product_category_selected = item.id" :class="{'btn-warning' : item.id == product_category_selected}">
        @{{ item.name }}
      </button>
    </div>
  </div>
  @include('products.list')  
  @include('products.edit')
  @include('products.delete')
  @include('products.status')
  <button class="btn btn-warning btn-sm rounded-pill px-3" style="position: fixed; bottom: 10%; right: 20%; z-index: 1" data-toggle="modal" data-target="#create-product" @click="clearData()">
    <i class="far fa-plus fa-fw"></i>Create Product
  </button>
  @include('products.create')
  @include('products.modal-crop-image')
</div>
@endsection
@section('footer-content')
  <script>
    const product_categories = <?php echo json_encode($product_categories); ?>;
  </script>
  <script src="{{ mix('dist/js/products/product.js') }}"></script>
  <script>
    $('.product-category-select2').select2()
  </script> 


@endsection