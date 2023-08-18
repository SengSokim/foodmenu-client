<div class="modal fade" id="cart-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold" style="color:#154d97">
                    <i class="fas fa-shopping-cart fa-fw"></i> Order Detail
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="far fa-times fa-fw text-secondary"></i>
                    </span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row align-items-center" style="color:#154d97">
                        <div class="col-md-3">
                            <i class="fas fa-tags fa-fw"></i> Item
                        </div>
                        <div class="col-md-3 text-center">
                            <i class="fas fa-dollar-sign fa-fw"></i> Price
                        </div>
                        <div class="col-md-3 text-center">
                            <i class="fas fa-sort-numeric-up fa-fw"></i> Quantity
                        </div>
                        <div class="col-md-3">
                            <span class="float-right">
                                <i class="fas fa-dollar-sign fa-fw"></i> Total
                            </span>
                        </div>
                    </div>
                    <hr>

                    <div class="row align-items-center my-1" v-for="item in carts">

                        <div class="col-md-3 d-flex">
                            <img :src="item.img" alt="" width="50px" height="50px">
                            <div class="ml-2">
                                @{{ item.name }} <br>
                                <span class="text-secondary" >@{{ item.code }}</span>
                                
                            </div>
                            
                        </div>
                        <div class="col-md-3 text-center">
                            @{{ formatCurrency(item.price) }}
                        </div>
                        <div class="col-md-3 text-center">
                            @{{ item.qty }}
                        </div>
                        <div class="col-md-3">
                            <span class="float-right">
                                @{{ formatCurrency(item.subtotal) }}
                            </span>
                        </div>

                    </div>

                    <div v-if="carts.length == 0" class="text-center text-bold">No Item in cart!</div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h4>Grand Total:</h4>
                        <div>&nbsp;</div>
                        <span class="text-bold">@{{ formatCurrency(grandtotal) }}</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="far fa-times fa-fw"></i> Cancel
                    </button>
                    <button type="button" class="btn" data-toggle="modal" data-target="#myModal"
                        style="background-color:#154d97;color:white">
                        <i class="far fa-receipt fa-fw"></i> Checkout
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fas fa-info-circle"></i> Enter Details
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clear()">
                    <span aria-hidden="true">
                        <i class="far fa-times fa-fw text-secondary"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name">
                            <i class="fas fa-user"></i> Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="customer-name" v-model="orderDetails.customer_name">
                    </div>
                    <div class="form-group">
                        <label for="phone">
                            <i class="fas fa-phone"></i> Phone Number <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="customer-phone" v-model="orderDetails.phone_number">
                    </div>
                    <div class="form-group">
                        <label for="address">
                            <i class="fas fa-map-marker-alt"></i> Address
                        </label>
                        <input type="text" class="form-control" id="customer-address" v-model="orderDetails.address">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="far fa-times-circle"></i> Cancel
                </button>
                <button type="button" class="btn btn-warning" id="backButton">
                    <i class="fas fa-arrow-left"></i> Back
                </button>
                <button type="button" class="btn btn-primary" style="background-color: #154d97;" @click="createOrder">
                    <i class="far fa-check-circle"></i> Submit
                </button>
            </div>
        </div>
    </div>
</div>


