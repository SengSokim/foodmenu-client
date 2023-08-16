@extends('home.layouts.master')
@section('content')

    <div class="container" id="homePage" v-cloak>
        <nav class="navbar">
            <div class="navbar-brand">
                <a href="#"><img class="logo" src="{{ asset('images/amboja_logo.jpg') }}" alt="ambojaLogo"></a>
            </div>
            <ul class="navbar-menu">
                <div v-if="carts">
                    <li>
                        <button class="add-card-btn" type="button" data-toggle="modal" data-target="#cart-modal">
                            <i class="fa-solid fa-cart-arrow-down">
                                @{{ carts?.length }}
                            </i>
                        </button>
                    </li>
                </div>
                <div v-else>
                    <li><button class="add-card-btn"><i class="fa-solid fa-cart-arrow-down"></i>Add to
                        cart</button></li>
                </div>
            </ul>
            
        </nav>
        <section class="items-section" v-for="list in data">
            <div class="card-scroll">
                <p class="card-category">@{{ list.name }}</p>
                <div class="card" v-for="product in list.products">
                    <div class="card-image-container">
                        <img class="card-image" :src="product.image?.url" alt="img">
                    </div>
                    <div class="card-detail">
                        <span class="menu-name">@{{ product.name }}</span>
                        <span class="main-price">@{{dollar(product.price)}}</span>
                        <hr class="hr-style">
                        <p class="menu-detail">
                            @{{ product.description }}
                        </p>
                        <button  class="order-detail-btn" data-target="#product-detail-modal" data-toggle="modal" @click="getDetail(product)">
                            Order
                            <i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                    @include('home.modal.productdetails')
                </div>
                
            </div>
        </section>
        
        @include('home.modal.cart')
    </div>
    
    <div class="create-text-container">
        <p class="create-text">Created with <a href="#"><b>AMBOJA</b></a></p>
    </div>
    
    
@endsection
@section('footer-content')
    <script>
        const data = @json($data);    
    </script>
    <script src="{{ mix('dist/js/app.js') }}"></script>
    <script src="{{ mix('dist/js/home/index.js') }}"></script>
@endsection
