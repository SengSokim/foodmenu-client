<div class="modal fade" id="cart-modal" tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold" style="color:#154d97">Order Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clear()">
                    <span aria-hidden="true"><i class="far fa-times fa-fw text-secondary"></i></span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                
                <div class="modal-body">
                    <div class="row align-items-center" style="color:#154d97">
                        <div class="col-md-3">
                            Item
                        </div>
                        <div class="col-md-3 text-center">
                            Price
                        </div>
                        <div class="col-md-3 text-center">
                            Quantity
                        </div>
                        <div class="col-md-3">
                            <span class="float-right">
                                Total
                            </span>
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row align-items-center my-1" v-for="item in carts">
                        
                        <div class="col-md-3" >
                            <img :src="item.img" alt="" width="50px" height="50px">
                            @{{ item.name }}
                        </div>
                        <div class="col-md-3 text-center" >
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
                    <button type="button" class="btn btn-default" data-dismiss="modal" @click="clear()"><i class="far fa-times fa-fw"></i> Close</button>
                    <button type="button" class="btn" @click="clear()" style="background-color:#154d97;color:white">
                        <i class="far fa-receipt fa-fw"></i> 
                        Checkout
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
