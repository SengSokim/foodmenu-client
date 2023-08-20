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
                        <tr v-for="item in carts">
                            <td>@{{ item.name }} | @{{ item.code }}</td>
                            <td>@{{ formatCurrency(item.price) }}</td>
                            <td>@{{ item.qty }}</td>
                            <td> @{{ formatCurrency(item.subtotal) }}</td>
                        </tr>

                    </tbody>
                </table>
                <p v-if="carts.length == 0" class="text-center text-bold">No Item in cart!</p>
            </div>
            <div class="modal-footer">
                <h5 class="mr-auto">
                    <strong>
                        <i class="fas fa-coins mr-1"></i>Grand Total: @{{ grandtotal }}
                    </strong>
                </h5>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-times mr-1"></i>Cancel</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                    style="background-color: #154d97;" :disabled="carts.length == 0"><i class="fas fa-check mr-1"></i>Checkout</button>
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
                <form @submit.prevent="createOrder" v-cloak id="customer_info">
                    
                    <div class="form-group">
                        <label for="name" class="required">
                            <i class="fas fa-user mr-1"></i>Name 
                        </label>
                        <input type="text" class="form-control" :class="{'is-invalid': errors.has('code') }" v-validate="'required'"  id="customer-name" v-model="orderDetails.customer_name" name="customer_name" >
                        <div class="invalid-feedback">@{{ errors.first('customer_name') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="required">
                            <i class="fas fa-phone mr-1"></i>Phone Number
                        </label>
                        <input type="text" class="form-control" :class="{'is-invalid': errors.has('code') }" v-validate="'required'" id="customer-phone" v-model="orderDetails.phone_number" name="customer_phone">
                        <div class="invalid-feedback">@{{ errors.first('customer_phone') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="required">
                            <i class="fas fa-map-marker-alt mr-1"></i>Address
                        </label>
                        <input type="text" class="form-control" id="customer-address" v-model="orderDetails.address" :class="{'is-invalid': errors.has('customer_address') }" v-validate="'required'" name="customer_address">
                        <div class="invalid-feedback">@{{ errors.first('customer_address') }}</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-times mr-1"></i>Cancel
                        </button>
                        <button type="button" class="btn btn-warning" id="backButton">
                            <i class="fas fa-arrow-left mr-1"></i>Back
                        </button>
                        <button data-toggle="modal" data-target="#invoiceModal" type="submit" class="btn btn-primary"
                            style="background-color: #154d97;" data-dismiss="modal" id="submitBtn">
                            <i class="fas fa-check mr-1"></i>Submit
                        </button>
                    </div>
                </form>
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
                        <tr v-for="item in carts">
                            <td>@{{ item.name }} | @{{ item.code }}</td>
                            <td>@{{ formatCurrency(item.price) }}</td>
                            <td>@{{ item.qty }}</td>
                            <td> @{{ formatCurrency(item.subtotal) }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-left" style="display: flex; justify-content: space-between;">
                    <div>
                        <h5>
                            <strong><i class="fas fa-phone mr-1"></i>Phone:</strong>
                            <span>@{{ orderDetails.phone_number }}</span>
                        </h5>
                    </div>
                    <div>
                        <h5 class="mr-auto">
                            <strong>
                                <i class="fas fa-coins mr-1"></i>Grand Total: @{{ grandtotal }}
                            </strong>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-times mr-1"></i>Close</button>
                <button type="button" style="background-color: #154d97;" class="btn btn-primary">
                    <i class="fas fa-download mr-1"></i>Download
                </button>
            </div>
        </div>
    </div>
</div>
