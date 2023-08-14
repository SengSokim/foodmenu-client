<div class="row">
    <div class="col-md-12">
        <div class="row mx-2 mt-3">
            <h5><i class="fas fa-user-tie nav-icon"></i><label class="px-1">Employee</label></h5>
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
                                            <input type="checkbox" class="custom-control-input" id="sales-read" value="sales-read" v-model="data.data">
                                            <label class="custom-control-label" for="sales-read">Read</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="sales-create" value="sales-create" v-model="data.data">
                                            <label class="custom-control-label" for="sales-create">Create</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="sales-update" value="sales-update" v-model="data.data">
                                            <label class="custom-control-label" for="sales-update">Update</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="sales-delete" value="sales-delete" v-model="data.data">
                                            <label class="custom-control-label" for="sales-delete">Delete</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="sales-order-payment" value="sales-order-payment" v-model="data.data">
                                            <label class="custom-control-label" for="sales-order-payment">Order Payment</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-light">
                        <label class="m-0"><i class="fas fa-bookmark"></i> Document</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="sales-document-read" value="sales-document-read" v-model="data.data">
                                            <label class="custom-control-label" for="sales-document-read">Read</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="sales-document-create" value="sales-document-create" v-model="data.data">
                                            <label class="custom-control-label" for="sales-document-create">Create</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-light">
                        <label class="m-0"><i class="fas fa-bookmark"></i> Note</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="sales-note-read" value="sales-note-read" v-model="data.data">
                                            <label class="custom-control-label" for="sales-note-read">Read</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="sales-note-create" value="sales-note-create" v-model="data.data">
                                            <label class="custom-control-label" for="sales-note-create">Create</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-light">
                        <label class="m-0"><i class="fas fa-bookmark"></i> Status</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="sales-status-update" value="sales-status-update" v-model="data.data">
                                            <label class="custom-control-label" for="sales-status-update">Update</label>
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
