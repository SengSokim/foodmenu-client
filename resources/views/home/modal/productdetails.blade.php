<div class="modal fade modal-a" id="product-detail-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color: #154d97;" class="modal-title text-bold">
                    <i class="fas fa-info-circle fa-fw"></i> Product Detail
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clear()">
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
                            <button type="button" @click="decrement()">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span id="quantityDisplay">@{{ toAdd.qty }}</span>
                            <button type="button" class="increase-btn" @click="increment()">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <button class="card-button" type="button" @click="addToCart(productDetail.id)">
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
