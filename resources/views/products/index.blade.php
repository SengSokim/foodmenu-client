@php(getGeneralData($auth))
@extends('layouts.master')
@section('content')
<style>
  .card:hover{
    transform: translate(0, -8px);
    transition: transform 1s;
  }
 
 .overlay{
    position: absolute;
    z-index: 999999;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: .4s ease;
  }
  .dropdown-menu.show {
    top: -1% !important;
    transform: none !important;
  }
  .margin-product:hover .overlay {
    opacity: 1;
    background-color: rgba(0,0,0,0.8);

  }
</style>
<div class="container-fluid" id="product" v-cloak>
  <div class="row mx-1 mx- mb-3">    
    <div class="col-md-12" id="margin-filter">
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
    <i class="far fa-plus fa-fw"></i>{{ __('app.product.create-product') }}
  </button>
  @include('products.create')
  @include('products.modal-crop-image')
</div>
@endsection
@section('footer-content')
  <script>
    const product_categories = @json($product_categories);
    const restaurant = @json($restaurant_info);
    let app;
  </script>
  <script src="{{ mix('dist/js/products/product.js') }}"></script>
  <script>
    $('.product-category-select2').select2();
    
    //Show More
    const container = document.getElementById('showmore');
    const loading = document.querySelector('.loading');
    const contentWrapper = document.getElementById('content-wrapper');

    contentWrapper.addEventListener('scroll', () => {
      const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
      if(clientHeight + scrollTop >= scrollHeight - 5) {
        showLoading1();
      }
    });

    function showLoading1() {
      loading.classList.add('show');
      app.showMore()
    }

    function number_format (number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
    
  </script> 


@endsection