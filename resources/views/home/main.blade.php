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
    <div class="food-title-container">
        <p class="food-title">AMBOJA Food Menu</p>
    </div>

    <section class="items-section" v-for="list in data">
        <div class="back-next-container">
            <button class="back-button"><i class="fas fa-chevron-left"></i></button>
            <button class="next-button"><i class="fas fa-chevron-right"></i></button>
        </div>
        <div class="card-scroll">
            <p class="card-category mt-3">@{{ list.name }}</p>
            <div class="card" v-for="product in list.products">
                <div class="card-image-container">
                    <img class="card-image" :src="product.image?.url" alt="img">
                </div>
                <div class="card-detail">
                    <span class="menu-name">@{{ product.name }}</span>
                    <span class="main-price">@{{formatCurrency(product.price)}}</span>
                    <hr class="hr-style">
                    <p class="menu-detail">
                        @{{ product.description }}
                    </p>
                    <button class="order-detail-btn" data-target="#product-detail-modal" data-toggle="modal"
                        @click="getDetail(product)">
                        <span>Order Detail</span>
                        <span class="order-detail-btn-arrow"><i class="fa fa-arrow-right"></i></span>
                    </button>
                </div>
                @include('home.modal.productdetails')
            </div>
        </div>
    </section>

    @include('home.modal.cart')
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
