@extends('home.layouts.master')
@section('content')

<body>
    <div class="main-container" id="homePage" v-cloak>
        <nav class="navbar">
            <div class="navbar-brand">
                <a href="#"><img class="logo" src="{{ asset('images/amboja_logo.jpg') }}" alt="ambojaLogo"></a>
            </div>
            <ul class="navbar-menu">
                <div v-if="carts">
                    <li>
                        <button class="add-card-btn" type="button" data-toggle="modal" data-target="#cart-modal">
                            <i class="fa-solid fa-cart-arrow-down"></i>
                            <span>Cart</span>
                            <span class="cart-qty">@{{ carts?.length }}</span>
                        </button>
                    </li>
                </div>
                <div v-else>
                    <li><button class="add-card-btn"><i class="fa-solid fa-cart-arrow-down"></i>Add to
                            cart</button></li>
                </div>
            </ul>
        </nav>
        <div class="containerr" id="homePage" v-cloak>
            <div class="food-title-container">
                <p class="food-title">AMBOJA Food Menu</p>
            </div>

            <section class="items-section" v-for="list in data">
                <p class="card-category mt-3">@{{ list.name }}</p>
                <!-- <div class="card-scroll" data-flickity='{ "groupCells": true }'> -->
                <div class="card-scroll">
                    <div class="card" v-for="product in list.products">
                        <div class="card-image-container">
                            <img class="card-image" :src="product.image?.url" alt="img">
                        </div>
                        <div class="card-detail">
                            <span class="menu-name">@{{ product.name }}</span>
                            <span class="main-price">@{{formatCurrency(product.price)}}</span>
                            <hr class="hr-style">
                            <p class="menu-detail">@{{ product.description }}</p>
                            <button class="order-detail-btn" data-target="#product-detail-modal" data-toggle="modal"
                                @click="getDetail(product)">
                                <span>Order Detail</span>
                                <span class="order-detail-btn-arrow"><i class="fa fa-arrow-right"></i></span>
                            </button>
                        </div>
                        <!-- @include('home.modal.productdetails') -->
                    </div>
                </div>
            </section>

            @include('home.modal.cart')
        </div>
    </div>
    <div class="footer-position"
        :style="data && data.length > 0 ? 'width: 100%; margin-top: 70px; ' : 'width: 100%; position: absolute; bottom: 0;'">
        <footer>
            <div class="describe-container">
                <img class="footer-logo" src="{{ asset('images/amboja_logo.jpg') }}" alt="ambojaLogo">
                <p class="footer-text-describe">
                    The easiest way to create a digital food menu for your restaurant, bar or cafe.
                </p>
            </div>
            <div class="privacy-container">
                <div class="support-container">
                    <i class="fa-regular fa-envelope"></i>
                    AMBOJA.com
                </div>
            </div>
        </footer>
        <div id="bottom-footer-container" class="bottom-footer-container">
            <div class="bottom-footer">
                @ 2023 - AMBOJA
            </div>
        </div>
    </div>
</body>
<div class="modal fade" id="product-detail-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color: #154d97;" class="modal-title text-bold">
                    <i class="fas fa-info-circle fa-fw"></i> Product Detail
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="far fa-times fa-fw text-secondary"></i>
                    </span>
                </button>
            </div>

            @csrf
            <div class="modal-body">
                <div class="card-image-container">
                    <img class="card-image" :src="productDetail.image?.url" alt="img" width="200px" height="300px">
                </div>
                <div class="card-detail">
                    <span class="menu-name">
                        <i class="fas fa-tags fa-fw"></i> @{{ productDetail.name }}
                    </span>
                    <span class="main-price">@{{ formatCurrency(productDetail.price) }}
                    </span>
                    <hr class="hr-style">
                    <p class="popup-descrip-product">
                        @{{ productDetail.description }}
                    </p>
                    <hr class="hr-style">
                    <h4 class="text-center">
                        <i class="fas fa-dollar-sign fa-fw popup-dolar"></i>Total:
                        <span>@{{ formatCurrency(productDetail.price * toAdd.qty) }}</span>
                    </h4>
                    <hr class="hr-style">
                    <div class="d-flex justify-content-between">
                        <div class="quantity">
                            <button type="button" @click="decrementQtyAdd(toAdd)">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span id="quantityDisplay">@{{ toAdd.qty }}</span>
                            <button type="button" class="increase-btn" @click="incrementQtyAdd(toAdd)">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <button class="card-button" data-dismiss="modal" type="button"
                            @click="addToCart(productDetail.id)">
                            <span class="icon">
                                <i class="fas fa-cart-arrow-down"></i>
                            </span>
                            <span class="text">Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer-content')
<script>
    const data = @json($data);

</script>
<script src="{{ mix('dist/js/app.js') }}"></script>
<script src="{{ mix('dist/js/home/index.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#myModal').on('show.bs.modal', function () {
            $('#cart-modal').modal('hide');
        });

        $('#myModal').on('hidden.bs.modal', function () {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        });

        $('#backButton').on('click', function () {
            $('#myModal').modal('hide');
            $('#cart-modal').modal('show');
        });
        $('#btn-print-invoice').click(function() {
            showLoading();
            html2canvas($('#invoiceModal')[0]).then(canvas => {
                hideLoading();
                var dataString = canvas.toDataURL("image/png");
                var link = document.createElement("a");
                link.download = 'image';
                link.href = dataString;
                link.click();
            });
        })

        function printElement(elem) {
            console.log(elem);
            var domClone = elem[0].cloneNode(true);

            var $printSection = document.getElementById("printSection");

            if (!$printSection) {
                var $printSection = document.createElement("div");
                $printSection.id = "printSection";
                document.body.appendChild($printSection);
            }

            $printSection.innerHTML = "";
            $printSection.appendChild(domClone);
            setTimeout(function() {
                window.print();
            }, 250);

        }

    });

</script>
@endsection