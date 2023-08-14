<div class="row">
    <div class="col-md-12">
        <div class="row mx-2 mt-3">
            <h5><i class="nav-icon fas fa-file-invoice-dollar"></i><label class="px-1">Payment Histories</label></h5>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-light">
                        <label class="m-0"><i class="fas fa-bookmark"></i> Main</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="payment-histories-read" value="payment-histories-read" v-model="data.data">
                                            <label class="custom-control-label" for="payment-histories-read">Read</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="payment-histories-view" value="payment-histories-view" v-model="data.data">
                                            <label class="custom-control-label" for="payment-histories-view">View</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>