<!-- <div class="modal fade" id="cart-modal" tabindex="-1" aria-hidden="true">
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
                                <span class="text-secondary">@{{ item.code }}</span>

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
</div> -->
<div class="modal fade" id="cart-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="color: #154d97;" class="modal-title text-bold" id="orderModalLabel">
                    <i class="fas fa-shopping-cart mr-2"></i>Cart Items
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clear()">
                    <span aria-hidden="true">
                        <i class="far fa-times fa-fw text-secondary"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th style="color: #154d97;"><i class="fas fa-tag mr-1"></i> Item</th>
                            <th style="color: #154d97;"><i class="fas fa-dollar-sign mr-1"></i> Price</th>
                            <th style="color: #154d97;"><i class="fas fa-sort-numeric-up mr-1"></i> Quantity</th>
                            <th style="color: #154d97;"><i class="fas fa-money-bill mr-1"></i> Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Item 1</td>
                            <td>$10</td>
                            <td>2</td>
                            <td>$20</td>
                        </tr>
                        <tr>
                            <td>Item 2</td>
                            <td>$15</td>
                            <td>3</td>
                            <td>$45</td>
                        </tr>
                        <tr>
                            <td>Item 3</td>
                            <td>$5</td>
                            <td>1</td>
                            <td>$5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <h5 class="mr-auto">
                    <strong>
                        <i class="fas fa-coins mr-1"></i>Grand Total: $70
                    </strong>
                </h5>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-times mr-1"></i>Cancel</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                    style="background-color: #154d97;"><i class="fas fa-check mr-1"></i>Checkout</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="color: #154d97;" class="modal-title">
                    <i class="fas fa-info-circle mr-2"></i>Enter Details
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
                            <i class="fas fa-user mr-1"></i>Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="customer-name" v-model="orderDetails.customer_name">
                    </div>
                    <div class="form-group">
                        <label for="phone">
                            <i class="fas fa-phone mr-1"></i>Phone Number <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="customer-phone" v-model="orderDetails.phone_number">
                    </div>
                    <div class="form-group">
                        <label for="address">
                            <i class="fas fa-map-marker-alt mr-1"></i>Address
                        </label>
                        <input type="text" class="form-control" id="customer-address" v-model="orderDetails.address">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="far fa-times-circle mr-1"></i>Cancel
                </button>
                <button type="button" class="btn btn-warning" id="backButton">
                    <i class="fas fa-arrow-left mr-1"></i>Back
                </button>
                <button data-toggle="modal" data-target="#invoiceModal" type="button" class="btn btn-primary"
                    style="background-color: #154d97;" @click="createOrder" data-dismiss="modal" id="submitBtn">
                    <i class="far fa-check-circle mr-1"></i>Submit
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModalLabel"
    aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="color: #154d97;" class="modal-title text-bold" id="invoiceModalLabel">
                    <i class="fas fa-file-invoice-dollar mr-2"></i>Invoice
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clear()">
                    <span aria-hidden="true">
                        <i class="far fa-times fa-fw text-secondary"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th style="color: #154d97;"><i class="fas fa-utensils mr-1"></i>Name</th>
                            <th style="color: #154d97;"><i class="fas fa-dollar-sign mr-1"></i>Price</th>
                            <th style="color: #154d97;"><i class="fas fa-sort-numeric-up mr-1"></i>Quantity</th>
                            <th style="color: #154d97;"><i class="fas fa-dollar-sign mr-1"></i>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Burger</td>
                            <td>$5.99</td>
                            <td>2</td>
                            <td>$11.98</td>
                        </tr>
                        <tr>
                            <td>Pizza</td>
                            <td>$8.99</td>
                            <td>1</td>
                            <td>$8.99</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-left" style="display: flex; justify-content: space-between;">
                    <div>
                        <h5>
                            <strong><i class="fas fa-phone mr-1"></i>Phone:</strong>
                            <span>010223344</span>
                        </h5>
                    </div>
                    <div>
                        <h5 class="mr-auto">
                            <strong>
                                <i class="fas fa-coins mr-1"></i>Grand Total: $7023
                            </strong>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="far fa-times-circle"></i>Close</button>
                <button type="button" style="background-color: #154d97;" class="btn btn-primary">
                    <i class="fas fa-download mr-1"></i>Download
                </button>
            </div>
        </div>
    </div>
</div>
