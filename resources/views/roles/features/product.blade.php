
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-light">
                        <label class="m-0"><i class="fas fa-bookmark"></i> Product</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="product-read"
                                                value="product-read" v-model="data.data">
                                            <label class="custom-control-label" for="product-read">Read</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="product-create"
                                                value="product-create" v-model="data.data">
                                            <label class="custom-control-label" for="product-create">Create</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="product-update"
                                                value="product-update" v-model="data.data">
                                            <label class="custom-control-label" for="product-update">Update</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="product-delete"
                                                value="product-delete" v-model="data.data">
                                            <label class="custom-control-label" for="product-delete">Delete</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group my-2">
                                    <div class="checkbox">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input"
                                                id="product-update-status" value="product-update-status"
                                                v-model="data.data">
                                            <label class="custom-control-label" for="product-update-status">Update
                                                Status</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

