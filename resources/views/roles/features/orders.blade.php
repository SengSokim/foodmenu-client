<div class="row">
    <div class="col-md-12">
        <div class="row mx-2 mt-3">
            <h5><i class="nav-icon fas fa-clipboard-list"></i><label class="px-1">Order</label></h5>
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
                                            <input type="checkbox" class="custom-control-input" id="orders-read" value="orders-read" v-model="data.data">
                                            <label class="custom-control-label" for="orders-read">Read</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="orders-create" value="orders-create" v-model="data.data">
                                            <label class="custom-control-label" for="orders-create">Create</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="orders-upload-file" value="orders-upload-file" v-model="data.data">
                                            <label class="custom-control-label" for="orders-upload-file">Upload File</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="orders-update" value="orders-update" v-model="data.data">
                                            <label class="custom-control-label" for="orders-update">Update</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="orders-delete" value="orders-delete" v-model="data.data">
                                            <label class="custom-control-label" for="orders-delete">Delete</label>
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
                                            <input type="checkbox" class="custom-control-input" id="orders-document-read" value="orders-document-read" v-model="data.data">
                                            <label class="custom-control-label" for="orders-document-read">Read</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="orders-document-create" value="orders-document-create" v-model="data.data">
                                            <label class="custom-control-label" for="orders-document-create">Create</label>
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
                                            <input type="checkbox" class="custom-control-input" id="orders-note-read" value="orders-note-read" v-model="data.data">
                                            <label class="custom-control-label" for="orders-note-read">Read</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="orders-note-create" value="orders-note-create" v-model="data.data">
                                            <label class="custom-control-label" for="orders-note-create">Create</label>
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
                        <label class="m-0"><i class="fas fa-bookmark"></i> Price</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="orders-price-read" value="orders-price-read" v-model="data.data">
                                            <label class="custom-control-label" for="orders-price-read">Read Histories</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="orders-price-update" value="orders-price-update" v-model="data.data">
                                            <label class="custom-control-label" for="orders-price-update">Update</label>
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
                                            <input type="checkbox" class="custom-control-input" id="orders-status-update" value="orders-status-update" v-model="data.data">
                                            <label class="custom-control-label" for="orders-status-update">Update</label>
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