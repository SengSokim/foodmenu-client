@extends('layouts.master')
@section('content-header')
    {!! generateContentHeader('Products', 'Products') !!}
@endsection
@section('content')
    <div class="row" id="product" v-cloak>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-3">
                        <div class="col-md-12 d-flex justify-content-between">
                            <div></div>
                            <div class="card-tools mt-1" style="float:right">
                                <button class="btn btn-success" @click="clearData()" title="Create Product"
                                    data-toggle="modal" data-target="#create-product"><i
                                        class="far fa-plus fa-fw"></i>{{ __('app.global.create-new') }}</button>
                                @include('products.create')
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('products') }}">
                        <div class="row">
                            <div class="col-md-6">
                                <select name="category_id" id="" v-select2 class="form-control category_id_select2">
                                    <option value=""></option>
                                    <option :value="product_category.id" v-for="product_category in product_categories">
                                        @{{ product_category.name }}</option>
                                </select>
                            </div>
                            <div class="col-md-6">

                                <div class="input-group">
                                    <input name="search" class="form-control" type="search"
                                        placeholder="Search By: Name | Price" aria-label="Search"
                                        value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-sm btn-primary" style="border:1; width: 50px;"
                                            title="Search">
                                            <i class="far fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <button class="btn btn-info text-white" id="btn_filter">Filter <i
                                        class="fas fa-filter"></i></button>
                                <a href="{{ url('admin/products') }}" class="btn btn-danger">
                                    Clear
                                    <i class="fas fa-sync-alt"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @include('products.table')
                    @include('products.edit')
                    @include('products.status')
                    @include('products.delete')
                </div>
                <div class="card-footer">
                    @include('layouts.pagination')
                    @include('products.modal-crop-image')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer-content')
    <script>
        const products = @json($data);
        const product_categories = @json($product_categories);
        var app;
    </script>
    <script src="{{ mix('dist/js/app.js') }}"></script>
    <script src="{{ mix('dist/js/products/product.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"
        integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            // demo profile
            $uploadCrop = $('#image-crop-product').croppie({
                enableExif: true,
                viewport: {
                    width: 250,
                    height: 250,
                    type: 'square'
                }, //'circle'
                boundary: {
                    width: 350,
                    height: 350
                }
            });

            // product input
            $('#product-input').on('change', function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $uploadCrop.croppie('bind', {
                        url: e.target.result
                    }).then(function() {
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                if (this.files[0]) {
                    const size = (this.files[0].size / 1024 / 1024).toFixed(2);
                    if (size > 1) {
                        showAlertError("Image size must be less than or equal to 1MB");
                    } else {
                        $('#modal-crop-image').modal('show');
                    }
                }
            });

            // profile submit
            $('#submit-crop-product').click(function() {
                $uploadCrop.croppie('result', {
                    type: 'base64',
                    size: {
                        width: 500,
                        height: 500
                    },
                    quality: 0.99,
                }).then(function(res) {
                    $('#modal-crop-image').modal('hide');
                    $('#img-upload').attr('src', res);
                    app.data.image = res;
                });
            });
            $("#product_category").select2();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                const size = (input.files[0].size / 1024 / 1024).toFixed(2);
                if (size > 1) {
                    showAlertError("Image size must be less than 1MB");
                } else {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#img-upload').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        }

        function readURL1(input, upload) {
            if (input.files && input.files[0]) {
                const size = (input.files[0].size / 1024 / 1024).toFixed(2);
                if (size > 1) {
                    showAlertError("Image size must be less than 1MB");
                } else {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(upload).attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
        }
    </script>
    <script>
          $(".category_id_select2").select2({
            placeholder: "Select a category"
        });
    </script>
@endsection
