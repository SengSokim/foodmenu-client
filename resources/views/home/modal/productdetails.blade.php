<div class="modal fade" id="product-detail-modal" tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold">Product Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clear()">
                    <span aria-hidden="true"><i class="far fa-times fa-fw text-secondary"></i></span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="card-image-container">
                        <img class="card-image" :src="productDetail.image?.url" alt="img" width="200px" height="300px">
                    </div>
                    <div class="card-detail">
                        <span class="menu-name">@{{ productDetail.name }}</span>
                        <span class="main-price">@{{ dollar(productDetail.price) }}</span>
                        <hr class="hr-style">
                        <p>
                            @{{ productDetail.description }}
                        </p>
                        <hr class="hr-style">
                            <h3>
                                Total:
                                <span>@{{ dollar(productDetail.price * toAdd.qty) }}</span>
                            </h3>
                        <hr class="hr-style">
                        <div class="d-flex justify-content-between">
                            <div class="quantity">
                                <button type="button" @click="decrement()">-</button>
                                <span id="quantityDisplay">@{{ toAdd.qty }}</span>
                                <button type="button" class="increase-btn" @click="increment()">+</button>
                            </div>
                            <button class="card-button" type="button" @click="addToCart(productDetail.id)">
                                <span class="icon"><i class="fa-solid fa-cart-arrow-down"></i></span>
                                <span class="text" >Cart</span>
                            </button>
                         
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" @click="clear()"><i class="far fa-times fa-fw"></i> Close</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
